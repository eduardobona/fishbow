<?php
class Application_Model_Students extends Zend_Db_Table_Abstract
{
	protected $_name = 'students';
	protected $_rowClass = 'Application_Model_Row_Student';
 
 	public function getStudents()
 	{
 		return $this->fetchAll(
            $this->select()->order('id DESC')
 		);
 	}
 	public function getStudentsPaged($itemCountPerPage = 5) {
 	    $paginator = Zend_Paginator::factory($this->fetchAll($this->select()->order('rule ASC')));
 	    $paginator->setItemCountPerPage($itemCountPerPage);
 	    $page = Zend_Controller_Front::getInstance()->getRequest()->getParam('page');
 	    return $paginator->setCurrentPageNumber($page);
 	}
}