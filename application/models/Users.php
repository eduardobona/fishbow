<?php
class Application_Model_Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	protected $_rowClass = 'Application_Model_Row_User';
 
 	public function getUsers()
 	{
 		return $this->fetchAll(
            $this->select()->order('id DESC')
 		);
 	}
 	public function getUsersPaged($itemCountPerPage = 5) {
 	    $paginator = Zend_Paginator::factory($this->fetchAll($this->select()->order('rule ASC')));
 	    $paginator->setItemCountPerPage($itemCountPerPage);
 	    $page = Zend_Controller_Front::getInstance()->getRequest()->getParam('page');
 	    return $paginator->setCurrentPageNumber($page);
 	}
 	/*
 	public function getUser($id) 
	{
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
			throw new Exception("Could not find row $id");
		}
		return $row; 
	}
 
	public function deleteUser($id)
	{
		$this->delete('id =' . (int) $id);
	}
	*/
}