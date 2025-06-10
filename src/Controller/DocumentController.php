<?php

namespace App\Controller;

use App\Dto\DocumentDTO;
use App\Entity\Document;
use App\Entity\SignatureRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DocumentController extends AbstractController
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

    public function uploadDocument(string $signatureRequestId, Request $request): JsonResponse
    {
        try {
            // Vérifier que le contenu est JSON
            if ($request->getContentTypeFormat() !== 'json') {
                return $this->json(['error' => 'Content-Type doit être application/json'], Response::HTTP_BAD_REQUEST);
            }

            // Récupérer les données JSON
            $data = json_decode($request->getContent(), true);
            if (!$data) {
                return $this->json(['error' => 'Données JSON invalides'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier que tous les champs requis sont présents
            if (!isset($data['file'], $data['name'], $data['insert_after_id'])) {
                return $this->json(['error' => 'Les champs file, name et insert_after_id sont requis'], Response::HTTP_BAD_REQUEST);
            }

            // Valider que file est une chaîne base64 et représente un PDF
            if (!base64_decode($data['file'], true)) {
                return $this->json(['error' => 'Le champ file doit être une chaîne base64 valide'], Response::HTTP_BAD_REQUEST);
            }
            $decodedFile = base64_decode($data['file']);
            if (substr($decodedFile, 0, 4) !== '%PDF') {
                return $this->json(['error' => 'Le fichier doit être un PDF valide'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier les sous-champs de signature_settings si présent
            if (isset($data['signature_settings']) && $data['signature_settings'] !== null) {
                if (!isset(
                    $data['signature_settings']['page'],
                    $data['signature_settings']['x'],
                    $data['signature_settings']['y'],
                    $data['signature_settings']['height'],
                    $data['signature_settings']['width']
                )) {
                    return $this->json(['error' => 'Tous les champs de signature_settings (page, x, y, height, width) sont requis'], Response::HTTP_BAD_REQUEST);
                }
            }

            // Vérifier les sous-champs de initial si présent
            if (isset($data['initial']) && $data['initial'] !== null) {
                if (!isset($data['initial']['alignment'], $data['initial']['y'])) {
                    return $this->json(['error' => 'Tous les champs de initial (alignment, y) sont requis'], Response::HTTP_BAD_REQUEST);
                }
            }

            // Vérifier l'existence de la SignatureRequest
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($signatureRequestId);
            if (!$signatureRequest) {
                return $this->json(['error' => 'SignatureRequest non trouvée'], Response::HTTP_NOT_FOUND);
            }

            // Créer le DTO
            $dto = new DocumentDTO(
                $data['file'],
                $data['name'],
                $data['insert_after_id'],
                $data['signature_settings'] ?? null,
                $data['initial'] ?? null
            );

            // Valider le DTO
            $errors = $this->validator->validate($dto);
            if (count($errors) > 0) {
                return $this->json(['error' => (string) $errors], Response::HTTP_BAD_REQUEST);
            }

            // Créer une entité Document à partir du DTO
            $document = new Document();
            $document->setFile($dto->file);
            $document->setName($dto->name);
            $document->setInsertAfterId($dto->insertAfterId);
            $document->setSignatureSettings($dto->signatureSettings);
            $document->setInitial($dto->initial);
            $document->setSignatureRequest($signatureRequest);

            // Persister pour obtenir l'ID (option choisie pour inclure document_id dans la réponse)
            $this->entityManager->persist($document);
            $this->entityManager->flush();

            // Retourner la réponse avec l'ID du document
            return $this->json([
                'message' => 'Document téléchargé avec succès',
                'document_id' => $document->getId(),
                'signature_request_id' => $signatureRequestId
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}