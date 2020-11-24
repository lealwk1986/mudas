<?php
namespace Sismaed\Entity;

class Mantto {

    const MANTTO_PROG = 'programado';
    const MANTTO_NO_PROG = 'no_programado';
	public $id;
	public $nombre;
    public $desc;
    public $fecha;
    public $tipo;
    public $grupo;
    private $docuTable;
    private $mantto_docuTable;
	private $peogTable;
    private $mantto_peogTable;
    private $unidadTable;
    private $unidad_manttoTable;
    private $calendarioTable;
    private $mantto_calendarioTable;

	public function __construct( \FrameWork\DatabaseTable $docuTable, 
                               \FrameWork\DatabaseTable $peogTable, \FrameWork\DatabaseTable $mantto_peogTable,
                               \FrameWork\DatabaseTable $unidadTable, \FrameWork\DatabaseTable $unidad_manttoTable,
                               \FrameWork\DatabaseTable $calendarioTable,\FrameWork\DatabaseTable $mantto_calendarioTable
                               ) {
        
		$this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
        $this->mantto_peogTable = $mantto_peogTable;
        $this->unidadTable = $unidadTable;
        $this->unidad_manttoTable = $unidad_manttoTable;
        $this->calendarioTable = $calendarioTable;
        $this->mantto_calendarioTable = $mantto_calendarioTable;
        
        $this->getTipo();
        
	}
    
    
    private function getTipo(){
            return $this->tipo;
            
    }

	public function getPeog( $tipo_peog ) {
		$mantto_peog = $this->mantto_peogTable->find2('mantto_id', $this->id,'tipo_peog', $tipo_peog);

		$peogs = [];

		foreach ($mantto_peog as $manttopeog) {
			$peog =  $this->peogTable->findById($manttopeog->peog_id);
			if ($peog) {
				$peogs[] = $peog;
			}			
		}

		return $peogs;
	}    
    
	public function getDoc( $tipo_doc ) {
		$mantto_doc = $this->docuTable->find3('tipo_entidad', 'mantto','id_entidad', $this->id,'tipo', $tipo_doc );

		return $mantto_doc;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'mantto', 'id_entidad', $this->id );

		return $docs;
	}  

 	public function getUnidad( ) {
		$unidad_mantto = $this->unidad_manttoTable->find('mantto_id', $this->id);

		$unidades = [];

		foreach ($unidad_mantto as $unidadmantto) {
			$unidad =  $this->unidadTable->findById($unidadmantto->unidad_id);
			if ( $unidad ) {
				$unidades[] = $unidad;
			}			
		}

		return $unidades;
	}    
    
    public function getCalendario(){
       $mantto_calendario = $this->mantto_calendarioTable->find('mantto_id', $this->id);

		$calendarios = [];

		foreach ($mantto_calendario as $item) {
			$calendario =  $this->calendarioTable->findById($item->calendario_id);
			if ( $calendario ) {
				$calendarios[] = $calendario;
			}			
		}

		return $calendarios; 
    }
    
  
}