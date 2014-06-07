<?php
class Application_Model_AssuntoVotos extends Zend_Db_Table_Abstract {
	protected $_name = 'assuntovoto';
	protected $_rowClass = 'Application_Model_Row_Assuntovoto';
	
	public function getAssuntoVotos() {
		return $this->fetchAll ( $this->select ()->order ( 'id DESC' ) );
	}

	public function getAssuntoVotosPorUsuario($idUsuario) {
		return $this->fetchAll ( $this->select ()->where("criadoPor = ?", $idUsuario) );
	}
	
	public function getAssuntoVotosPaged($itemCountPerPage = 5) {
		$paginator = Zend_Paginator::factory ( $this->fetchAll ( $this->select ()->order ( 'rule ASC' ) ) );
		$paginator->setItemCountPerPage ( $itemCountPerPage );
		$page = Zend_Controller_Front::getInstance ()->getRequest ()->getParam ( 'page' );
		return $paginator->setCurrentPageNumber ( $page );
	}
	
	
	
	// cadastrar
	public function cadastrar($idAssunto) {
		
		if($this->getAssuntoVotosPorUsuario(0)->count()){
			return false;
		}
		
		$data = new Zend_Date();
		$cadastro = $this->createRow (array(
			"idAssunto" => $idAssunto,
			"criadoEm" => $data->get(Zend_Date::ISO_8601)
		))->save();
		
		return $cadastro;
	}
	/*
	 * public function getUser($id) { $id = (int)$id; $row = $this->fetchRow('id = ' . $id); if (!$row) { throw new Exception("Could not find row $id"); } return $row; } public function deleteUser($id) { $this->delete('id =' . (int) $id); }
	 */
}