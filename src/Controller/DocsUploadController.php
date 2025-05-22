<?php

namespace App\Controller;

use App\Entity\Docs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;

#[Route('/api/docs')]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/docs/upload',
            controller: DocsUploadController::class,
            input: 'multipart/form-data',
            name: 'docs_upload'
        ),
        new Get(
            uriTemplate: '/docs/download/{id}',
            controller: DocsUploadController::class,
            name: 'docs_download'
        ),
        new Get(
            uriTemplate: '/docs/public-url/{id}',
            controller: DocsUploadController::class,
            name: 'docs_public_url'
        )
    ]
)]
class DocsUploadController
{
    private EntityManagerInterface $entityManager;
    private Filesystem $filesystem;
    private string $uploadDir;
    private string $publicBaseUrl;

    public function __construct(EntityManagerInterface $entityManager, Filesystem $filesystem)
    {
        $this->entityManager = $entityManager;
        $this->filesystem = $filesystem;
        $this->uploadDir = dirname(__DIR__, 2) . '/public/uploads/kyc';
        $this->publicBaseUrl = 'http://127.0.0.1:8000/uploads/kyc'; // À configurer selon votre serveur
    }

    #[Route('/upload', name: 'docs_upload', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
        $file = $request->files->get('file');
        if (!$file) {
            return new JsonResponse(['detail' => 'No file provided'], 400);
        }

        $data = $request->request->all();
        $crmClientRef = $data['CRMClientRef'] ?? null;
        $crmFile = $data['CRMFile'] ?? $file->getClientOriginalName();
        $docName = $data['DocName'] ?? null;
        $docPol = $data['DocPol'] ?? null;
        $docInstruction = $data['DocInstruction'] ?? null;
        $docShortName = $data['DocShortName'] ?? null;
        $docDate = $data['DocDate'] ? new \DateTime($data['DocDate']) : null;

        $extension = $file->getClientOriginalExtension() ?: 'pdf';
        $filename = sprintf(
            '%s_%s_%s.%s',
            $crmClientRef ?? 'unknown',
            $docShortName ?? 'doc',
            time(),
            $extension
        );
        $filePath = $this->uploadDir . '/' . $filename;

        $this->filesystem->mkdir($this->uploadDir);

        try {
            $file->move($this->uploadDir, $filename);
        } catch (FileException $e) {
            return new JsonResponse(['detail' => 'Failed to move file: ' . $e->getMessage()], 500);
        }

        $docs = new Docs();
        $docs->setCrmClientRef($crmClientRef);
        $docs->setCrmFile($crmFile);
        $docs->setDocName($docName);
        $docs->setDocPol($docPol);
        $docs->setDocInstruction($docInstruction);
        $docs->setDocShortName($docShortName);
        $docs->setFilePath('/uploads/kyc/' . $filename); // Chemin relatif pour URL publique
        $docs->setDocDate($docDate);

        $this->entityManager->persist($docs);
        $this->entityManager->flush();

        return new JsonResponse([
            'id' => $docs->getId(),
            'crmClientRef' => $docs->getCrmClientRef(),
            'crmFile' => $docs->getCrmFile(),
            'docName' => $docs->getDocName(),
            'docPol' => $docs->getDocPol(),
            'docInstruction' => $docs->getDocInstruction(),
            'docShortName' => $docs->getDocShortName(),
            'filePath' => $this->publicBaseUrl . '/' . $filename,
            'docDate' => $docs->getDocDate() ? $docs->getDocDate()->format('Y-m-d') : null,
        ], 201);
    }

    #[Route('/download/{id}', name: 'docs_download', methods: ['GET'])]
    public function download(int $id): Response
    {
        $docs = $this->entityManager->getRepository(Docs::class)->find($id);
        if (!$docs) {
            return new JsonResponse(['detail' => 'Document not found'], 404);
        }

        $filePath = $this->uploadDir . '/' . basename($docs->getFilePath());
        if (!$filePath || !$this->filesystem->exists($filePath)) {
            return new JsonResponse(['detail' => 'File not found', 'filePath' => $docs->getFilePath()], 404);
        }

        $response = new BinaryFileResponse($filePath);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $docs->getCrmFile() ?? 'document.' . pathinfo($filePath, PATHINFO_EXTENSION)
        );

        return $response;
    }

    #[Route('/public-url/{id}', name: 'docs_public_url', methods: ['GET'])]
    public function getPublicUrl(int $id): JsonResponse
    {
        $docs = $this->entityManager->getRepository(Docs::class)->find($id);
        if (!$docs) {
            return new JsonResponse(['detail' => 'Document not found'], 404);
        }

        $filePath = $this->uploadDir . '/' . basename($docs->getFilePath());
        if (!$filePath || !$this->filesystem->exists($filePath)) {
            return new JsonResponse(['detail' => 'File not found', 'filePath' => $docs->getFilePath()], 404);
        }

        $publicUrl = $this->publicBaseUrl . '/' . basename($filePath);

        return new JsonResponse([
            'publicUrl' => $publicUrl,
        ]);
    }
}