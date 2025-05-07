<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/customers-search' => [[['_route' => '_api_/customers-search_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\CustomerSearch', '_api_operation_name' => '_api_/customers-search_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/families-search' => [[['_route' => '_api_/families-search_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\FamilySearch', '_api_operation_name' => '_api_/families-search_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/policies-search' => [[['_route' => '_api_/policies-search_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\PoliciesSearch', '_api_operation_name' => '_api_/policies-search_get_collection'], null, ['GET' => 0], null, false, false, null]],
        '/api/doc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:37)'
                        .'|\\.well\\-known/genid/([^/]++)(*:72)'
                        .'|validation_errors/([^/]++)(*:105)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:142)'
                    .'|/(?'
                        .'|c(?'
                            .'|ontexts/([^.]+)(?:\\.(jsonld))?(*:188)'
                            .'|ustomer_searches/([^/\\.]++)(?:\\.([^/]++))?(*:238)'
                            .'|lients(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:281)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:307)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:345)'
                                .')'
                            .')'
                        .')'
                        .'|errors/(\\d+)(?:\\.([^/]++))?(*:383)'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:420)'
                        .')'
                        .'|famil(?'
                            .'|y_searches/([^/\\.]++)(?:\\.([^/]++))?(*:473)'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:513)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:539)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:577)'
                                .')'
                            .')'
                        .')'
                        .'|policies(?'
                            .'|_searches/([^/\\.]++)(?:\\.([^/]++))?(*:634)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:668)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:694)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:732)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:772)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        37 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        72 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        105 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        142 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        188 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        238 => [[['_route' => '_api_/customer_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\CustomerSearch', '_api_operation_name' => '_api_/customer_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        281 => [[['_route' => '_api_/clients/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        307 => [
            [['_route' => '_api_/clients{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/clients{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        345 => [
            [['_route' => '_api_/clients/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/clients/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        383 => [[['_route' => '_api_errors', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors'], ['status', '_format'], ['GET' => 0], null, false, true, null]],
        420 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        473 => [[['_route' => '_api_/family_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\FamilySearch', '_api_operation_name' => '_api_/family_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        513 => [[['_route' => '_api_/families/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        539 => [
            [['_route' => '_api_/families{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/families{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        577 => [
            [['_route' => '_api_/families/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/families/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        634 => [[['_route' => '_api_/policies_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\PoliciesSearch', '_api_operation_name' => '_api_/policies_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        668 => [[['_route' => '_api_/policies/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        694 => [
            [['_route' => '_api_/policies{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policies{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        732 => [
            [['_route' => '_api_/policies/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policies/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        772 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
