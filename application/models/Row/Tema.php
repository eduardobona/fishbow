<?php
class Application_Model_Row_Tema extends Zend_Db_Table_Row_Abstract {

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
        
        public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
	}

	public function getUsuario() {
		return $this->idUsuario;
	}
	
	public function getAssuntos(){
		return $this->findDependentRowset('Application_Model_Assuntos');
	}
}
        
?>
       