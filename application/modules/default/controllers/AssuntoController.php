<?php

class AssuntoController extends Zend_Controller_Action {

    public $_model;

    public function init() {
        $this->_model = new Application_Model_Assuntos();
    }

    public function indexAction() {
        $id = $this->getParam("id");
        if (empty($id) OR $this->_model->find($id)->count() == 0) {
            $this->_helper->redirector('index');
        }

        $model_votacao = new Application_Model_AssuntoVotos();
        $model_votacao->cadastrar($id);

        $this->_helper->redirector('index');
    }

    public function cadastrarAction() {

        $form = new Default_Form_Assunto();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($assunto->isValid($data)) {
                $assunto = $this->_model->createRow();
                $assunto->setFromArray($data);
                $assunto->setCreated();
                $assunto->save();
            }
            $model_votacao->cadastrar($assuntos);
        }
    }

}