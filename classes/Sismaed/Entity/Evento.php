<?php
namespace Sismaed\Entity;
use \FrameWork\DatabaseTable;

class Evento {

	public $id;
	public $nombre;
	public $desc;
    public $fecha;
    public $calendario_id;
    public $peog_id;
    public $estado;
    
    private $docuTable;
    private $evento_peogTable;
    private $peogTable;

	public function __construct( \FrameWork\DatabaseTable $docuTable) {
		$this->docuTable = $docuTable;
	}



	public function getDoc( $tipo_doc ) {
		
        $docs = $this->docuTable->find3('tipo_entidad', 'evento', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'evento', 'id_entidad', $this->id );

		return $docs;
	}      
    
    
    
}