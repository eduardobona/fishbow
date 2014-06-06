<?php
class Admin_IndexController extends Zend_Controller_Action
{
    public $_model;
    
    public function init()
    {
        $this->_model = new Application_Model_Users();
    }
    public function indexAction()
    {
        $this->view->users = $this->_model->getUsersPaged();
    }
}