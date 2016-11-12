<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // site_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site_homepage');
            }

            return array (  '_controller' => 'SiteBundle\\Controller\\DefaultController::indexAction',  '_route' => 'site_homepage',);
        }

        if (0 === strpos($pathinfo, '/analyzer')) {
            // analyzer_homepage
            if ($pathinfo === '/analyzer') {
                return array (  '_controller' => 'AnalyzerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'analyzer_homepage',);
            }

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

            if (0 === strpos($pathinfo, '/operator/breakdown')) {
                // operator_breakdown
                if ($pathinfo === '/operator/breakdown') {
                    return array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::indexAction',  '_route' => 'operator_breakdown',);
                }

                // operator_breakdown_timeline
                if ($pathinfo === '/operator/breakdown/timeline') {
                    return array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::timelineAction',  '_route' => 'operator_breakdown_timeline',);
                }

                // operator_breakdown_new
                if ($pathinfo === '/operator/breakdown/new') {
                    return array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::newAction',  '_route' => 'operator_breakdown_new',);
                }

                // operator_breakdown_show
                if (preg_match('#^/operator/breakdown/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operator_breakdown_show')), array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::showAction',));
                }

                // operator_breakdown_edit
                if (preg_match('#^/operator/breakdown/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operator_breakdown_edit')), array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::editAction',));
                }

                // operator_breakdown_delete
                if (preg_match('#^/operator/breakdown/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'operator_breakdown_delete')), array (  '_controller' => 'OperatorBundle\\Controller\\BreakdownController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/operator/ajax')) {
                if (0 === strpos($pathinfo, '/operator/ajax/breakdown')) {
                    // operator_ajax_breakdown_show
                    if (0 === strpos($pathinfo, '/operator/ajax/breakdown/show') && preg_match('#^/operator/ajax/breakdown/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'operator_ajax_breakdown_show')), array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::breakdownShowAction',));
                    }

                    // operator_ajax_breakdown_timeline
                    if ($pathinfo === '/operator/ajax/breakdown/timeline') {
                        return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::timelineAction',  '_route' => 'operator_ajax_breakdown_timeline',);
                    }

                }

                if (0 === strpos($pathinfo, '/operator/ajax/descriptor/search')) {
                    // operator_ajax_descriptor_searchExact
                    if ($pathinfo === '/operator/ajax/descriptor/searchExact') {
                        return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchExactByLabelAction',  '_route' => 'operator_ajax_descriptor_searchExact',);
                    }

                    // operator_ajax_sequence_searchMatching
                    if ($pathinfo === '/operator/ajax/descriptor/searchMatchingSequence') {
                        return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchMatchingSequenceAction',  '_route' => 'operator_ajax_sequence_searchMatching',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/breakdown_ajax_')) {
            if (0 === strpos($pathinfo, '/breakdown_ajax_search')) {
                // breakdown_ajax_searchAll
                if ($pathinfo === '/breakdown_ajax_searchAll') {
                    return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchAllByLabelAction',  '_route' => 'breakdown_ajax_searchAll',);
                }

                // breakdown_ajax_searchExact
                if ($pathinfo === '/breakdown_ajax_searchExact') {
                    return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::searchExactByLabelAction',  '_route' => 'breakdown_ajax_searchExact',);
                }

            }

            // breakdown_ajax_addDescriptor
            if ($pathinfo === '/breakdown_ajax_addDescriptor') {
                return array (  '_controller' => 'OperatorBundle\\Controller\\AjaxController::addDescriptorAction',  '_route' => 'breakdown_ajax_addDescriptor',);
            }

            // breakdown_ajax_searchOne
            if ($pathinfo === '/breakdown_ajax_searchOne') {
                return array (  '_controller' => 'AppBundle\\Controller\\BreakdownAjaxController::searchOneByLabelAction',  '_route' => 'breakdown_ajax_searchOne',);
            }

        }

        if (0 === strpos($pathinfo, '/manager')) {
            // manager_homepage
            if ($pathinfo === '/manager') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\DefaultController::indexAction',  '_route' => 'manager_homepage',);
            }

            if (0 === strpos($pathinfo, '/manager/synonym')) {
                // manager_synonym
                if ($pathinfo === '/manager/synonym') {
                    return array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::indexAction',  '_route' => 'manager_synonym',);
                }

                // manager_synonym_new
                if ($pathinfo === '/manager/synonym/new') {
                    return array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::newAction',  '_route' => 'manager_synonym_new',);
                }

                // manager_synonym_show
                if (preg_match('#^/manager/synonym/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_synonym_show')), array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::showAction',));
                }

                // manager_synonym_show_descriptor
                if (0 === strpos($pathinfo, '/manager/synonym/descriptor') && preg_match('#^/manager/synonym/descriptor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_synonym_show_descriptor')), array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::descriptorAction',));
                }

                // manager_synonym_edit
                if (preg_match('#^/manager/synonym/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_synonym_edit')), array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::editAction',));
                }

                // manager_synonym_delete
                if (preg_match('#^/manager/synonym/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_synonym_delete')), array (  '_controller' => 'ManagerBundle\\Controller\\SynonymController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/manager/descriptor')) {
                // manager_descriptor
                if ($pathinfo === '/manager/descriptor') {
                    return array (  '_controller' => 'ManagerBundle\\Controller\\DescriptorController::indexAction',  '_route' => 'manager_descriptor',);
                }

                // manager_descriptor_new
                if ($pathinfo === '/manager/descriptor/new') {
                    return array (  '_controller' => 'ManagerBundle\\Controller\\DescriptorController::newAction',  '_route' => 'manager_descriptor_new',);
                }

                // manager_descriptor_show
                if (preg_match('#^/manager/descriptor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_descriptor_show')), array (  '_controller' => 'ManagerBundle\\Controller\\DescriptorController::showAction',));
                }

                // manager_descriptor_edit
                if (preg_match('#^/manager/descriptor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_descriptor_edit')), array (  '_controller' => 'ManagerBundle\\Controller\\DescriptorController::editAction',));
                }

                // manager_descriptor_delete
                if (preg_match('#^/manager/descriptor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'manager_descriptor_delete')), array (  '_controller' => 'ManagerBundle\\Controller\\DescriptorController::deleteAction',));
                }

            }

            // manager_interfero
            if ($pathinfo === '/manager/interfero') {
                return array (  '_controller' => 'ManagerBundle:Interfero:index',  '_route' => 'manager_interfero',);
            }

        }

        if (0 === strpos($pathinfo, '/ajax')) {
            // ajax_synonym_delete
            if ($pathinfo === '/ajaxSynonymDelete') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::deleteSynonymAction',  '_route' => 'ajax_synonym_delete',);
            }

            // ajax_descriptor_delete
            if ($pathinfo === '/ajaxDescriptorDelete') {
                return array (  '_controller' => 'ManagerBundle\\Controller\\AjaxController::deleteDescriptorAction',  '_route' => 'ajax_descriptor_delete',);
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

                    return array (  '_controller' => 'UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_security_logout;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
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

        if (0 === strpos($pathinfo, '/_trans')) {
            // jms_translation_update_message
            if (0 === strpos($pathinfo, '/_trans/api/configs') && preg_match('#^/_trans/api/configs/(?P<config>[^/]++)/domains/(?P<domain>[^/]++)/locales/(?P<locale>[^/]++)/messages$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_jms_translation_update_message;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jms_translation_update_message')), array (  'id' => NULL,  '_controller' => 'JMS\\TranslationBundle\\Controller\\ApiController::updateMessageAction',));
            }
            not_jms_translation_update_message:

            // jms_translation_index
            if (rtrim($pathinfo, '/') === '/_trans') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'jms_translation_index');
                }

                return array (  '_controller' => 'JMS\\TranslationBundle\\Controller\\TranslateController::indexAction',  '_route' => 'jms_translation_index',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
