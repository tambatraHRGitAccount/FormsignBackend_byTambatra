<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Docs;
use App\State\DocsSearchProvider;

#[GetCollection(
    provider: DocsSearchProvider::class,
    uriTemplate: '/docs-search',
)]
#[QueryParameter(key: 'id')]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'crmFile')]
#[QueryParameter(key: 'docName')]
#[QueryParameter(key: 'docPol')]
#[QueryParameter(key: 'docInstruction')]
#[QueryParameter(key: 'docShortName')]
#[QueryParameter(key: 'filePath')]
#[QueryParameter(key: 'docDate')]
class DocsSearch
{
    public function __construct(
        public ?int $id = null,
        public ?string $crmClientRef = null,
        public ?string $crmFile = null,
        public ?string $docName = null,
        public ?string $docPol = null,
        public ?string $docInstruction = null,
        public ?string $docShortName = null,
        public ?string $filePath = null,
        public ?\DateTimeInterface $docDate = null
    ) {
    }

    public static function mapFromDocs(Docs $docs): DocsSearch
    {
        return new DocsSearch(
            id: $docs->getId(),
            crmClientRef: $docs->getCrmClientRef(),
            crmFile: $docs->getCrmFile(),
            docName: $docs->getDocName(),
            docPol: $docs->getDocPol(),
            docInstruction: $docs->getDocInstruction(),
            docShortName: $docs->getDocShortName(),
            filePath: $docs->getFilePath(),
            docDate: $docs->getDocDate()
        );
    }
}