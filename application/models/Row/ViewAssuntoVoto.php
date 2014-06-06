<?php

class Application_Model_Row_ViewAssuntoVoto extends Zend_Db_Table_Row_Abstract {

    public function getIdAssunto() {
        return $this->idAssunto;
    }
    
    public function getIdTema() {
        return $this->idTema;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    
    public function getCriadoEm() {
        return $this->criadoEm;
    }

    public function getCriadoPor() {
        return $this->criadoPor;
    }

    public function getAprovadoEm() {
        return $this->aprovadoEm;
    }

    public function getAprovadoPor() {
        return $this->aprovadoPor;
    }
    
    public function getTema(){
        return $this->titulo;
    }
    
    public function getUsuario(){
        return $this->nome;
    }

    public function getStatus() {
        return $this->status;
    }
    
    public function getQtdevotos(){
    	return $this->qtdevotos;
    }

}

?>
