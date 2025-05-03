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
                        .')'
                        .'|errors/(\\d+)(?:\\.([^/]++))?(*:495)'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:532)'
                        .')'
                        .'|interactions(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:582)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:608)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:646)'
                            .')'
                        .')'
                        .'|p(?'
                            .'|ayment(?'
                                .'|s(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:699)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:725)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:763)'
                                    .')'
                                .')'
                                .'|_childrens(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:812)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:838)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:876)'
                                    .')'
                                .')'
                            .')'
                            .'|eople(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:921)'
                                .'|(?:\\.([^/]++))?(*:944)'
                            .')'
                            .'|olic(?'
                                .'|ies(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:992)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1018)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1057)'
                                    .')'
                                .')'
                                .'|y_cover_types(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1110)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1137)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1176)'
                                    .')'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1219)'
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
        495 => [[['_route' => '_api_errors', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors'], ['status', '_format'], ['GET' => 0], null, false, true, null]],
        532 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        582 => [[['_route' => '_api_/interactions/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        608 => [
            [['_route' => '_api_/interactions{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/interactions{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        646 => [
            [['_route' => '_api_/interactions/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/interactions/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Interaction', '_api_operation_name' => '_api_/interactions/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        699 => [[['_route' => '_api_/payments/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        725 => [
            [['_route' => '_api_/payments{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/payments{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        763 => [
            [['_route' => '_api_/payments/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/payments/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payment', '_api_operation_name' => '_api_/payments/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        812 => [[['_route' => '_api_/payment_childrens/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        838 => [
            [['_route' => '_api_/payment_childrens{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/payment_childrens{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        876 => [
            [['_route' => '_api_/payment_childrens/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/payment_childrens/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PaymentChildren', '_api_operation_name' => '_api_/payment_childrens/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        921 => [[['_route' => '_api_/people/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Person', '_api_operation_name' => '_api_/people/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        944 => [[['_route' => '_api_/people{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Person', '_api_operation_name' => '_api_/people{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        992 => [[['_route' => '_api_/policies/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1018 => [
            [['_route' => '_api_/policies{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policies{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1057 => [
            [['_route' => '_api_/policies/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policies/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policy', '_api_operation_name' => '_api_/policies/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1110 => [[['_route' => '_api_/policy_cover_types/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1137 => [
            [['_route' => '_api_/policy_cover_types{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policy_cover_types{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1176 => [
            [['_route' => '_api_/policy_cover_types/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policy_cover_types/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\PolicyCoverType', '_api_operation_name' => '_api_/policy_cover_types/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1219 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
