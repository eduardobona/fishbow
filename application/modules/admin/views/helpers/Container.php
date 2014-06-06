<?php
class Zend_View_Helper_Container extends Zend_View_Helper_Abstract
{
	public function container() 
	{
	    return Zend_Registry::get('Navigation');
	}
}
?>