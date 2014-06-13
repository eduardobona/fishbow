<?php
class LoginController extends Zend_Controller_Action
{
	protected $_model;
	protected $auth;
	
	public function init()
	{
	    $this->_model = new Application_Model_Students();
		$module = $this->getRequest()->getModuleName();
		$this->auth = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session($module));
	}
	
	public function indexAction()
	{
	    $form = new Default_Form_Login();
		$form->submit->setLabel('Login');

		if ($this->getRequest()->isPost()) {
		    $formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				$email = $form->getValue('email');
				$senha = sha1($form->getValue('senha'));
				
				$adapter = new Zend_Auth_Adapter_DbTable($this->_model->getAdapter(), 'usuario', 'email', 'senha');
				$adapter->setIdentity($email)->setCredential($senha);
				
				$result = $adapter->authenticate();
				
				if ($result->isValid())
				{
					$data = $adapter->getResultRowObject(null, 'senha');
					$this->auth->getStorage()->write($data);
					
					$usuario = $this->auth->getIdentity();
					
					if ($usuario->status == 1)
					{
						$session = new Zend_Session_Namespace($this->auth->getStorage()->getNamespace());
						$session->setExpirationSeconds(28800);
						
						$this->_helper->redirector(null,null,'default');
					}
					else
					{
						$this->auth->clearIdentity();
						$this->_helper->flashMessenger(array('danger' => 'Aluno inativo!'));
						$this->_helper->redirector(null,'login','default');
					}
				}
				else
				{
					$this->_helper->flashMessenger(array('danger' => 'Email ou Senha Inválidos!'));
					$this->_helper->redirector(null,'login','default');
				}
			}
		}
		$this->view->form = $form;
	}
	
	public function logoutAction()
	{
		$this->auth->clearIdentity();
		$this->_helper->redirector('index');
	}
}