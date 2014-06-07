<?php
class Application_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		$module = $request->getModuleName();
		$controller = $request->getControllerName();
		
		if ($module == 'admin') {
			$auth = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session($module));
			$session = new Zend_Session_Namespace($auth->getStorage()->getNamespace());
			$session->setExpirationSeconds(28800);
				
			if (!$auth->hasIdentity()) {
				$request->setModuleName($module);
				$request->setControllerName('login');
			}
		}
		
		if ($module == 'default') {
		    if ($controller == 'votacao' OR $controller == 'assunto') {
		        $auth = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session($module));
		        $session = new Zend_Session_Namespace($auth->getStorage()->getNamespace());
		        $session->setExpirationSeconds(28800);
		        
		        if (!$auth->hasIdentity()) {
		        	$request->setModuleName($module);
		        	$request->setControllerName('login');
		        }
		    }
		}
	}
}