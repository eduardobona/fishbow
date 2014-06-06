<?php
class Application_Model_Row_ViewTemaVoto extends Zend_Db_Table_Row_Abstract {
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
	public function getStatus() {
		return $this->status;
	}
	public function getUsuario() {
		return $this->idUsuario;
	}
	public function getQtdevotos(){
		return $this->qtdevotos;
	}
	public function getAssuntos() {
		return $this->findDependentRowset ( 'Application_Model_ViewAssuntoVotos' );
	}
}

?>
       