<?php

namespace App\Controller;

use App\Dto\SignatureRequestActivateDTO;
use App\Dto\SignatureRequestDTO;
use App\Entity\Sender;
use App\Entity\SignatureRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SignatureRequestController extends AbstractController
{
    private ValidatorInterface $validator;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ) {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    public function createSignatureRequest(Request $request): JsonResponse
    {
        try {
            // Vérifier que le contenu est JSON
            if ($request->getContentTypeFormat() !== 'json') {
                return $this->json(['error' => 'Content-Type must be application/json'], Response::HTTP_BAD_REQUEST);
            }

            // Récupérer les données JSON
            $data = json_decode($request->getContent(), true);
            if (!$data) {
                return $this->json(['error' => 'Invalid JSON data'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier que tous les champs requis sont présents
            if (!isset($data['name'], $data['email'])) {
                return $this->json(['error' => 'Fields name and email are required'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier les sous-champs de email
            if (!isset($data['email']['sender'], $data['email']['message'])) {
                return $this->json(['error' => 'All email fields (sender, message) are required'], Response::HTTP_BAD_REQUEST);
            }

            // Créer le DTO
            $dto = new SignatureRequestDTO(
                $data['name'],
                $data['email'],
                $data['expiration_date'] ?? null,
                $data['reminder_settings'] ?? null,
                $data['timezone'] ?? null,
                $data['signers_allowed_to_decline'] ?? false,
                $data['webhooks'] ?? []
            );

            // Valider le DTO
            $errors = $this->validator->validate($dto);
            if (count($errors) > 0) {
                return $this->json(['error' => (string) $errors], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier l'existence du Sender
            $sender = $this->entityManager->getRepository(Sender::class)->find($dto->email['sender']);
            if (!$sender) {
                return $this->json(['error' => 'Sender not found'], Response::HTTP_NOT_FOUND);
            }

            // Créer une entité SignatureRequest à partir du DTO
            $signatureRequest = new SignatureRequest();
            $signatureRequest->setName($dto->name);
            $signatureRequest->setSender($sender);
            $signatureRequest->setEmailMessage($dto->email['message']);
            $signatureRequest->setTimezone($dto->timezone);
            $signatureRequest->setSignersAllowedToDecline($dto->signersAllowedToDecline);
            $signatureRequest->setReminderSettings($dto->reminderSettings ?? ['interval_in_days' => 1, 'max_occurrences' => 5]);
            $signatureRequest->setWebhooks($dto->webhooks);

            // Gérer la date d'expiration
            if ($dto->expirationDate) {
                $expirationDate = \DateTime::createFromFormat('Y-m-d', $dto->expirationDate);
                if ($expirationDate === false) {
                    return $this->json(['error' => 'Invalid expiration_date format, expected YYYY-MM-DD'], Response::HTTP_BAD_REQUEST);
                }
                $signatureRequest->setExpirationDate($expirationDate);
            } else {
                // Valeur par défaut : 30 jours à partir d'aujourd'hui
                $signatureRequest->setExpirationDate(new \DateTime('+30 days'));
            }

            // Persister pour obtenir l'ID
            $this->entityManager->persist($signatureRequest);
            $this->entityManager->flush();

            // Retourner la réponse avec l'ID de la demande
            return $this->json([
                'message' => 'Signature request created successfully',
                'signature_request_id' => $signatureRequest->getId()
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function activateSignatureRequest(string $signatureRequestId, Request $request): JsonResponse
    {
        try {
            // Créer et valider le DTO
            $dto = new SignatureRequestActivateDTO($signatureRequestId);
            $errors = $this->validator->validate($dto);
            if (count($errors) > 0) {
                return $this->json(['error' => (string) $errors], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier l'existence de la SignatureRequest
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($signatureRequestId);
            if (!$signatureRequest) {
                return $this->json(['error' => 'SignatureRequest not found'], Response::HTTP_NOT_FOUND);
            }

            // Vérifier si la demande peut être activée
            if ($signatureRequest->getStatus() !== 'draft') {
                return $this->json(['error' => 'SignatureRequest cannot be activated, it is not in draft status'], Response::HTTP_BAD_REQUEST);
            }

            // Activer la demande
            $signatureRequest->setStatus('pending');

            // Ajouter un événement d'audit
            $auditEvents = $signatureRequest->getAuditEvents();
            $auditEvents[] = ['event' => 'activated', 'timestamp' => (new \DateTime())->format('Y-m-d H:i:s')];
            $signatureRequest->setAuditEvents($auditEvents);

            // Mettre à jour la date de modification
            $signatureRequest->setUpdatedAt(new \DateTime());

            // Persister les modifications
            $this->entityManager->persist($signatureRequest);
            $this->entityManager->flush();

            // Retourner la réponse
            return $this->json([
                'message' => 'Signature request activated successfully',
                'signature_request_id' => $signatureRequestId
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}