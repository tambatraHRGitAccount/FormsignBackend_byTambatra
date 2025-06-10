<?php

namespace App\OpenApi;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\OpenApi;
use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Model\PathItem;
use ApiPlatform\OpenApi\Model\RequestBody;

class CustomOpenApiFactory implements OpenApiFactoryInterface
{
    private OpenApiFactoryInterface $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = ($this->decorated)($context);

        // Modify the POST /signature_request/{signatureRequestId}/document endpoint
        $path = '/api/signature_request/{signatureRequestId}/document';
        if ($openApi->getPaths()->getPath($path)) {
            $operation = $openApi->getPaths()->getPath($path)->getPost();

            if ($operation) {
                $openApi->getPaths()->addPath($path, $openApi->getPaths()->getPath($path)->withPost(
                    new Operation(
                        operationId: $operation->getOperationId(),
                        tags: $operation->getTags(),
                        responses: $operation->getResponses(),
                        summary: $operation->getSummary(),
                        description: $operation->getDescription(),
                        parameters: $operation->getParameters(),
                        requestBody: new RequestBody(
                            content: new \ArrayObject([
                                'application/json' => [
                                    'schema' => [
                                        'type' => 'object',
                                        'required' => ['file', 'name', 'insertAfterId'],
                                        'properties' => [
                                            'file' => [
                                                'type' => 'string',
                                                'description' => 'Base64-encoded PDF file content',
                                            ],
                                            'name' => [
                                                'type' => 'string',
                                                'maxLength' => 255,
                                                'description' => 'Name of the document',
                                            ],
                                            'insertAfterId' => [
                                                'type' => 'integer',
                                                'minimum' => 1,
                                                'description' => 'ID after which the document should be inserted',
                                            ],
                                            'signatureSettings' => [
                                                'type' => 'object',
                                                'nullable' => true,
                                                'description' => 'Settings for signature placement on the document',
                                                'properties' => [
                                                    'page' => [
                                                        'type' => 'integer',
                                                        'minimum' => 1,
                                                        'description' => 'Page number where the signature is placed',
                                                    ],
                                                    'x' => [
                                                        'type' => 'integer',
                                                        'minimum' => 0,
                                                        'description' => 'X-coordinate of the signature',
                                                    ],
                                                    'y' => [
                                                        'type' => 'integer',
                                                        'minimum' => 0,
                                                        'description' => 'Y-coordinate of the signature',
                                                    ],
                                                    'height' => [
                                                        'type' => 'integer',
                                                        'minimum' => 1,
                                                        'description' => 'Height of the signature area',
                                                    ],
                                                    'width' => [
                                                        'type' => 'integer',
                                                        'minimum' => 1,
                                                        'description' => 'Width of the signature area',
                                                    ],
                                                ],
                                                'required' => ['page', 'x', 'y', 'height', 'width'],
                                            ],
                                            'initial' => [
                                                'type' => 'object',
                                                'nullable' => true,
                                                'description' => 'Settings for initial placement on the document',
                                                'properties' => [
                                                    'alignment' => [
                                                        'type' => 'string',
                                                        'enum' => ['bottom-right', 'bottom-left', 'top-right', 'top-left'],
                                                        'description' => 'Alignment of the initial',
                                                    ],
                                                    'y' => [
                                                        'type' => 'integer',
                                                        'minimum' => 0,
                                                        'description' => 'Y-coordinate of the initial',
                                                    ],
                                                ],
                                                'required' => ['alignment', 'y'],
                                            ],
                                        ],
                                    ],
                                ],
                            ])
                        )
                    )
                ));
            }
        }


        // Modify the POST /signature_request endpoint
        $signatureRequestPath = '/api/signature_request';
        if ($openApi->getPaths()->getPath($signatureRequestPath)) {
            $operation = $openApi->getPaths()->getPath($signatureRequestPath)->getPost();
            if ($operation) {
                $openApi->getPaths()->addPath($signatureRequestPath, $openApi->getPaths()->getPath($signatureRequestPath)->withPost(
                    new Operation(
                        operationId: $operation->getOperationId(),
                        tags: $operation->getTags(),
                        responses: $operation->getResponses(),
                        summary: $operation->getSummary(),
                        description: $operation->getDescription(),
                        parameters: $operation->getParameters(),
                        requestBody: new RequestBody(
                            content: new \ArrayObject([
                                'application/json' => [
                                    'schema' => [
                                        'type' => 'object',
                                        'required' => ['name', 'email'],
                                        'properties' => [
                                            'name' => [
                                                'type' => 'string',
                                                'maxLength' => 255,
                                                'description' => 'Name of the signature request',
                                            ],
                                            'email' => [
                                                'type' => 'object',
                                                'description' => 'Email details for the signature request',
                                                'required' => ['sender', 'message'],
                                                'properties' => [
                                                    'sender' => [
                                                        'type' => 'string',
                                                        'format' => 'uuid',
                                                        'description' => 'UUID of the sender',
                                                    ],
                                                    'message' => [
                                                        'type' => 'string',
                                                        'maxLength' => 1000,
                                                        'description' => 'Email message content',
                                                    ],
                                                ],
                                            ],
                                            'expirationDate' => [
                                                'type' => 'string',
                                                'format' => 'date',
                                                'description' => 'Expiration date in YYYY-MM-DD format',
                                                'nullable' => true,
                                            ],
                                            'reminderSettings' => [
                                                'type' => 'object',
                                                'nullable' => true,
                                                'description' => 'Settings for reminder notifications',
                                                'properties' => [
                                                    'interval_in_days' => [
                                                        'type' => 'integer',
                                                        'minimum' => 1,
                                                        'description' => 'Interval between reminders in days',
                                                    ],
                                                    'max_occurrences' => [
                                                        'type' => 'integer',
                                                        'minimum' => 1,
                                                        'description' => 'Maximum number of reminders',
                                                    ],
                                                ],
                                                'required' => ['interval_in_days', 'max_occurrences'],
                                            ],
                                            'timezone' => [
                                                'type' => 'string',
                                                'description' => 'Timezone for the signature request (e.g., Europe/Paris)',
                                                'nullable' => true,
                                            ],
                                            'signersAllowedToDecline' => [
                                                'type' => 'boolean',
                                                'description' => 'Whether signers are allowed to decline the request',
                                            ],
                                            'webhooks' => [
                                                'type' => 'array',
                                                'description' => 'List of webhook configurations',
                                                'items' => [
                                                    'type' => 'object',
                                                    'properties' => [
                                                        'event' => [
                                                            'type' => 'string',
                                                            'enum' => ['signature_request.approved', 'signature_request.declined', 'signature_request.signed'],
                                                            'description' => 'Event triggering the webhook',
                                                        ],
                                                        'url' => [
                                                            'type' => 'string',
                                                            'format' => 'uri',
                                                            'description' => 'URL to send the webhook to',
                                                        ],
                                                        'method' => [
                                                            'type' => 'string',
                                                            'enum' => ['post', 'get'],
                                                            'description' => 'HTTP method for the webhook',
                                                        ],
                                                    ],
                                                    'required' => ['event', 'url', 'method'],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ])
                        )
                    )
                ));
            }
        }

         // Modify the POST /signature_request/{signatureRequestId}/signer endpoint
         $signerPath = '/api/signature_request/{signatureRequestId}/signer';
         if ($openApi->getPaths()->getPath($signerPath)) {
             $operation = $openApi->getPaths()->getPath($signerPath)->getPost();
             if ($operation) {
                 $openApi->getPaths()->addPath($signerPath, $openApi->getPaths()->getPath($signerPath)->withPost(
                     new Operation(
                         operationId: $operation->getOperationId(),
                         tags: $operation->getTags(),
                         responses: $operation->getResponses(),
                         summary: $operation->getSummary(),
                         description: $operation->getDescription(),
                         parameters: $operation->getParameters(),
                         requestBody: new RequestBody(
                             content: new \ArrayObject([
                                 'application/json' => [
                                     'schema' => [
                                         'type' => 'object',
                                         'required' => ['signer', 'signature_authentication_mode', 'insert_after_id'],
                                         'properties' => [
                                             'signer' => [
                                                 'type' => 'object',
                                                 'description' => 'Details of the signer',
                                                 'required' => ['first_name', 'last_name', 'email', 'phone_number'],
                                                 'properties' => [
                                                     'first_name' => [
                                                         'type' => 'string',
                                                         'maxLength' => 255,
                                                         'description' => 'First name of the signer',
                                                         'example' => 'Jean',
                                                     ],
                                                     'last_name' => [
                                                         'type' => 'string',
                                                         'maxLength' => 255,
                                                         'description' => 'Last name of the signer',
                                                         'example' => 'Dupont',
                                                     ],
                                                     'email' => [
                                                         'type' => 'string',
                                                         'format' => 'email',
                                                         'description' => 'Email address of the signer',
                                                         'example' => 'jean.dupont@example.com',
                                                     ],
                                                     'phone_number' => [
                                                         'type' => 'string',
                                                         'maxLength' => 20,
                                                         'description' => 'Phone number of the signer',
                                                         'example' => '+33612345678',
                                                     ],
                                                 ],
                                             ],
                                             'signature_authentication_mode' => [
                                                 'type' => 'string',
                                                 'enum' => ['email', 'sms'],
                                                 'description' => 'Authentication mode for the signature',
                                                 'example' => 'email',
                                             ],
                                             'insert_after_id' => [
                                                 'type' => 'integer',
                                                 'minimum' => 1,
                                                 'description' => 'ID after which the signer should be inserted',
                                                 'example' => 1,
                                             ],
                                             'sms_notification' => [
                                                 'type' => 'object',
                                                 'nullable' => true,
                                                 'description' => 'SMS notification settings for the signer',
                                                 'properties' => [
                                                     'message' => [
                                                         'type' => 'string',
                                                         'maxLength' => 160,
                                                         'description' => 'SMS message content',
                                                         'example' => 'Veuillez signer le document.',
                                                     ],
                                                 ],
                                                 'required' => ['message'],
                                             ],
                                         ],
                                         'example' => [
                                             'signer' => [
                                                 'first_name' => 'Jean',
                                                 'last_name' => 'Dupont',
                                                 'email' => 'jean.dupont@example.com',
                                                 'phone_number' => '+33612345678',
                                             ],
                                             'signature_authentication_mode' => 'email',
                                             'insert_after_id' => 1,
                                             'sms_notification' => [
                                                 'message' => 'Veuillez signer le document.',
                                             ],
                                         ],
                                     ],
                                 ],
                             ])
                         )
                     )
                 ));
             }
         }

        return $openApi;
    }
}