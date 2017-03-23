<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'site_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'SiteBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/analyzer',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_help' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::helpAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/analyzer/help',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_descriptorBar' => array (  0 =>   array (    0 => 'category',  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::descriptorBarAction',    'category' => 0,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'category',    ),    1 =>     array (      0 => 'text',      1 => '/analyzer/descriptor-bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_descriptorTree' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::descriptorTreeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/analyzer/descriptor-tree',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_breakdownTimeline' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::breakdownTimelineAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/analyzer/breakdown-timeline',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_ajax_descriptors' => array (  0 =>   array (    0 => 'category',  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getDescriptorsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'category',    ),    1 =>     array (      0 => 'text',      1 => '/analyzer/ajaxDescriptors',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_ajax_nodes' => array (  0 =>   array (    0 => 'category',  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getNodesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'category',    ),    1 =>     array (      0 => 'text',      1 => '/analyzer/ajaxNodes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_ajax_edges' => array (  0 =>   array (    0 => 'category',  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getEdgesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'category',    ),    1 =>     array (      0 => 'text',      1 => '/analyzer/ajaxEdges',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'analyzer_ajax_breakdown_timeline' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getBreakdownTimelineAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/analyzer/ajaxTimeline',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/breakdown',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown_timeline' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::timelineAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/breakdown/timeline',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/breakdown/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/operator/breakdown',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/operator/breakdown',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_breakdown_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\BreakdownController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/operator/breakdown',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_ajax_breakdown_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::breakdownShowAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/operator/ajax/breakdown/show',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_ajax_descriptor_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::descriptorShowAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/operator/ajax/descriptor/show',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_ajax_breakdown_timeline' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::timelineAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/ajax/breakdown/timeline',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_ajax_descriptor_searchExact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchExactByLabelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/ajax/descriptor/searchExact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'operator_ajax_sequence_searchMatching' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchMatchingSequenceAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/operator/ajax/descriptor/searchMatchingSequence',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'breakdown_ajax_searchAll' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchAllByLabelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/breakdown_ajax_searchAll',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'breakdown_ajax_searchExact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchExactByLabelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/breakdown_ajax_searchExact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'breakdown_ajax_addDescriptor' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OperatorBundle\\Controller\\AjaxController::addDescriptorAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/breakdown_ajax_addDescriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'breakdown_ajax_searchOne' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::searchOneByLabelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/breakdown_ajax_searchOne',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager/synonym',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager/synonym/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/synonym',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym_show_descriptor' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::descriptorAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/synonym/descriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/synonym',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_synonym_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\SynonymController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/synonym',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_descriptor' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DescriptorController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager/descriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_descriptor_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DescriptorController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager/descriptor/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_descriptor_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DescriptorController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/descriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_descriptor_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DescriptorController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/descriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_descriptor_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\DescriptorController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/manager/descriptor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'manager_interfero' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle:Interfero:index',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/manager/interfero',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ajax_synonym_delete' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\AjaxController::deleteSynonymAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ajaxSynonymDelete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ajax_descriptor_delete' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'ManagerBundle\\Controller\\AjaxController::deleteDescriptorAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/ajaxDescriptorDelete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_js_routing_js' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'fos_js_routing.controller:indexAction',    '_format' => 'js',  ),  2 =>   array (    '_format' => 'js|json',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'js|json',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/js/routing',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\SecurityController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_show' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_register' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirm' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/register/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirmed' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/confirmed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_request' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/request',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_send_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/send-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_reset' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/resetting/reset',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_change_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/change-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'jms_translation_update_message' => array (  0 =>   array (    0 => 'config',    1 => 'domain',    2 => 'locale',  ),  1 =>   array (    'id' => NULL,    '_controller' => 'JMS\\TranslationBundle\\Controller\\ApiController::updateMessageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/messages',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'locale',    ),    2 =>     array (      0 => 'text',      1 => '/locales',    ),    3 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'domain',    ),    4 =>     array (      0 => 'text',      1 => '/domains',    ),    5 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'config',    ),    6 =>     array (      0 => 'text',      1 => '/_trans/api/configs',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'jms_translation_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JMS\\TranslationBundle\\Controller\\TranslateController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_trans/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
