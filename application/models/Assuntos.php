<?php

class Application_Model_Assuntos extends Zend_Db_Table_Abstract
{

    protected $_name = 'assunto';
    protected $_rowClass = 'Application_Model_Row_Assunto';
    
    public function getAssuntos ()
    {
        return $this->fetchAll($this->select()
            ->order('id DESC'));
    }
    
    public function getAssuntosPaged ($itemCountPerPage = 5)
    {
        $paginator = Zend_Paginator::factory(
                $this->fetchAll($this->select()
                    ->order('rule ASC')));
        $paginator->setItemCountPerPage($itemCountPerPage);
        $page = Zend_Controller_Front::getInstance()->getRequest()->getParam(
                'page');
        return $paginator->setCurrentPageNumber($page);
    }
    
    public function getAssuntosPorTema ($idTema)
    {
    	return $this->fetchAll($this->select()
    	        ->where("idTema = ?", $idTema)
    			->order('id DESC'));
    }
    
    public function getAssuntosPorTemaPaged ($idTema, $itemCountPerPage = 5)
    {
    	$paginator = Zend_Paginator::factory(
    			$this->fetchAll($this->select()
    			        ->where("idTema = ?", $idTema)
    					->order('rule ASC')));
    	$paginator->setItemCountPerPage($itemCountPerPage);
    	$page = Zend_Controller_Front::getInstance()->getRequest()->getParam(
    			'page');
    	return $paginator->setCurrentPageNumber($page);
    }
    
}