<?php
class Zend_View_Helper_FlashMessages extends Zend_View_Helper_Abstract
{
	public function flashMessages() 
	{ 
		$messages = Zend_Controller_Action_HelperBroker::getStaticHelper("FlashMessenger")->getMessages();
		$output = null;
		
		if (!empty($messages)) {
			foreach ($messages as $message) {
				$output = '<div class="alert alert-'. key($message) . ' alert-dismissable">';
				$output .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				$output .= current($message);
				$output .= '</div>';
			}
		}
		return $output;
	}
}
?>