<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	protected function _initDoctype() {
		$this->bootstrap ( 'view' );
		$view = $this->getResource ( 'view' );
		$view->doctype ( 'HTML5' );
	}
	
	public function _initAutoLoader() {
		$loader = new Zend_Loader_Autoloader_Resource ( array (
				"basePath" => APPLICATION_PATH,
				"namespace" => "Application" 
		) );
		$loader->addResourceType ( "class", "class/", "Class" );
		$loader->addResourceType ( "model", "models/", "Model" );
		$loader->addResourceType ( "plugin", "plugins/", "Plugin" );
		/*
		 * $config = new Zend_Config_Ini('../application/configs/application.ini', 'staging'); print_r($config->resources->db); exit();
		 */
	}
	
	protected function _initLayout() {
		Zend_Layout::startMvc ( array (
				'pluginClass' => 'Application_Plugin_Layout' 
		) );
	}
	
	public function _initPlugin() {
		$front = Zend_Controller_Front::getInstance ();
		
		// $front->registerPlugin(new Application_Plugin_Route());
		// $front->registerPlugin(new Application_Plugin_Translate());
		$front->registerPlugin ( new Application_Plugin_Error () );
		$front->registerPlugin ( new Application_Plugin_Auth () );
		$front->registerPlugin ( new Application_Plugin_Navigation () );
	}
	
	protected function _initRequest() {
		
	}
}

