<?php
class Default_Bootstrap extends Zend_Application_Module_Bootstrap
{
	protected function _initView()
	{
	    /*
	    $bootstrap = $this->getApplication();
	    $view = $bootstrap->getResource('view');

	    $container = new Zend_Navigation($pages);
	    $view->getHelper('navigation')->setContainer($container);
	    */
	}
	
	public function _initPlugin()
	{
	}
}
