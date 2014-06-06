<?php

class Application_Model_ViewAssuntoVotos extends Application_Model_Assuntos
{

    protected $_name = 'view_assunto_voto';
    protected $_primary = 'idAssunto';
    protected $_rowClass = 'Application_Model_Row_ViewAssuntoVoto';
    
    protected $_dependentTables = array('Application_Model_ViewTemaVotos');
    
    protected $_referenceMap = array(
    		'tema' => array(
    				'columns'           => 'idTema',
    				'refTableClass'     => 'Application_Model_ViewTemaVotos',
    				'refColumns'        => 'idTema'
    		),
    );
    
}