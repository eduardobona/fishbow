<?php
class Default_Form_Tema extends Application_Class_Form_Base
{
    protected $_id;
    protected $_current_user;    
    
    public function __construct($id)
    {
        $this->_id = $id;
        $this->_model = new Application_Model_Temas();        
        
        if (is_numeric($id)) {
        	$this->_object = $this->_model->find($id)->current();
        }
        if (is_null($id) AND is_null($this->_object)) {
            $this->_object = $this->_model->createRow();
        }
        
        $module = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();
        $this->_current_user = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session($module))->getIdentity();
        
        parent::__construct();
    }
	public function init()
	{
	    $this->setName('tema');
	    
		$this->setMethod('post');
		if ($this->_id) {
		    $this->setAction("/admin/tema/edit/id/" . $this->_id);
		}
		else {
		    $this->setAction("/admin/tema/add");
		}
		                
		$this->setAttrib('class', 'panel-body');		
		
                //dados que o aluno edita
                
		$titulo = new Zend_Form_Element_Text('titulo');
		$titulo->setLabel('Titulo')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control')
		->addFilter('StripTags')
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Salvar')
		->setAttrib('class', 'btn btn-success');
                
		$this->addElements(array($titulo, $submit));
		
		if ($this->_id) {
		    $this->editForm();
		}
    }
    
    public function editForm()
    {            
	return $this;
    }
    
    public function getTema()
    {
        return $this->_object;
    }
    
}