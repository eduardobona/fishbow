<?php
class Admin_Form_Login extends Zend_Form
{
	public function init()
	{
	    $this->setName('login');
	    
		$this->setMethod('post');
		$this->setAction("/admin/login");
		
		$username = new Zend_Form_Element_Text('username');
		$username->setRequired(true)
		->setAttribs(array(
		    'class' => 'form-control',
		    'autofocus' => 'autofocus',
		    'placeholder' => 'Usuário'
		))
		->addFilter('StripTags')
		->addFilter('StringTrim');

		$password = new Zend_Form_Element_Password('password');
		$password->setRequired(true)
		->setAttribs(array(
		    'class' => 'form-control',
		    'placeholder' => 'Senha'
		))
		->addFilter('StripTags')
		->addFilter('StringTrim');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttribs(
			array(
				'id' => 'submitbutton',
				'class' => 'btn btn-success btn-block',
			)
		);

		$this->addElements(array($username, $password, $submit));
		
		foreach ($this->getElements() as $element) {
		    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
		}

    }
}