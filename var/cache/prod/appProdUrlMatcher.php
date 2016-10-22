<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // site_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site_homepage');
            }

            return array (  '_controller' => 'SiteBundle\\Controller\\DefaultController::indexAction',  '_route' => 'site_homepage',);
        }

        if (0 === strpos($pathinfo, '/analyzer')) {
            if (0 === strpos($pathinfo, '/analyzer/descriptor-')) {
                // analyzer_descriptorBar
                if (0 === strpos($pathinfo, '/analyzer/descriptor-bar') && preg_match('#^/analyzer/descriptor\\-bar(?:/(?P<category>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyzer_descriptorBar')), array (  '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::descriptorBarAction',  'category' => 0,));
                }

                // analyzer_descriptorTree
                if ($pathinfo === '/analyzer/descriptor-tree') {
                    return array (  '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::descriptorTreeAction',  '_route' => 'analyzer_descriptorTree',);
                }

            }

            // analyzer_breakdownTimeline
            if ($pathinfo === '/analyzer/breakdown-timeline') {
                return array (  '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::breakdownTimelineAction',  '_route' => 'analyzer_breakdownTimeline',);
            }

            if (0 === strpos($pathinfo, '/analyzer/ajax')) {
                // analyzer_ajax_descriptors
                if (0 === strpos($pathinfo, '/analyzer/ajaxDescriptors') && preg_match('#^/analyzer/ajaxDescriptors/(?P<category>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyzer_ajax_descriptors')), array (  '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getDescriptorsAction',));
                }

                // analyzer_ajax_nodes
                if (0 === strpos($pathinfo, '/analyzer/ajaxNodes') && preg_match('#^/analyzer/ajaxNodes/(?P<category>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyzer_ajax_nodes')), array (  '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getNodesAction',));
                }

                // analyzer_ajax_edges
                if (0 === strpos($pathinfo, '/analyzer/ajaxEdges') && preg_match('#^/analyzer/ajaxEdges/(?P<category>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'analyzer_ajax_edges')), array (  '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getEdgesAction',));
                }

                // analyzer_ajax_breakdown_timeline
                if ($pathinfo === '/analyzer/ajaxTimeline') {
                    return array (  '_controller' => 'AnalyzerBundle\\Controller\\AjaxController::getBreakdownTimelineAction',  '_route' => 'analyzer_ajax_breakdown_timeline',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/operator')) {
            // operator_homepage
            if ($pathinfo === '/operator') {
                return array (  '_controller' => 'OperatorBundle\\Controller\\DefaultController::indexAction',  '_route' => 'operator_homepage',);
            }

            // operator_breakdown_show
            if (0 === strpos($pathinfo, '/operator/breakdown/show') && preg_match('#^/operator/breakdown/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'operator_breakdown_show')), array (  '_controller' => 'OperatorBundle:Breakdown:show',));
            }

        }

        if (0 === strpos($pathinfo, '/synonym')) {
            // synonym_index
            if (rtrim($pathinfo, '/') === '/synonym') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_synonym_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'synonym_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\SynonymController::indexAction',  '_route' => 'synonym_index',);
            }
            not_synonym_index:

            // synonym_new
            if ($pathinfo === '/synonym/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_synonym_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\SynonymController::newAction',  '_route' => 'synonym_new',);
            }
            not_synonym_new:

            // synonym_show
            if (preg_match('#^/synonym/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_synonym_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'synonym_show')), array (  '_controller' => 'AppBundle\\Controller\\SynonymController::showAction',));
            }
            not_synonym_show:

            // synonym_edit
            if (preg_match('#^/synonym/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_synonym_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'synonym_edit')), array (  '_controller' => 'AppBundle\\Controller\\SynonymController::editAction',));
            }
            not_synonym_edit:

            // synonym_delete
            if (preg_match('#^/synonym/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_synonym_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'synonym_delete')), array (  '_controller' => 'AppBundle\\Controller\\SynonymController::deleteAction',));
            }
            not_synonym_delete:

        }

        if (0 === strpos($pathinfo, '/descriptor')) {
            // descriptor_index
            if (rtrim($pathinfo, '/') === '/descriptor') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_descriptor_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'descriptor_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DescriptorController::indexAction',  '_route' => 'descriptor_index',);
            }
            not_descriptor_index:

            // descriptor_new
            if ($pathinfo === '/descriptor/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_descriptor_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\DescriptorController::newAction',  '_route' => 'descriptor_new',);
            }
            not_descriptor_new:

            // descriptor_show
            if (preg_match('#^/descriptor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_descriptor_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'descriptor_show')), array (  '_controller' => 'AppBundle\\Controller\\DescriptorController::showAction',));
            }
            not_descriptor_show:

            // descriptor_edit
            if (preg_match('#^/descriptor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_descriptor_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'descriptor_edit')), array (  '_controller' => 'AppBundle\\Controller\\DescriptorController::editAction',));
            }
            not_descriptor_edit:

            // descriptor_delete
            if (preg_match('#^/descriptor/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_descriptor_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'descriptor_delete')), array (  '_controller' => 'AppBundle\\Controller\\DescriptorController::deleteAction',));
            }
            not_descriptor_delete:

        }

        if (0 === strpos($pathinfo, '/breakdown')) {
            // breakdown_index
            if (rtrim($pathinfo, '/') === '/breakdown') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_breakdown_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'breakdown_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\BreakdownController::indexAction',  '_route' => 'breakdown_index',);
            }
            not_breakdown_index:

            // breakdown_new
            if ($pathinfo === '/breakdown/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_breakdown_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\BreakdownController::newAction',  '_route' => 'breakdown_new',);
            }
            not_breakdown_new:

            // breakdown_show
            if (preg_match('#^/breakdown/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_breakdown_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'breakdown_show')), array (  '_controller' => 'AppBundle\\Controller\\BreakdownController::showAction',));
            }
            not_breakdown_show:

            // breakdown_edit
            if (preg_match('#^/breakdown/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_breakdown_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'breakdown_edit')), array (  '_controller' => 'AppBundle\\Controller\\BreakdownController::editAction',));
            }
            not_breakdown_edit:

            // breakdown_delete
            if (preg_match('#^/breakdown/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_breakdown_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'breakdown_delete')), array (  '_controller' => 'AppBundle\\Controller\\BreakdownController::deleteAction',));
            }
            not_breakdown_delete:

        }

        if (0 === strpos($pathinfo, '/person')) {
            // person_index
            if (rtrim($pathinfo, '/') === '/person') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_person_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'person_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\PersonController::indexAction',  '_route' => 'person_index',);
            }
            not_person_index:

            // person_new
            if ($pathinfo === '/person/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_person_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\PersonController::newAction',  '_route' => 'person_new',);
            }
            not_person_new:

            // person_show
            if (preg_match('#^/person/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_person_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'person_show')), array (  '_controller' => 'AppBundle\\Controller\\PersonController::showAction',));
            }
            not_person_show:

            // person_edit
            if (preg_match('#^/person/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_person_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'person_edit')), array (  '_controller' => 'AppBundle\\Controller\\PersonController::editAction',));
            }
            not_person_edit:

            // person_delete
            if (preg_match('#^/person/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_person_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'person_delete')), array (  '_controller' => 'AppBundle\\Controller\\PersonController::deleteAction',));
            }
            not_person_delete:

        }

        if (0 === strpos($pathinfo, '/breakdown_ajax_')) {
            if (0 === strpos($pathinfo, '/breakdown_ajax_search')) {
                // breakdown_ajax_searchAll
                if ($pathinfo === '/breakdown_ajax_searchAll') {
                    return array (  '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::searchAllByLabelAction',  '_route' => 'breakdown_ajax_searchAll',);
                }

                // breakdown_ajax_searchExact
                if ($pathinfo === '/breakdown_ajax_searchExact') {
                    return array (  '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::searchExactByLabelAction',  '_route' => 'breakdown_ajax_searchExact',);
                }

                // breakdown_ajax_searchOne
                if ($pathinfo === '/breakdown_ajax_searchOne') {
                    return array (  '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::searchOneByLabelAction',  '_route' => 'breakdown_ajax_searchOne',);
                }

            }

            // breakdown_ajax_addDescriptor
            if ($pathinfo === '/breakdown_ajax_addDescriptor') {
                return array (  '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::addDescriptorAction',  '_route' => 'breakdown_ajax_addDescriptor',);
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'ManagerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/event')) {
            // manager_event_index
            if ($pathinfo === '/event') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\EventController::indexAction',  '_route' => 'manager_event_index',);
            }

            // manager_event_create
            if ($pathinfo === '/event/create') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\EventController::createAction',  '_route' => 'manager_event_create',);
            }

            // manager_event_new
            if ($pathinfo === '/event/new') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\EventController::newAction',  '_route' => 'manager_event_new',);
            }

            // manager_event_show
            if (preg_match('#^/event/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_event_show')), array (  '_controller' => 'ManagerBundle\\Controller\\EventController::showAction',));
            }

            // manager_event_delete
            if (preg_match('#^/event/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_event_delete')), array (  '_controller' => 'ManagerBundle\\Controller\\EventController::deleteAction',));
            }

            // manager_event_update
            if (preg_match('#^/event/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_event_update')), array (  '_controller' => 'ManagerBundle\\Controller\\EventController::updateAction',));
            }

        }

        if (0 === strpos($pathinfo, '/ajax_search')) {
            // ajax_searchOneByLabelRoute_element
            if ($pathinfo === '/ajax_searchOneByLabelRoute_element') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchOneByLabelRoute_elementAction',  '_route' => 'ajax_searchOneByLabelRoute_element',);
            }

            // ajax_searchAllByLabelRoute_element
            if ($pathinfo === '/ajax_searchAllByLabelRoute_element') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchAllByLabelRoute_elementAction',  '_route' => 'ajax_searchAllByLabelRoute_element',);
            }

            // ajax_searchOneByLabelRoute_state
            if ($pathinfo === '/ajax_searchOneByLabelRoute_state') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchOneByLabelRoute_stateAction',  '_route' => 'ajax_searchOneByLabelRoute_state',);
            }

            // ajax_searchAllByLabelRoute_state
            if ($pathinfo === '/ajax_searchAllByLabelRoute_state') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchAllByLabelRoute_stateAction',  '_route' => 'ajax_searchAllByLabelRoute_state',);
            }

            // ajax_searchOneByLabelRoute_action
            if ($pathinfo === '/ajax_searchOneByLabelRoute_action') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchOneByLabelRoute_actionAction',  '_route' => 'ajax_searchOneByLabelRoute_action',);
            }

            // ajax_searchAllByLabelRoute_action
            if ($pathinfo === '/ajax_searchAllByLabelRoute_action') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchAllByLabelRoute_actionAction',  '_route' => 'ajax_searchAllByLabelRoute_action',);
            }

            // ajax_searchOneByLabelRoute_contributor
            if ($pathinfo === '/ajax_searchOneByLabelRoute_contributor') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchOneByLabelRoute_contributorAction',  '_route' => 'ajax_searchOneByLabelRoute_contributor',);
            }

            // ajax_searchAllByLabelRoute_contributor
            if ($pathinfo === '/ajax_searchAllByLabelRoute_contributor') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::searchAllByLabelRoute_contributorAction',  '_route' => 'ajax_searchAllByLabelRoute_contributor',);
            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_login;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }
            not_fos_user_security_logout:

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
