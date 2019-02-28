<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/admin' => [[['_route' => 'app_admin_homepage_index', '_controller' => 'App\\Controller\\Admin\\HomepageController::index'], null, null, null, true, false, null]],
            '/' => [[['_route' => 'app_homepage_index', '_controller' => 'App\\Controller\\HomepageController::index'], null, null, null, false, false, null]],
            '/member' => [[['_route' => 'profile_page', '_controller' => 'App\\Controller\\MemberController::index'], null, null, null, true, false, null]],
            '/register' => [[['_route' => 'app_security_register', '_controller' => 'App\\Controller\\SecurityController::registerAction'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
            '/password-update' => [[['_route' => 'password_update', '_controller' => 'App\\Controller\\SecurityController::updatePassword'], null, null, null, false, false, null]],
            '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
            '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
            '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
            '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
            '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'logout'], null, null, null, false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/member/user/([^/]++)(*:28)'
                    .'|/book/show/([^/]++)(*:54)'
                    .'|/genre/([^/]++)(*:76)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:114)'
                        .'|wdt/([^/]++)(*:134)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:180)'
                                .'|router(*:194)'
                                .'|exception(?'
                                    .'|(*:214)'
                                    .'|\\.css(*:227)'
                                .')'
                            .')'
                            .'|(*:237)'
                        .')'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            28 => [[['_route' => 'show_user', '_controller' => 'App\\Controller\\MemberController::showUser'], ['id'], null, null, false, true, null]],
            54 => [[['_route' => 'show_book', '_controller' => 'App\\Controller\\StoreController::showBook'], ['id'], null, null, false, true, null]],
            76 => [[['_route' => 'show_genre', '_controller' => 'App\\Controller\\StoreController::listeGenre'], ['name'], null, null, false, true, null]],
            114 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            134 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            180 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            194 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            214 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            227 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            237 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        ];
    }
}
