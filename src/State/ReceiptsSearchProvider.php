<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\ReceiptsSearch;
use App\Entity\Receipt;
use App\Entity\Receipts;
use App\Repository\ReceiptRepository;

class ReceiptsSearchProvider implements ProviderInterface
{
    public function __construct(
        private ReceiptRepository $receiptRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $receipts = $this->receiptRepository->findAllByFilter($context['filters'] ?? []);

        $mappedReceipts = array_map(function (Receipts $receipt) {
            return ReceiptsSearch::mapFromReceipt($receipt);
        }, $receipts);

        return [
            '@context' => '/api/contexts/ReceiptsSearch',
            '@id' => '/api/receipts-search',
            '@type' => 'Collection',
            'totalItems' => count($mappedReceipts),
            'member' => $mappedReceipts,
        ];
    }
}