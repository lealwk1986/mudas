<?php
namespace Sismaed\Entity;

class Entradam {

	public $id;
	public $nombre;
	public $desc;
    public $cantidad;
    public $fecha;
    public $inventario_id;
    public $peog_id;
    public $unidad;
    public $min;
    private $docuTable;
    private $peogTable;
    private $inventarioTable;


	public function __construct(\FrameWork\DatabaseTable $inventarioTable, \FrameWork\DatabaseTable $docuTable, \FrameWork\DatabaseTable $peogTable ) {
        
		$this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
        $this->inventarioTable = $inventarioTable;
    
	}
    
    
    
    public function getDoc( $tipo_doc ) {
        
		$docs = $this->docuTable->find3('tipo_entidad', 'entradam', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'entradam', 'id_entidad', $this->id );

		return $docs;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 
    
    public function getInventario() {
        
		$peog = $this->inventarioTable->findById($this->inventario_id);

		return $peog;
	} 

}