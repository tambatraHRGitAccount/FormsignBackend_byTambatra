<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/customers-search' => [[['_route' => '_api_/customers-search_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\CustomerSearch', '_api_operation_name' => '_api_/customers-search_get_collection'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|\\.well\\-known/genid/([^/]++)(*:46)'
                        .'|validation_errors/([^/]++)(*:79)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:115)'
                    .'|/(?'
                        .'|doc(?'
                            .'|s(?:\\.([^/]++))?(*:149)'
                            .'|uments(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:192)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:218)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:256)'
                                .')'
                            .')'
                        .')'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:301)'
                            .'|ustomer(?'
                                .'|_searches/([^/\\.]++)(?:\\.([^/]++))?(*:354)'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:392)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:418)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:456)'
                                    .')'
                                .')'
                            .')'
                            .'|laims(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:501)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:527)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:565)'
                                .')'
                            .')'
                        .')'
                        .'|errors/(\\d+)(?:\\.([^/]++))?(*:603)'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:640)'
                        .')'
                        .'|interactions(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:690)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:716)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:754)'
                            .')'
                        .')'
                        .'|p(?'
                            .'|ayment(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:807)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:833)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:871)'
                                    .')'
                                .')'
                                .'|_childrens(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:920)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:946)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:984)'
                                    .')'
                                .')'
                            .')'
                            .'|eople(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1029)'
                                .'|(?:\\.([^/]++))?(*:1053)'
                            .')'
                            .'|olic(?'
                                .'|ies(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1102)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1129)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1168)'
                                    .')'
                                .')'
                                .'|y_cover_types(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1221)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1248)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1287)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|receipts(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1337)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1364)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1403)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1444)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        46 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        79 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        115 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        149 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        192 => [[['_route' => '_api_/documents/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_operation_name' => '_api_/documents/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        218 => [
            [['_route' => '_api_/documents{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_operation_name' => '_api_/documents{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/documents{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_operation_name' => '_api_/documents{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        256 => [
            [['_route' => '_api_/documents/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_operation_name' => '_api_/documents/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/documents/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Document', '_api_operation_name' => '_api_/documents/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        301 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        354 => [[['_route' => '_api_/customer_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\CustomerSearch', '_api_operation_name' => '_api_/customer_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        392 => [[['_route' => '_api_/customers/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Customer', '_api_operation_name' => '_api_/customers/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        418 => [
            [['_route' => '_api_/customers{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Customer', '_api_operation_name' => '_api_/customers{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/customers{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Customer', '_api_operation_name' => '_api_/customers{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        456 => [
            [['_route' => '_api_/customers/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Customer', '_api_operation_name' => '_api_/customers/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/customers/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Customer', '_api_operation_name' => '_api_/customers/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        501 => [[['_route' => '_api_/claims/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claim', '_api_operation_name' => '_api_/claims/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        527 => [
            [['_route' => '_api_/claims{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claim', '_api_operation_name' => '_api_/claims{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/claims{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claim', '_api_operation_name' => '_api_/claims{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        565 => [
            [['_route' => '_api_/claims/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claim', '_api_operation_name' => '_api_/claims/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/claims/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claim', '_api_operation_name' => '_api_/claims/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        603 => [[['_route' => '_api_errors', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors'], ['status', '_format'], ['GET' => 0], null, false, true, null]],
        640 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        690 => [[['_route' => '_api_/interactions/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        716 => [
            [['_route' => '_api_/interactions{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/interactions{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        754 => [
            [['_route' => '_api_/interactions/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/interactions/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        807 => [[['_route' => '_api_/payments/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        833 => [
            [['_route' => '_api_/payments{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/payments{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        871 => [
            [['_route' => '_api_/payments/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/payments/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        920 => [[['_route' => '_api_/payment_childrens/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        946 => [
            [['_route' => '_api_/payment_childrens{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/payment_childrens{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        984 => [
            [['_route' => '_api_/payment_childrens/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/payment_childrens/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1029 => [[['_route' => '_api_/people/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Person', '_api_operation_name' => '_api_/people/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1053 => [[['_route' => '_api_/people{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Person', '_api_operation_name' => '_api_/people{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        1102 => [[['_route' => '_api_/policies/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1129 => [
            [['_route' => '_api_/policies{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policies{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1168 => [
            [['_route' => '_api_/policies/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policies/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1221 => [[['_route' => '_api_/policy_cover_types/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1248 => [
            [['_route' => '_api_/policy_cover_types{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policy_cover_types{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1287 => [
            [['_route' => '_api_/policy_cover_types/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policy_cover_types/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1337 => [[['_route' => '_api_/receipts/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipt', '_api_operation_name' => '_api_/receipts/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1364 => [
            [['_route' => '_api_/receipts{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipt', '_api_operation_name' => '_api_/receipts{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/receipts{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipt', '_api_operation_name' => '_api_/receipts{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1403 => [
            [['_route' => '_api_/receipts/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipt', '_api_operation_name' => '_api_/receipts/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/receipts/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipt', '_api_operation_name' => '_api_/receipts/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1444 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
