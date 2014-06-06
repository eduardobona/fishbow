<?php
class Application_Model_Votos extends Zend_Db_Table_Abstract
{
	protected $_name = 'votos';
	protected $_primary = 'idAssunto';
	protected $_rowClass = 'Application_Model_Row_Voto';
	//protected $_dependentTables = array('Application_Model_Assuntos');
 
	protected $_referenceMap = array(
		'voto' => array(
			'columns'           => array('idAssunto'),
			'refTableClass'     => 'Application_Model_Assuntos',
			'refColumns'        => array('idAssunto')
		),
	);
	
 	public function getVotos()
 	{
 		return $this->fetchAll(
            $this->select()->order('id DESC')
 		);
 	}
 	public function getVotosPorAssunto($idAssunto)
 	{
 		return $this->fetchAll(
 				$this->select()->where("idAssunto = ?", $idAssunto)
 		);
 	} 	
 	
 	public function getVotosPaged($itemCountPerPage = 5) {
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