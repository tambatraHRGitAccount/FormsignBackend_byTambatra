<?php

namespace App\Controller;

use App\Dto\SignerDTO;
use App\Entity\Signer;
use App\Entity\SignatureRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Uuid;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SignerController extends AbstractController
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

    public function addSigner(string $signatureRequestId, Request $request): JsonResponse
    {
        try {
            // Valider le format UUID de signatureRequestId
            $uuidConstraint = new Uuid();
            $errors = $this->validator->validate($signatureRequestId, $uuidConstraint);
            if (count($errors) > 0) {
                return $this->json(['error' => 'Invalid UUID format for signatureRequestId'], Response::HTTP_BAD_REQUEST);
            }

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
            if (!isset($data['signer'], $data['signature_authentication_mode'], $data['insert_after_id'])) {
                return $this->json(['error' => 'Fields signer, signature_authentication_mode, and insert_after_id are required'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier les sous-champs de signer
            if (!isset(
                $data['signer']['first_name'],
                $data['signer']['last_name'],
                $data['signer']['email'],
                $data['signer']['phone_number']
            )) {
                return $this->json(['error' => 'All signer fields (first_name, last_name, email, phone_number) are required'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier l'existence de la SignatureRequest
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($signatureRequestId);
            if (!$signatureRequest) {
                return $this->json(['error' => 'SignatureRequest not found'], Response::HTTP_NOT_FOUND);
            }

            // Créer le DTO
            $dto = new SignerDTO(
                $data['signer']['first_name'],
                $data['signer']['last_name'],
                $data['signer']['email'],
                $data['signer']['phone_number'],
                $data['signature_authentication_mode'],
                $data['insert_after_id'],
                $data['sms_notification'] ?? null
            );

            // Valider le DTO
            $errors = $this->validator->validate($dto);
            if (count($errors) > 0) {
                return $this->json(['error' => (string) $errors], Response::HTTP_BAD_REQUEST);
            }

            // Créer une entité Signer à partir du DTO
            $signer = new Signer();
            $signer->setFirstName($dto->firstName);
            $signer->setLastName($dto->lastName);
            $signer->setEmail($dto->email);
            $signer->setPhoneNumber($dto->phoneNumber);
            $signer->setSignatureAuthenticationMode($dto->signatureAuthenticationMode);
            $signer->setInsertAfterId($dto->insertAfterId);
            $signer->setSmsNotification($dto->smsNotification);

            // Ajouter le signataire à la SignatureRequest en utilisant addSigner
            $signatureRequest->addSigner($signer);

            // Persister pour obtenir l'ID
            $this->entityManager->persist($signer);
            $this->entityManager->flush();

            // Retourner la réponse avec l'ID du signataire
            return $this->json([
                'message' => 'Signer added successfully',
                'signer_id' => $signer->getId(),
                'signature_request_id' => $signatureRequestId
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}