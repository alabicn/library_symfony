<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'home_admin' => [[], ['_controller' => 'App\\Controller\\Admin\\HomepageController::index'], [], [['text', '/admin/']], [], []],
        'all_authors' => [[], ['_controller' => 'App\\Controller\\Admin\\HomepageController::listeAuthors'], [], [['text', '/admin/allAuthors']], [], []],
        'all_books' => [[], ['_controller' => 'App\\Controller\\Admin\\HomepageController::listeBooks'], [], [['text', '/admin/allBooks']], [], []],
        'all_genres' => [[], ['_controller' => 'App\\Controller\\Admin\\HomepageController::listeGenres'], [], [['text', '/admin/allGenres']], [], []],
        'all_editions' => [[], ['_controller' => 'App\\Controller\\Admin\\HomepageController::listeEditions'], [], [['text', '/admin/allEditions']], [], []],
        'remove_evaluation' => [['id'], ['_controller' => 'App\\Controller\\Admin\\HomepageController::removeEvaluation'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/evaluation']], [], []],
        'add_author' => [[], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::insertAuthor'], [], [['text', '/admin/manage/author/addAuthor']], [], []],
        'edit_author' => [['surname'], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editAuthorDetails'], [], [['variable', '/', '[^/]++', 'surname', true], ['text', '/admin/manage/author']], [], []],
        'edit_author_image' => [['surname'], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editAuthorImage'], [], [['variable', '/', '[^/]++', 'surname', true], ['text', '/admin/manage/author/Image']], [], []],
        'add_quote' => [[], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::addQuote'], [], [['text', '/admin/addQuote']], [], []],
        'edit_quote' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::editQuote'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/editQuote']], [], []],
        'remove_quote' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ManageAuthorController::removeQuote'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/removeQuote']], [], []],
        'add_book' => [[], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::insertBook'], [], [['text', '/admin/addBook']], [], []],
        'edit_book' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::editBookDetails'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/book']], [], []],
        'edit_book_image' => [['id'], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::editBookImage'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/manage/book/Image']], [], []],
        'add_genre' => [[], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::insertGenre'], [], [['text', '/admin/addGenre']], [], []],
        'edit_genre' => [['name'], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::editGenre'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/admin/editGenre']], [], []],
        'add_edition' => [[], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::insertEdition'], [], [['text', '/admin/addEdition']], [], []],
        'edit_edition' => [['name'], ['_controller' => 'App\\Controller\\Admin\\ManageBookController::editEdition'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/admin/editEdition']], [], []],
        'shopping_cart' => [['id'], ['_controller' => 'App\\Controller\\CartController::addToCart'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/shopping/cart']], [], []],
        'show_cart' => [[], ['_controller' => 'App\\Controller\\CartController::showCart'], [], [['text', '/cart/show']], [], []],
        'remove_from_cart' => [['id'], ['_controller' => 'App\\Controller\\CartController::removeFromCart'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/cart/book']], [], []],
        'homepage' => [[], ['_controller' => 'App\\Controller\\HomepageController::index'], [], [['text', '/']], [], []],
        'libraries' => [[], ['_controller' => 'App\\Controller\\HomepageController::ajaxGetLibraries'], [], [['text', '/libraries']], [], []],
        'randquote' => [[], ['_controller' => 'App\\Controller\\HomepageController::ajaxRandomQuote'], [], [['text', '/random']], [], []],
        'profile_page' => [[], ['_controller' => 'App\\Controller\\MemberController::index'], [], [['text', '/member/']], [], []],
        'show_user' => [['id'], ['_controller' => 'App\\Controller\\MemberController::showUser'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/member/user']], [], []],
        'app_security_register' => [[], ['_controller' => 'App\\Controller\\SecurityController::registerAction'], [], [['text', '/register']], [], []],
        'login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
        'password_update' => [[], ['_controller' => 'App\\Controller\\SecurityController::updatePassword'], [], [['text', '/password-update']], [], []],
        'forgotten_password' => [[], ['_controller' => 'App\\Controller\\SecurityController::forgottenPassword'], [], [['text', '/forgotten_password']], [], []],
        'reset_password' => [['token'], ['_controller' => 'App\\Controller\\SecurityController::resetPassword'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/reset_password']], [], []],
        'show_book' => [['id'], ['_controller' => 'App\\Controller\\StoreController::showBook'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/book/show']], [], []],
        'show_genre' => [['name'], ['_controller' => 'App\\Controller\\StoreController::listeGenre'], [], [['variable', '/', '[^/]++', 'name', true], ['text', '/genre']], [], []],
        'edit_evaluation' => [['id'], ['_controller' => 'App\\Controller\\StoreController::editUsersEvaluation'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/editEvaluation']], [], []],
        'home_super_admin' => [[], ['_controller' => 'App\\Controller\\SuperAdmin\\RoleController::showAllUsers'], [], [['text', '/god/']], [], []],
        'make_admin' => [['id'], ['_controller' => 'App\\Controller\\SuperAdmin\\RoleController::makeAdmin'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/god/makeAdmin']], [], []],
        'remove_admin' => [['id'], ['_controller' => 'App\\Controller\\SuperAdmin\\RoleController::removeAdmin'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/god/removeAdmin']], [], []],
        '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
        '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
        '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
        '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
        '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
        '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
        '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
        '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        'logout' => [[], [], [], [['text', '/logout']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
