<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/authorisations-search' => [[['_route' => '_api_/authorisations-search_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\AuthorisationSearch', '_api_operation_name' => '_api_/authorisations-search_get_collection'], null, ['GET' => 0], null, false, false, null]],
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
                            .'|o(?'
                                .'|ntexts/([^.]+)(?:\\.(jsonld))?(*:191)'
                                .'|mpany_details(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:241)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:267)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:305)'
                                    .')'
                                .')'
                            .')'
                            .'|ustomer_searches/([^/\\.]++)(?:\\.([^/]++))?(*:358)'
                            .'|l(?'
                                .'|aims(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:403)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:429)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:467)'
                                    .')'
                                .')'
                                .'|ients(?'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:511)'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:537)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:575)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|errors/(\\d+)(?:\\.([^/]++))?(*:614)'
                        .'|validation_errors/([^/]++)(?'
                            .'|(*:651)'
                        .')'
                        .'|\\.well\\-known/genid/([^/\\.]++)(?:\\.([^/]++))?(*:705)'
                        .'|famil(?'
                            .'|y_searches/([^/\\.]++)(?:\\.([^/]++))?(*:757)'
                            .'|ies(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:797)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:823)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:861)'
                                .')'
                            .')'
                        .')'
                        .'|p(?'
                            .'|olicies(?'
                                .'|_searches/([^/\\.]++)(?:\\.([^/]++))?(*:921)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:955)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:981)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1019)'
                                .')'
                            .')'
                            .'|ayments(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1066)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1093)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1132)'
                                .')'
                            .')'
                        .')'
                        .'|a(?'
                            .'|ppointments(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1188)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1215)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1254)'
                                .')'
                            .')'
                            .'|uthorisations(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1307)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1334)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1373)'
                                .')'
                            .')'
                        .')'
                        .'|docs(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1418)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1445)'
                            .')'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1487)'
                                .')'
                                .'|([^/]++)/download(*:1514)'
                            .')'
                        .')'
                        .'|re(?'
                            .'|ceipts(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1565)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1592)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1631)'
                                .')'
                            .')'
                            .'|newals(?'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1677)'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1704)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1743)'
                                .')'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:1785)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        37 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        72 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        105 => [[['_route' => 'api_validation_errors', '_controller' => 'api_platform.action.not_exposed'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        142 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        191 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        241 => [[['_route' => '_api_/company_details/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\CompanyDetails', '_api_operation_name' => '_api_/company_details/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        267 => [
            [['_route' => '_api_/company_details{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\CompanyDetails', '_api_operation_name' => '_api_/company_details{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/company_details{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\CompanyDetails', '_api_operation_name' => '_api_/company_details{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        305 => [
            [['_route' => '_api_/company_details/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\CompanyDetails', '_api_operation_name' => '_api_/company_details/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/company_details/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\CompanyDetails', '_api_operation_name' => '_api_/company_details/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        358 => [[['_route' => '_api_/customer_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\CustomerSearch', '_api_operation_name' => '_api_/customer_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        403 => [[['_route' => '_api_/claims/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claims', '_api_operation_name' => '_api_/claims/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        429 => [
            [['_route' => '_api_/claims{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claims', '_api_operation_name' => '_api_/claims{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/claims{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claims', '_api_operation_name' => '_api_/claims{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        467 => [
            [['_route' => '_api_/claims/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claims', '_api_operation_name' => '_api_/claims/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/claims/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Claims', '_api_operation_name' => '_api_/claims/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        511 => [[['_route' => '_api_/clients/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        537 => [
            [['_route' => '_api_/clients{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/clients{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        575 => [
            [['_route' => '_api_/clients/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/clients/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Clients', '_api_operation_name' => '_api_/clients/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        614 => [[['_route' => '_api_errors', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors'], ['status', '_format'], ['GET' => 0], null, false, true, null]],
        651 => [
            [['_route' => '_api_validation_errors_problem', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_hydra', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_validation_errors_jsonapi', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'ApiPlatform\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], ['id'], ['GET' => 0], null, false, true, null],
        ],
        705 => [[['_route' => '_api_/.well-known/genid/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\AuthorisationSearch', '_api_operation_name' => '_api_/.well-known/genid/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        757 => [[['_route' => '_api_/family_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\FamilySearch', '_api_operation_name' => '_api_/family_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        797 => [[['_route' => '_api_/families/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        823 => [
            [['_route' => '_api_/families{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/families{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        861 => [
            [['_route' => '_api_/families/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/families/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Family', '_api_operation_name' => '_api_/families/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        921 => [[['_route' => '_api_/policies_searches/{id}{._format}_get', '_controller' => 'api_platform.action.not_exposed', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\ApiResource\\PoliciesSearch', '_api_operation_name' => '_api_/policies_searches/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        955 => [[['_route' => '_api_/policies/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        981 => [
            [['_route' => '_api_/policies{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/policies{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1019 => [
            [['_route' => '_api_/policies/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/policies/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Policies', '_api_operation_name' => '_api_/policies/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1066 => [[['_route' => '_api_/payments/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payments', '_api_operation_name' => '_api_/payments/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1093 => [
            [['_route' => '_api_/payments{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payments', '_api_operation_name' => '_api_/payments{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/payments{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payments', '_api_operation_name' => '_api_/payments{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1132 => [
            [['_route' => '_api_/payments/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payments', '_api_operation_name' => '_api_/payments/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/payments/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Payments', '_api_operation_name' => '_api_/payments/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1188 => [[['_route' => '_api_/appointments/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Appointment', '_api_operation_name' => '_api_/appointments/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1215 => [
            [['_route' => '_api_/appointments{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Appointment', '_api_operation_name' => '_api_/appointments{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/appointments{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Appointment', '_api_operation_name' => '_api_/appointments{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1254 => [
            [['_route' => '_api_/appointments/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Appointment', '_api_operation_name' => '_api_/appointments/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/appointments/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Appointment', '_api_operation_name' => '_api_/appointments/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1307 => [[['_route' => '_api_/authorisations/{idAuth}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Authorisation', '_api_operation_name' => '_api_/authorisations/{idAuth}{._format}_get'], ['idAuth', '_format'], ['GET' => 0], null, false, true, null]],
        1334 => [
            [['_route' => '_api_/authorisations{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Authorisation', '_api_operation_name' => '_api_/authorisations{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/authorisations{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Authorisation', '_api_operation_name' => '_api_/authorisations{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1373 => [
            [['_route' => '_api_/authorisations/{idAuth}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Authorisation', '_api_operation_name' => '_api_/authorisations/{idAuth}{._format}_put'], ['idAuth', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/authorisations/{idAuth}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Authorisation', '_api_operation_name' => '_api_/authorisations/{idAuth}{._format}_delete'], ['idAuth', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1418 => [[['_route' => '_api_/docs/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Docs', '_api_operation_name' => '_api_/docs/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1445 => [
            [['_route' => '_api_/docs{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Docs', '_api_operation_name' => '_api_/docs{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/docs{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Docs', '_api_operation_name' => '_api_/docs{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1487 => [
            [['_route' => '_api_/docs/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Docs', '_api_operation_name' => '_api_/docs/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/docs/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Docs', '_api_operation_name' => '_api_/docs/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1514 => [[['_route' => 'download_doc', '_controller' => 'App\\Controller\\DocController::downloadDoc'], ['id'], ['GET' => 0], null, false, false, null]],
        1565 => [[['_route' => '_api_/receipts/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipts', '_api_operation_name' => '_api_/receipts/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1592 => [
            [['_route' => '_api_/receipts{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipts', '_api_operation_name' => '_api_/receipts{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/receipts{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipts', '_api_operation_name' => '_api_/receipts{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1631 => [
            [['_route' => '_api_/receipts/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipts', '_api_operation_name' => '_api_/receipts/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/receipts/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Receipts', '_api_operation_name' => '_api_/receipts/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1677 => [[['_route' => '_api_/renewals/{id}{._format}_get', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Renewals', '_api_operation_name' => '_api_/renewals/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1704 => [
            [['_route' => '_api_/renewals{._format}_get_collection', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Renewals', '_api_operation_name' => '_api_/renewals{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/renewals{._format}_post', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Renewals', '_api_operation_name' => '_api_/renewals{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1743 => [
            [['_route' => '_api_/renewals/{id}{._format}_put', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Renewals', '_api_operation_name' => '_api_/renewals/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/renewals/{id}{._format}_delete', '_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Renewals', '_api_operation_name' => '_api_/renewals/{id}{._format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1785 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
