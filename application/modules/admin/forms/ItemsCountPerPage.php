<?php
class Admin_Form_ItemsCountPerPage extends Application_Class_Form_Base
{
	public function init()
	{
	    $this->setName('itemsperpage');
	    
		$this->setMethod('post');
	    $this->setAttrib('class', 'form-inline input-group-sm');
	    $this->setAttrib('role', 'form');

		$itemsCountPerPage = new Zend_Form_Element_Select('itemsCountPerPage');
		$itemsCountPerPage->setAttribs(array(
		    'class' => 'form-control',
		    //'onchange' => 'refresh()'
		));
		for ($x = 5; $x <= 200; $x *= 2) {
		    $itemsCountPerPage->addMultiOption($x, $x);
		}

		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttribs(array(
			'class' => 'btn btn-sm btn-primary'
		))
		->setLabel('por página');

		$this->addElements(array($itemsCountPerPage, $submit));
		
		foreach ($this->getElements() as $element) {
		    $element->setDecorators(array('ViewHelper'));
		}
    }
}