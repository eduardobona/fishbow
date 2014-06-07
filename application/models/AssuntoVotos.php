<?php
class Application_Model_AssuntoVotos extends Zend_Db_Table_Abstract
{
	protected $_name = 'assuntovoto';
	protected $_rowClass = 'Application_Model_Row_AssuntoVoto';
 
 	public function getAssuntoVotos()
 	{
 		return $this->fetchAll(
            $this->select()->order('id DESC')
 		);
 	}
 	public function getAssuntoVotosPaged($itemCountPerPage = 5) {
 	    $paginator = Zend_Paginator::factory($this->fetchAll($this->select()->order('rule ASC')));
 	    $paginator->setItemCountPerPage($itemCountPerPage);
 	    $page = Zend_Controller_Front::getInstance()->getRequest()->getParam('page');
 	    return $paginator->setCurrentPageNumber($page);
 	}
        //cadastrar
        public function cadastrar($idVoto){
            $cadastro = $this->createRow(array(
                "idAssuntoVoto"=>$idAssuntoVoto,
                "idAssunto"=>$idAssunto,
                "criadoEm"=>$criadoEm,
                "criadoPor"=>$criadoPor
            ));
            return $dados;
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