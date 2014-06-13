<?php
class IndexController extends Zend_Controller_Action {
	
	// model a ser utilizado por todos os actions
	protected $model;
	
	// é executada em todos os actions
	public function init() {
	}
	
	// criando index action http://localhost ou http://localhost/index ou http://localhost/index/index
	public function indexAction() {
		$model_tema = new Application_Model_ViewTemaVotos ();
		$temas = $model_tema->getTemas ();
		
		$this->view->temas = $temas;
	}
	
	public function sobreAction(){
		
	}
}