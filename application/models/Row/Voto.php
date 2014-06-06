<?php
class Application_Model_Row_Voto extends Zend_Db_Table_Row_Abstract {
	
	//protected $idAssunto, $idTema, $titulo, $criadoEm, $criadoPor, $aprovadoEm, $aprovadoPor, $status, $qtdevotos;
	
	/**
	 * @return the $idAssunto
	 */
	public function getIdAssunto() {
		return $this->idAssunto;
	}

	/**
	 * @return the $idTema
	 */
	public function getIdTema() {
		return $this->idTema;
	}

	/**
	 * @return the $titulo
	 */
	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * @return the $criadoEm
	 */
	public function getCriadoEm() {
		return $this->criadoEm;
	}

	/**
	 * @return the $criadoPor
	 */
	public function getCriadoPor() {
		return $this->criadoPor;
	}

	/**
	 * @return the $aprovadoEm
	 */
	public function getAprovadoEm() {
		return $this->aprovadoEm;
	}

	/**
	 * @return the $aprovadoPor
	 */
	public function getAprovadoPor() {
		return $this->aprovadoPor;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return the $qtdevotos
	 */
	public function getQtdevotos() {
		return $this->qtdevotos;
	}

}

?>
        