<?php
namespace Sismaed\Entity;

class Registro {

	public $id;
	public $nombre;
	public $desc;
    public $fecha;
    public $libroacta_id;
    public $peog_id;
    private $docuTable;
    private $peogTable;


	public function __construct( \FrameWork\DatabaseTable $docuTable, \FrameWork\DatabaseTable $peogTable ) {
        
		$this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
    
	}
    
    
    
    public function getDoc( $tipo_doc ) {
        
		$docs = $this->docuTable->find3('tipo_entidad', 'registro', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'registro', 'id_entidad', $this->id );

		return $docs;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 

}