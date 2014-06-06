<?php
class Admin_LoginController extends Zend_Controller_Action
{
	protected $_model;
	protected $auth;
	
	public function init()
	{
		$this->_model = new Application_Model_Users();
		$module = $this->getRequest()->getModuleName();
		$this->auth = Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session($module));
	}
	
	public function indexAction()
	{
		$form = new Admin_Form_Login();
		
		$form->submit->setLabel('Login');

		if ($this->getRequest()->isPost()) {
		    $formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				$username = $form->getValue('username');
				$password = sha1($form->getValue('password'));
				
				$adapter = new Zend_Auth_Adapter_DbTable($this->_model->getAdapter(), 'users', 'username', 'password');
				$adapter->setIdentity($username)->setCredential($password);
				
				$result = $adapter->authenticate();
				
				if ($result->isValid())
				{
					$data = $adapter->getResultRowObject(null, 'Senha');
					$this->auth->getStorage()->write($data);
					
					$user = $this->auth->getIdentity();
					
					if ($user->status == 1)
					{
						$session = new Zend_Session_Namespace($this->auth->getStorage()->getNamespace());
						$session->setExpirationSeconds(28800);
						
						$this->_helper->redirector(null,null,'admin');
					}
					else
					{
						$this->auth->clearIdentity();
						$this->_helper->flashMessenger(array('danger' => 'Usuário inativo!'));
						$this->_helper->redirector(null,'login','admin');
					}
				}
				else
				{
					$this->_helper->flashMessenger(array('danger' => 'Usuário ou senha inválido'));
					$this->_helper->redirector(null,'login','admin');
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