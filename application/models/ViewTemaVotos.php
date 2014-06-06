<?php

class Application_Model_ViewTemaVotos extends Application_Model_Temas
{
    protected $_name = 'view_tema_voto';
    protected $_primary = 'idTema';
    protected $_rowClass = 'Application_Model_Row_ViewTemaVoto';
    
    //protected $_dependentTables = array('Application_Model_ViewAssuntoVotos');
    
    protected $_referenceMap = array(
		'assunto' => array(
            'columns'           => 'idAssunto',
            'refTableClass'     => 'Application_Model_ViewAssuntoVotos',
            'refColumns'        => 'idAssunto'
        ),
    );
    
}