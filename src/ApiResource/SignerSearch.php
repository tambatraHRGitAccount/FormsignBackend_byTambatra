<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Signer;
use App\State\SignerSearchProvider;
use Symfony\Component\Uid\Uuid;

#[GetCollection(
    provider: SignerSearchProvider::class,
    uriTemplate: '/signers-search',
)]
#[QueryParameter(key: 'id')]
#[QueryParameter(key: 'firstName')]
#[QueryParameter(key: 'lastName')]
#[QueryParameter(key: 'email')]
#[QueryParameter(key: 'phoneNumber')]
#[QueryParameter(key: 'signatureAuthenticationMode')]
#[QueryParameter(key: 'insertAfterId')]
#[QueryParameter(key: 'signatureRequestId')]
class SignerSearch
{
    public function __construct(
        public ?Uuid $id = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $email = null,
        public ?string $phoneNumber = null,
        public ?string $signatureAuthenticationMode = null,
        public ?int $insertAfterId = null,
        public ?string $signatureRequestId = null,
        public ?array $smsNotification = null // Non-filterable
    ) {
    }

    public static function mapFromSigner(Signer $signer): SignerSearch
    {
        return new SignerSearch(
            id: $signer->getId(),
            firstName: $signer->getFirstName(),
            lastName: $signer->getLastName(),
            email: $signer->getEmail(),
            phoneNumber: $signer->getPhoneNumber(),
            signatureAuthenticationMode: $signer->getSignatureAuthenticationMode(),
            insertAfterId: $signer->getInsertAfterId(),
            signatureRequestId: $signer->getSignatureRequest() ? $signer->getSignatureRequest()->getId() : null,
            smsNotification: $signer->getSmsNotification()
        );
    }
}