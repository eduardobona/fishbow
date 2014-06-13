<?php
class AssuntoController extends Zend_Controller_Action {
	public $_model;
	
	public function init() {
		$this->_model = new Application_Model_Assuntos ();
		$this->_auth = Zend_Auth::getInstance()->getIdentity();
	}
	
	public function indexAction() {
		$id = $this->getParam ( "id" );
		$model_tema = new Application_Model_Temas ();
		
		if (empty ( $id ) or $model_tema->find ( $id )->count () == 0) {
			$this->_helper->redirector ( "index", "index" );
		}
		
		if($this->_model->getAssuntosPorUsuario($this->_auth->idUsuario)->count() >= 3){
			$this->_helper->flashMessenger(array("danger"=>"Você já atingiu seu limite de cadastro de 5 assuntos por semana."));
			$this->_helper->redirector('index', 'index');
		}
		
		// @todo utilizar zend_form para receber e tratar estas informações
		$resultado = $this->_model->cadastrar ( array (
			"idTema" => $id,
			"titulo" => $_POST ["assunto"],
			"criadoPor" => $this->_auth->idUsuario
		));
		
		if($resultado){
			$this->_helper->flashMessenger(array("success"=>"Assunto inserido com sucesso..."));
		}else{
			$this->_helper->flashMessenger(array("danger"=>"Houve algum problema no cadastro de um assunto"));
		}
		
		$this->_helper->redirector ( "index", "index" );
	}
}

?>