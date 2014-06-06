<?php

class Application_Model_Row_Assunto extends Zend_Db_Table_Row_Abstract {

    public function getIdAssunto() {
        return $this->idAssunto;
    }

    public function setIdAssunto($idAssunto) {
        $this->idAssunto = $idAssunto;
    }

    public function getIdTema() {
        return $this->idTema;
    }

    public function setIdTema($idTema) {
        $this->idTema = $idTema;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getCriadoEm() {
        return $this->criadoEm;
    }

    public function setCriadoEm($criadoEm) {
        $this->criadoEm = $criadoEm;
    }

    public function getCriadoPor() {
        return $this->criadoPor;
    }

    public function setCriadoPor($criadoPor) {
        $this->criadoPor = $criadoPor;
    }

    public function getAprovadoEm() {
        return $this->aprovadoEm;
    }

    public function setAprovadoEm($aprovadoEm) {
        $this->aprovadoEm = $aprovadoEm;
    }

    public function getAprovadoPor() {
        return $this->aprovadoPor;
    }

    public function setAprovadoPor($aprovadoPor) {
        $this->aprovadoPor = $aprovadoPor;
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

    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getVotos(){
    	return $this->findDependentRowset("Application_Model_Votos");
    }

}

?>
