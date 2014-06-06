<?php
class Application_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout
{
    public function preDispatch (Zend_Controller_Request_Abstract $request)
    {
    	$module = $request->getModuleName();
    	$controller = $request->getControllerName();
    	
    	$pathLayout = "../application/layouts/scripts/";
    	
    	switch ($module)
    	{
    		case ($module == "admin" AND $controller == "login") : 
    			$this->getLayout()->setLayoutPath($pathLayout)->setLayout('login.layout');
    			break;
    		case "admin" :
    			$this->getLayout()->setLayoutPath($pathLayout)->setLayout('admin.layout');
    			break;
    		default: 
    			$this->getLayout()->setLayoutPath($pathLayout)->setLayout('default.layout');
    			break;
    	}
    }
}
