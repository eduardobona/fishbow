<?php
class Application_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $container = new Zend_Navigation(array(
        	array(
                'label'       => 'Painel',
                'module'      => 'admin',
                'controller'  => 'index',
                'action'      => 'index',
                'pages'       => array(
                    array(
                        'label'       => 'Usuários',
        		        'module'      => 'admin',
        		        'controller'  => 'user',
        		        'action'      => 'index',
        		        'pages'       => array(
                            array(
                                'label'       => 'Cadastrar',
                		        'module'      => 'admin',
                		        'controller'  => 'user',
                		        'action'      => 'add',
                            ),
        		            array(
                                'label'       => 'Editar',
                		        'module'      => 'admin',
                		        'controller'  => 'user',
                		        'action'      => 'edit',
                            ),
        		            array(
                                'label'       => 'Perfil',
                		        'module'      => 'admin',
                		        'controller'  => 'user',
                		        'action'      => 'show',
                            ),
        		            array(
                                'label'       => 'Excluir',
                		        'module'      => 'admin',
                		        'controller'  => 'user',
                		        'action'      => 'delete',
                            ),
        		        ),
                    ),
                )
            )
        ));
        Zend_Registry::set('Navigation', $container);
    }
}