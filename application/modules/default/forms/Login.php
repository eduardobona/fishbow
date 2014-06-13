<?php
class Default_Form_Login extends Zend_Form
{
	public function init()
	{
	    $this->setName('login');
	    
		$this->setMethod('post');
		$this->setAction("/login");
		
		$email = new Zend_Form_Element_Text('email');
		$email->setRequired(true)
		->setAttribs(array(
		    'class' => 'form-control',
		    'autofocus' => 'autofocus',
		    'placeholder' => 'Email'
		))
		->addFilter('StripTags')
		->addFilter('StringTrim');

		$senha = new Zend_Form_Element_Password('senha');
		$senha->setRequired(true)
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

		$this->addElements(array($email, $senha, $submit));
		
		foreach ($this->getElements() as $element) {
		    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
		}

    }
}