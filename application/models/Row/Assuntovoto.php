<?php

class Application_Model_Row_Assuntovoto extends Zend_Db_Table_Row_Abstract {

    public function getIdAssuntoVoto() {
        return $this->idAssuntoVoto;
    }

    public function setIdAssuntoVoto($idAssuntoVoto) {
        $this->idAssuntoVoto = $idAssuntoVoto;
    }
    
    public function getIdAssunto() {
        return $this->idAssunto;
    }

    public function setIdAssunto($idAssunto) {
        $this->idAssunto = $idAssunto;
    }

    public function getCriadoEm() {
        return $this->criadoEm;
    }

    public function setCriadoEm($criadoEm) {
        $this->criadoEm = $criadoEm;
    }

    public function getCriadoPor() {
        return $this->publiccriadoPor;
    }

    public function setCriadoPor($criadoPor) {
        $this->criadoPor = $criadoPor;
    }
}

?>
