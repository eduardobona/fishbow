<?php
class VotacaoController extends Zend_Controller_Action {
	
	// model a ser utilizado por todos os actions
	protected $model;
	
	// é executada em todos os actions
	public function init() {

	}
	
	// criando index action http://localhost ou http://localhost/index ou http://localhost/index/index
	public function indexAction() {
        $id = $this->getParam("id");
        
        if (empty($id) OR $this->_model->find($id)->count() == 0) {
            $this->_helper->redirector('index');
        }

        $model_votacao = new Application_Model_AssuntoVotos();
        $model_votacao->cadastrar($id);

        $this->_helper->redirector('index');
	}
}