<?php

   namespace App\State;

   use App\ApiResource\DocsSearch;
   use App\Entity\Docs;
   use ApiPlatform\Metadata\Operation;
   use ApiPlatform\State\ProviderInterface;
   use Doctrine\ORM\EntityManagerInterface;
   use Symfony\Component\HttpFoundation\RequestStack;

   class DocsSearchProvider implements ProviderInterface
   {
       private EntityManagerInterface $entityManager;
       private RequestStack $requestStack;

       public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
       {
           $this->entityManager = $entityManager;
           $this->requestStack = $requestStack;
       }

       public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
       {
           $request = $this->requestStack->getCurrentRequest();
           $queryBuilder = $this->entityManager->getRepository(Docs::class)->createQueryBuilder('d');

           // Apply filters based on query parameters
           if ($id = $request->query->get('id')) {
               $queryBuilder->andWhere('d.id = :id')->setParameter('id', $id);
           }
           if ($crmClientRef = $request->query->get('crmClientRef')) {
               $queryBuilder->andWhere('d.crmClientRef LIKE :crmClientRef')
                           ->setParameter('crmClientRef', '%' . $crmClientRef . '%');
           }
           if ($crmFile = $request->query->get('crmFile')) {
               $queryBuilder->andWhere('d.crmFile LIKE :crmFile')
                           ->setParameter('crmFile', '%' . $crmFile . '%');
           }
           if ($docName = $request->query->get('docName')) {
               $queryBuilder->andWhere('d.docName LIKE :docName')
                           ->setParameter('docName', '%' . $docName . '%');
           }
           if ($docPol = $request->query->get('docPol')) {
               $queryBuilder->andWhere('d.docPol LIKE :docPol')
                           ->setParameter('docPol', '%' . $docPol . '%');
           }
           if ($docInstruction = $request->query->get('docInstruction')) {
               $queryBuilder->andWhere('d.docInstruction LIKE :docInstruction')
                           ->setParameter('docInstruction', '%' . $docInstruction . '%');
           }
           if ($docShortName = $request->query->get('docShortName')) {
               $queryBuilder->andWhere('d.docShortName LIKE :docShortName')
                           ->setParameter('docShortName', '%' . $docShortName . '%');
           }
           if ($filePath = $request->query->get('filePath')) {
               $queryBuilder->andWhere('d.filePath LIKE :filePath')
                           ->setParameter('filePath', '%' . $filePath . '%');
           }
           if ($docDate = $request->query->get('docDate')) {
               $queryBuilder->andWhere('d.docDate = :docDate')
                           ->setParameter('docDate', new \DateTime($docDate));
           }

           $docs = $queryBuilder->getQuery()->getResult();

           return array_map([DocsSearch::class, 'mapFromDocs'], $docs);
       }
   }