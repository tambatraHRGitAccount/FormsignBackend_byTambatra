<?php

namespace App\State;

use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TCPDF;

class AuditTrailState implements ProviderInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): Response
    {
        $this->logger->info('Generating audit trail', ['signatureRequestId' => $uriVariables['id'] ?? null]);

        $signatureRequestId = $uriVariables['id'] ?? null;
        if (!$signatureRequestId) {
            $this->logger->error('SignatureRequest ID is required');
            throw new NotFoundHttpException('SignatureRequest ID is required');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found');
        }

        // Générer le PDF de la piste d'audit
        $pdf = new TCPDF();
        $pdf->SetCreator('Formsign');
        $pdf->SetAuthor('Formsign');
        $pdf->SetTitle('Audit Trail - ' . $signatureRequest->getName());
        $pdf->AddPage();
        $pdf->SetFont('Helvetica', '', 12);

        // Contenu du PDF
        $pdf->Write(10, "Audit Trail pour la demande de Signature\n\n");
        $pdf->Write(5, "Nom de la demande : " . $signatureRequest->getName() . "\n");
        $pdf->Write(5, "Expéditeur : " . $signatureRequest->getSender()->getEmail() . "\n");
        $pdf->Write(5, "Date de création : " . $signatureRequest->getCreatedAt()->format('Y-m-d H:i:s') . "\n");
        $pdf->Write(5, "Statut : " . $signatureRequest->getStatus() . "\n\n");

        $pdf->Write(5, "Documents :\n");
        foreach ($signatureRequest->getDocuments() as $doc) {
            $pdf->Write(5, "- " . $doc->getName() . " (ID: " . $doc->getId() . ", Hash initial: " . $doc->getInitialHash() . ")\n");
        }

        $pdf->Write(5, "\nSignataires :\n");
        foreach ($signatureRequest->getSigners() as $signer) {
            $pdf->Write(5, "- " . $signer->getFirstName() . " " . $signer->getLastName() . " (" . $signer->getEmail() . ") - Statut : " . $signer->getStatus() . "\n");
            if ($signer->getSignatureDatetime()) {
                $pdf->Write(5, "  Date de signature : " . $signer->getSignatureDatetime()->format('Y-m-d H:i:s') . "\n");
            }
        }

        $pdf->Write(5, "\nÉvénements :\n");
        foreach ($signatureRequest->getAuditEvents() as $event) {
            $pdf->Write(5, "- " . ($event['event'] ?? 'unknown') . " à " . $event['datetime'] . "\n");
        }

        $pdfContent = $pdf->Output('', 'S');

        $this->logger->info('Audit trail PDF generated successfully', ['id' => $signatureRequest->getId()]);

        return new Response(
            $pdfContent,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="audit_trail_' . $signatureRequest->getId() . '.pdf"'
            ]
        );
    }
}
