<?php
class Admin_UserController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_model = new Application_Model_Users();
    }
    public function validateId()
    {
        $id = $this->getRequest()->getParam('id');
        if (empty($id) OR $this->_model->find($id)->count() == 0) {
            $this->_helper->redirector('index');
        }
        return $id;
    }
    public function indexAction()
    {
        $form = new Admin_Form_ItemsCountPerPage();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->view->users = $this->_model->getUsersPaged($data['itemsCountPerPage']);
            $form->getElement('itemsCountPerPage')->setValue($data['itemsCountPerPage']);
        }
        else {
            $this->view->users = $this->_model->getUsersPaged();
        }
        $this->view->form = $form;
    }
    public function addAction()
    {
        $id = $this->getRequest()->getParam('id');
        $form = new Admin_Form_User($id);
        
        $this->view->title = ($id) ? 'Alterar usuário' : 'Adicionar usuário';
        $this->view->heading = 'Usuário';
                
		if ($this->getRequest()->isPost()) {
		    $data = $this->getRequest()->getPost();
			if ($form->isValid($data)) {
			    $user = $form->getValues();
			    //$user->setPassword($user->getPassword());
			    if ($id) {
			        $user->setUpdated();
			    }
			    else {
			        $user->setCreated();
			        $user->setUpdated();
			    }
			    if ($user->save()) {
			        if ($id) {
			            $this->_helper->flashMessenger(array('success' => 'Usuário alterado!'));
			            $this->_helper->redirector(null,'user','admin');
			        }
			        else {
			            $this->_helper->flashMessenger(array('success' => 'Usuário cadastrado!'));
			            $this->_helper->redirector(null,'user','admin');
			        }
			    }
			}
            else {
				$form->populate($data);
			}
		}
        $this->view->form = $form;
    }
    public function editAction()
    {
        $id = $this->validateId();
        
        $this->_forward('add','user','admin',array('id' => $id));
    }
    public function deleteAction()
    {
        $id = $this->validateId();
        
        $form = new Admin_Form_Delete();
        $user = $this->_model->find($id)->current();
        
        if ($this->getRequest()->isPost()) {
            if ($this->getRequest()->getPost('confirm')) {
                $user->delete();
                $this->_helper->flashMessenger(array('success' => 'Usuário removido!'));
            }
            $this->_helper->redirector('index');
        }
        else {
            $form->setAction($this->view->url());
            $this->view->title = 'Remover usuário';
            $this->view->user = $user;
            $this->view->form = $form; 
        }
    }
}