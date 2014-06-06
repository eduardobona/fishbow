<?php
class Application_Model_Temas extends Zend_Db_Table_Abstract {
	protected $_name = 'tema';
	protected $_rowClass = 'Application_Model_Row_Tema';
	public function getTemas() {
		return $this->fetchAll ( $this->select ()->order ( 'idTema DESC' ) );
	}
	public function getTemasPaged($itemCountPerPage = 5) {
		$paginator = Zend_Paginator::factory ( $this->fetchAll ( $this->select ()->order ( 'rule ASC' ) ) );
		$paginator->setItemCountPerPage ( $itemCountPerPage );
		$page = Zend_Controller_Front::getInstance ()->getRequest ()->getParam ( 'page' );
		return $paginator->setCurrentPageNumber ( $page );
	}
}