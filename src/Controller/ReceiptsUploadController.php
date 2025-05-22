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

#[Route('/api/receipts')]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/receipts/upload',
            controller: ReceiptsUploadController::class,
            input: 'multipart/form-data',
            name: 'receipts_upload'
        ),
        new Get(
            uriTemplate: '/receipts/download/{id}',
            controller: ReceiptsUploadController::class,
            name: 'receipts_download'
        ),
        new Get(
            uriTemplate: '/receipts/public-url/{id}',
            controller: ReceiptsUploadController::class,
            name: 'receipts_public_url'
        )
    ]
)]
class ReceiptsUploadController
{
    private EntityManagerInterface $entityManager;
    private Filesystem $filesystem;
    private string $uploadDir;
    private string $publicBaseUrl;

    public function __construct(EntityManagerInterface $entityManager, Filesystem $filesystem)
    {
        $this->entityManager = $entityManager;
        $this->filesystem = $filesystem;
        $this->uploadDir = dirname(__DIR__, 2) . '/public/uploads/receipts';
        $this->publicBaseUrl = 'http://127.0.0.1:8000/uploads/receipts';
    }

    #[Route('/upload', name: 'receipts_upload', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
        $file = $request->files->get('file');
        if (!$file) {
            return new JsonResponse(['detail' => 'No file provided'], 400);
        }

        $data = $request->request->all();
        $crmClientRef = $data['crmClientRef'] ?? null;
        $receiptNum = $data['receiptNum'] ?? null;
        $policyNumber = $data['policyNumber'] ?? null;
        $accMonth = $data['accMonth'] ?? null;
        $docName = $data['docName'] ?? null;
        $docDate = $data['docDate'] ? new \DateTime($data['docDate']) : null;

        $extension = $file->getClientOriginalExtension() ?: 'pdf';
        $filename = sprintf(
            'RECEIPT_%s_%s_%s_%s.%s',
            $crmClientRef ?? 'unknown',
            $policyNumber ?? 'unknown',
            $accMonth ?? 'unknown',
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

        $doc = new Docs();
        $doc->setCrmClientRef($crmClientRef);
        $doc->setCrmFile($receiptNum ?? $filename);
        $doc->setDocName($docName);
        $doc->setDocPol('receiptsDoc');
        $doc->setDocInstruction(null);
        $doc->setDocShortName($receiptNum);
        $doc->setFilePath('/uploads/receipts/' . $filename);
        $doc->setDocDate($docDate);

        $this->entityManager->persist($doc);
        $this->entityManager->flush();

        return new JsonResponse([
            'id' => $doc->getId(),
            'crmClientRef' => $doc->getCrmClientRef(),
            'crmFile' => $doc->getCrmFile(),
            'docName' => $doc->getDocName(),
            'docPol' => $doc->getDocPol(),
            'docInstruction' => $doc->getDocInstruction(),
            'docShortName' => $doc->getDocShortName(),
            'filePath' => $this->publicBaseUrl . '/' . $filename,
            'docDate' => $doc->getDocDate() ? $doc->getDocDate()->format('Y-m-d') : null,
        ], 201);
    }

    #[Route('/download/{id}', name: 'receipts_download', methods: ['GET'])]
    public function download(int $id): Response
    {
        $doc = $this->entityManager->getRepository(Docs::class)->find($id);
        if (!$doc) {
            return new JsonResponse(['detail' => 'Document not found'], 404);
        }

        $filePath = $this->uploadDir . '/' . basename($doc->getFilePath());
        if (!$filePath || !$this->filesystem->exists($filePath)) {
            return new JsonResponse(['detail' => 'File not found', 'filePath' => $doc->getFilePath()], 404);
        }

        $response = new BinaryFileResponse($filePath);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $doc->getCrmFile() ?? 'receipt_' . ($doc->getDocShortName() ?? 'document') . '.pdf'
        );

        return $response;
    }

    #[Route('/public-url/{id}', name: 'receipts_public_url', methods: ['GET'])]
    public function getPublicUrl(int $id): JsonResponse
    {
        $doc = $this->entityManager->getRepository(Docs::class)->find($id);
        if (!$doc) {
            return new JsonResponse(['detail' => 'Document not found'], 404);
        }

        $filePath = $this->uploadDir . '/' . basename($doc->getFilePath());
        if (!$filePath || !$this->filesystem->exists($filePath)) {
            return new JsonResponse(['detail' => 'File not found', 'filePath' => $doc->getFilePath()], 404);
        }

        $publicUrl = $this->publicBaseUrl . '/' . basename($filePath);

        return new JsonResponse([
            'publicUrl' => $publicUrl,
        ]);
    }
}