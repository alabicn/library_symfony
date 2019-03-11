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
            '/admin' => [[['_route' => 'home_admin', '_controller' => 'App\\Controller\\Admin\\HomepageController::index'], null, null, null, true, false, null]],
            '/admin/manage/author/addAuthor' => [[['_route' => 'add_author', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::insertAuthor'], null, null, null, false, false, null]],
            '/admin/addQuote' => [[['_route' => 'add_quote', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::addQuote'], null, null, null, false, false, null]],
            '/admin/addBook' => [[['_route' => 'add_book', '_controller' => 'App\\Controller\\Admin\\ManageBookController::insertBook'], null, null, null, false, false, null]],
            '/admin/addGenre' => [[['_route' => 'add_genre', '_controller' => 'App\\Controller\\Admin\\ManageBookController::insertGenre'], null, null, null, false, false, null]],
            '/admin/addEdition' => [[['_route' => 'add_edition', '_controller' => 'App\\Controller\\Admin\\ManageBookController::insertEdition'], null, null, null, false, false, null]],
            '/' => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\HomepageController::index'], null, null, null, false, false, null]],
            '/member' => [[['_route' => 'profile_page', '_controller' => 'App\\Controller\\MemberController::index'], null, null, null, true, false, null]],
            '/register' => [[['_route' => 'app_security_register', '_controller' => 'App\\Controller\\SecurityController::registerAction'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
            '/password-update' => [[['_route' => 'password_update', '_controller' => 'App\\Controller\\SecurityController::updatePassword'], null, null, null, false, false, null]],
            '/god' => [[['_route' => 'home_super_admin', '_controller' => 'App\\Controller\\SuperAdmin\\RoleController::showAllUsers'], null, null, null, true, false, null]],
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
                        .'|e(?'
                            .'|valuation/([^/]++)(*:39)'
                            .'|dit(?'
                                .'|Quote/([^/]++)(*:66)'
                                .'|Genre/([^/]++)(*:87)'
                                .'|Edition/([^/]++)(*:110)'
                            .')'
                        .')'
                        .'|manage/(?'
                            .'|author/(?'
                                .'|([^/]++)(*:148)'
                                .'|Image/([^/]++)(*:170)'
                            .')'
                            .'|book/Image/([^/]++)(*:198)'
                        .')'
                        .'|removeQuote/([^/]++)(*:227)'
                        .'|book/([^/]++)(*:248)'
                    .')'
                    .'|/member/user/([^/]++)(*:278)'
                    .'|/shopping/cart/([^/]++)(*:309)'
                    .'|/book/show/([^/]++)(*:336)'
                    .'|/g(?'
                        .'|enre/([^/]++)(*:362)'
                        .'|od/(?'
                            .'|makeAdmin/([^/]++)(*:394)'
                            .'|removeAdmin/([^/]++)(*:422)'
                        .')'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:463)'
                        .'|wdt/([^/]++)(*:483)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:529)'
                                .'|router(*:543)'
                                .'|exception(?'
                                    .'|(*:563)'
                                    .'|\\.css(*:576)'
                                .')'
                            .')'
                            .'|(*:586)'
                        .')'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            39 => [[['_route' => 'remove_evaluation', '_controller' => 'App\\Controller\\Admin\\HomepageController::removeEvaluation'], ['id'], null, null, false, true, null]],
            66 => [[['_route' => 'edit_quote', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editQuote'], ['id'], null, null, false, true, null]],
            87 => [[['_route' => 'edit_genre', '_controller' => 'App\\Controller\\Admin\\ManageBookController::editGenre'], ['name'], null, null, false, true, null]],
            110 => [[['_route' => 'edit_edition', '_controller' => 'App\\Controller\\Admin\\ManageBookController::editEdition'], ['name'], null, null, false, true, null]],
            148 => [[['_route' => 'edit_author', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editAuthorDetails'], ['surname'], null, null, false, true, null]],
            170 => [[['_route' => 'edit_author_image', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editAuthorImage'], ['surname'], null, null, false, true, null]],
            198 => [[['_route' => 'edit_book_image', '_controller' => 'App\\Controller\\Admin\\ManageBookController::editBookImage'], ['id'], null, null, false, true, null]],
            227 => [[['_route' => 'remove_quote', '_controller' => 'App\\Controller\\Admin\\ManageAuthorController::removeQuote'], ['id'], null, null, false, true, null]],
            248 => [[['_route' => 'edit_book', '_controller' => 'App\\Controller\\Admin\\ManageBookController::editBookDetails'], ['id'], null, null, false, true, null]],
            278 => [[['_route' => 'show_user', '_controller' => 'App\\Controller\\MemberController::showUser'], ['id'], null, null, false, true, null]],
            309 => [[['_route' => 'shopping_cart', '_controller' => 'App\\Controller\\ShoppingCartController::addToShoppingCart'], ['id'], null, null, false, true, null]],
            336 => [[['_route' => 'show_book', '_controller' => 'App\\Controller\\StoreController::showBook'], ['id'], null, null, false, true, null]],
            362 => [[['_route' => 'show_genre', '_controller' => 'App\\Controller\\StoreController::listeGenre'], ['name'], null, null, false, true, null]],
            394 => [[['_route' => 'make_admin', '_controller' => 'App\\Controller\\SuperAdmin\\RoleController::makeAdmin'], ['id'], null, null, false, true, null]],
            422 => [[['_route' => 'remove_admin', '_controller' => 'App\\Controller\\SuperAdmin\\RoleController::removeAdmin'], ['id'], null, null, false, true, null]],
            463 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            483 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            529 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            543 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            563 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            576 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            586 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        ];
    }
}
