<?php
class Application_Plugin_Translate extends Zend_Controller_Plugin_Abstract
{
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
	    $translateValidate = new Zend_Translate(
            array(
                'adapter' => 'array',
                'content' => APPLICATION_PATH . '/../data/locales/pt_BR/Zend_Validate.php',
                'locale' => 'pt'
            )
	    );
	    
	    Zend_Validate_Abstract::setDefaultTranslator($translateValidate);
	}
}