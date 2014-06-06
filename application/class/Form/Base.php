<?php 
class Application_Class_Form_Base extends Zend_Form
{
	protected $_model;
	protected $_object;
	
	public function getValues($supress = FALSE)
	{
		$data = parent::getValues($supress);
		
		if (NULL === $this->_object) {
			return $data;
		} 
		
		try {
			$this->_object->setFromArray($data);
			return $this->_object;
		}
		catch (Exception $e) {
			echo $e->getMessage();
			$this->addError($e->getMessage());
		}
		
		return FALSE;
	}
}