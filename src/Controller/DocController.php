<?php

     namespace App\Controller;

     use App\Entity\Doc;
     use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
     use Symfony\Component\HttpFoundation\BinaryFileResponse;
     use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
     use Symfony\Component\Routing\Annotation\Route;
     use Symfony\Component\Security\Core\Security;

     class DocController extends AbstractController
     {
         #[Route('/api/docs/{id}/download', name: 'download_doc', methods: ['GET'])]
         public function downloadDoc(Doc $doc, Security $security): BinaryFileResponse
         {
             if (!$security->isGranted('ROLE_USER')) {
                 throw new AccessDeniedHttpException('Access denied');
             }
             $filePath = $this->getParameter('kernel.project_dir') . '/public' . $doc->getCrmFile();
             return new BinaryFileResponse($filePath);
         }
     }