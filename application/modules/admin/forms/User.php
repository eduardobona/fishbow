<?php
class Admin_Form_User extends Application_Class_Form_Base
{
    protected $_id;
    protected $_current_user;
    
    public function __construct($id)
    {
        $this->_id = $id;
        $this->_model = new Application_Model_Users();
        
        if (is_numeric($id)) {
        	$this->_object = $this->_model->find($id)->current();
        }
        if (is_null($id) AND is_null($this->_object)) {
            $this->_object = $this->_model->createRow();
        }
        $auth = Zend_Auth::getInstance();
        $this->_current_user = $auth->getIdentity();
        
        parent::__construct();
    }
	public function init()
	{
	    $this->setName('user');
	    
		$this->setMethod('post');
		if ($this->_id) {
		    $this->setAction("/admin/user/edit/id/" . $this->_id);
		}
		else {
		    $this->setAction("/admin/user/add");
		}
		
		$username = new Zend_Form_Element_Text('username');
		$username->setLabel('Usuário')
		->setDecorators(array('Composite'))
		->setAttribs(array(
		    'class' => 'form-control',
		    'maxlength' => '20'
		))
		->setDescription('Somente letras minusculas com no mínimo 6 e máximo 20 caracteres.')
		->addFilter('StringToLower')
		->addValidator('alnum')
		->addValidator('regex', false, array('/^[a-z]+/'))
		->addValidator('stringLength', false, array(6, 20))
		->addValidator('NotEmpty')
		->setRequired(true)
		->addValidator(new Zend_Validate_Db_NoRecordExists(array('table' => 'users', 'field' => 'username')));
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Senha')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control')
		->setDescription('Mínimo 6 caracteres')
		->addValidator('StringLength', false, array(6))
		->setRequired(true);
		
		$password_repeat = new Zend_Form_Element_Password('password_repeat');
		$password_repeat->setLabel('Confirmação da senha')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control')
		->setDescription('Entre novamente com a senha')
		->addValidator('StringLength', false, array(6))
		->addValidator(new Zend_Validate_Identical(array('token'=>'password')))
		->setRequired(true);
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Nome')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control')
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');

		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('E-mail')
		->setDecorators(array('Composite'))
		->setRequired(true)
		->setAttrib('class', 'form-control')
		->addFilter('StringTrim')
		->addValidator('EmailAddress')
		->addValidator(new Zend_Validate_Db_NoRecordExists(array('table' => 'users', 'field' => 'email')));

		$rule = new Zend_Form_Element_Select("rule");
		$rule->setLabel('Grupo')
		->setDecorators(array('Composite'))
		->setRequired()
		->setAttrib('class', 'form-control select2')
		->addMultiOption('1', 'Administrador')
		->addMultiOption('2', 'Usuário');
		
		$status = new Zend_Form_Element_Select("status");
		$status->setLabel('Estado')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control select2')
		->addMultiOption('1', 'Ativo')
		->addMultiOption('0', 'Inativo');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Salvar')
		->setAttrib('class', 'btn btn-success');

		$this->addElements(array($username, $password, $password_repeat, $email, $name, $rule, $status, $submit));
		
		if ($this->_id) {
		    $this->editForm();
		}
    }
    
    public function editForm()
    {
        if ($this->_current_user->rule == 2) {
            $this->removeElement('rule');
            $this->removeElement('status');
        }
        
        $this->populate($this->_object->toArray());
        
        $this->getElement('username')->getValidator('Db_NoRecordExists')
        ->setExclude(array('field' => 'id', 'value' => $this->_object->id));
        
        $this->getElement('email')->getValidator('Db_NoRecordExists')
        ->setExclude(array('field' => 'id', 'value' => $this->_object->id));
        
		$this->getElement('password')->setRequired(false);
		$this->getElement('password_repeat')->setRequired(false);
		return $this;
    }
    
    public function getUser()
    {
        return $this->_object;
    }
    
}