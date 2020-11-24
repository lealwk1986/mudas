<?php
namespace Sismaed\Entity;

class Peog {

	public $id;
	public $nombre;
    public $id_dep;
    public $id_dep2;
	public $des;
    public $direc;
    private $peogTable;
    private $unidad_peogTable;
    private $docuTable;
    private $peog_docuTable;
    private $manttoTable;
    private $unidadTable;
    private $mantto_peogTable;

	public function __construct( \FrameWork\DatabaseTable $peogTable,
                                \FrameWork\DatabaseTable $docuTable, 
                               \FrameWork\DatabaseTable $unidadTable, \FrameWork\DatabaseTable $unidad_peogTable,
                               \FrameWork\DatabaseTable $manttoTable, \FrameWork\DatabaseTable $mantto_peogTable) {
		$this->docuTable = $docuTable;
        $this->unidadTable = $unidadTable;
        $this->unidad_peogTable = $unidad_peogTable;
        $this->manttoTable = $manttoTable;
        $this->mantto_peogTable = $mantto_peogTable;
        $this->peogTable = $peogTable;
        
	}

	public function getDoc( $tipo_doc ) {
        
		$docs = $this->docuTable->find3('tipo_entidad', 'peog', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'peog', 'id_entidad', $this->id );

		return $docs;
	}  

	public function getUnidad( $tipo_peog ) {
		$unidad_doc = $this->unidad_peogTable->find2('peog_id', $this->id, 'tipo_peog', $tipo_doc);

		$unidades = [];

		foreach ($unidad_peog as $unidadpeog) {
			$unidad =  $this->unidadTable->findById($unidadpeog->unidad_id);
			if ( $unidad ) {
				$unidades[] = $unidad;
			}			
		}

		return $unidades;
	}      
    
 	public function getMantto( $tipo_mantto ) {
		$mantto_peog = $this->mantto_peogTable->find2('peog_id', $this->id,'tipo_mantto', $tipo_mantto);

		$manttos = [];

		foreach ($mantto_peog as $manttopeog) {
			$mantto =  $this->manttoTable->findById($manttopeog->mantto_id);
			if ( $mantto ) {
				$manttos[] = $mantto;
			}			
		}

		return $manttos;
	}  
    
    public function getDep(){
        
        return $this->peogTable->findByID($this->id_dep);
        
    }
    
     public function getDep2(){
        
        return $this->peogTable->findByID($this->id_dep2);
        
    }  
    
}