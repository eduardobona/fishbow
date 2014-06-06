<?php
class Application_Plugin_Error extends Zend_Controller_Plugin_ErrorHandler
{
	
 	public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
    	$module = $request->getModuleName();
    	
    	if ($module) {
    		$this->setErrorHandlerModule($module);
		    $this->setErrorHandlerController('error');
		    $this->setErrorHandlerAction('error');
    	}
    }
 
}
?>
