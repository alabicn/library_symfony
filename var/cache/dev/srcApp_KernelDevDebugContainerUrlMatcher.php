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
            '/admin/addAuthor' => [[['_route' => 'add_author', '_controller' => 'App\\Controller\\Admin\\StoreController::insertAuthor'], null, null, null, false, false, null]],
            '/admin/addBook' => [[['_route' => 'add_book', '_controller' => 'App\\Controller\\Admin\\StoreController::insertBook'], null, null, null, false, false, null]],
            '/admin/addGenre' => [[['_route' => 'add_genre', '_controller' => 'App\\Controller\\Admin\\StoreController::insertGenre'], null, null, null, false, false, null]],
            '/admin/addEdition' => [[['_route' => 'add_edition', '_controller' => 'App\\Controller\\Admin\\StoreController::insertEdition'], null, null, null, false, false, null]],
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
                    .'|/admin/(?'
                        .'|author/([^/]++)(*:32)'
                        .'|book/([^/]++)(*:52)'
                    .')'
                    .'|/member/user/([^/]++)(*:81)'
                    .'|/book/show/([^/]++)(*:107)'
                    .'|/genre/([^/]++)(*:130)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:169)'
                        .'|wdt/([^/]++)(*:189)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:235)'
                                .'|router(*:249)'
                                .'|exception(?'
                                    .'|(*:269)'
                                    .'|\\.css(*:282)'
                                .')'
                            .')'
                            .'|(*:292)'
                        .')'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            32 => [[['_route' => 'edit_image_author', '_controller' => 'App\\Controller\\Admin\\StoreController::editAuthor'], ['surname'], null, null, false, true, null]],
            52 => [[['_route' => 'edit_cover_book', '_controller' => 'App\\Controller\\Admin\\StoreController::editBook'], ['id'], null, null, false, true, null]],
            81 => [[['_route' => 'show_user', '_controller' => 'App\\Controller\\MemberController::showUser'], ['id'], null, null, false, true, null]],
            107 => [[['_route' => 'show_book', '_controller' => 'App\\Controller\\StoreController::showBook'], ['id'], null, null, false, true, null]],
            130 => [[['_route' => 'show_genre', '_controller' => 'App\\Controller\\StoreController::listeGenre'], ['name'], null, null, false, true, null]],
            169 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            189 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            235 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            249 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            269 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            282 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            292 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        ];
    }
}
