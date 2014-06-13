<?php
class VotacaoController extends Zend_Controller_Action {
	
	// model a ser utilizado por todos os actions
	protected $_model;
	
	// é executada em todos os actions
	public function init() {
		$this->_model = new Application_Model_AssuntoVotos();
		$this->_auth = Zend_Auth::getInstance()->getIdentity();
	}
	
	// criando index action http://localhost ou http://localhost/index ou http://localhost/index/index
	public function indexAction() {
        $idAssunto = $this->getParam("id");
        
        if (empty($idAssunto) and $this->_model->find($idAssunto)->count() == 0 and ! is_int($idAssunto)) {
            $this->_helper->redirector("index", "index");
        }

        if($this->_model->getAssuntoVotoPorUsuarioPorAssunto($this->_auth->idUsuario, $idAssunto)->count() > 0){
        	$this->_helper->flashMessenger(array("danger"=>"Você não pode votar duas vezes no mesmo assunto!"));
        	$this->_helper->redirector('index', 'index');
        }
        
        if($this->_model->getAssuntoVotosPorUsuario($this->_auth->idUsuario)->count() >= 3){
        	$this->_helper->flashMessenger(array("danger"=>"Você já atingiu seu limite de 3 votos por semana!"));
        	$this->_helper->redirector('index', 'index');
        }
        
        $result = $this->_model->cadastrar($idAssunto, $this->_auth->idUsuario);
        if($result){
        	// @todo inserir flash messenger
        	$this->_helper->flashMessenger(array("success"=>"Voto inserido com sucesso!"));        	
        }else{
        	$this->_helper->flashMessenger(array("danger"=>"Ocorreu algum problema!"));
        	// @todo inserir flash messenger
        }
        
        $this->_helper->redirector('index', 'index');
	}
}