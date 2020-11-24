<?php
namespace Sismaed\Entity;

class Datoreporte {

	public $id;
	public $nombre;
    public $valor1;
    public $valor2;    
    public $reporte_id;
    private $docuTable;


	public function __construct( \FrameWork\DatabaseTable $docuTable) {
        
		$this->docuTable = $docuTable;
    
	}
    
    
    
    public function getDoc( $tipo_doc ) {
        
		$docs = $this->docuTable->find3('tipo_entidad', 'datoreporte', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'datoreporte', 'id_entidad', $this->id );

		return $docs;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 

}