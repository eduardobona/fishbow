<?php
class Default_Form_Assunto extends Application_Class_Form_Base
{
    protected $_id;
    protected $_current_user;    
    
    public function __construct($id)
    {
        $this->_id = $id;
        $this->_model = new Application_Model_Assuntos();
        $this->_model_temas = new Application_Model_Temas();
        
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
	    $this->setName('assunto');
	    
		$this->setMethod('post');
		if ($this->_id) {
		    $this->setAction("/admin/assunto/edit/id/" . $this->_id);
		}
		else {
		    $this->setAction("/admin/assunto/add");
		}
		
		$this->setAttrib('class', 'panel-body');				
		
		$titulo = new Zend_Form_Element_Text('titulo');
		$titulo->setLabel('Titulo')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control')
		->addFilter('StripTags')
		->addValidator('NotEmpty');		
                
                $temas = new Zend_Form_Element_Multiselect("tema");
		$temas->setLabel('Temas')
		->setDecorators(array('Composite'))
		->setAttrib('class', 'form-control select2');
		foreach ($this->_model_temas->getTemas() as $tema) {
		    $temas->addMultiOption($tema->getId(), $tema->getTitulo());
		}                                		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Salvar')
		->setAttrib('class', 'btn btn-success');

		$this->addElements(array($titulo, $temas, $submit));
		
		if ($this->_id) {
		    $this->editForm();
		}
    }
    
    public function editForm()
    {        
        $temas = array();
        foreach ($this->getAssunto()->getTemas() as $tema) {
            $temas[] = $tema->getId();
        }
        $populate = $this->_object->toArray();
        $populate["temas"] = $temas;
        $this->populate($populate);
        
		return $this;
    }
    
    public function getAssunto()
    {
        return $this->_object;
    }
    
}