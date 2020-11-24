<?php
namespace Sismaed\Entity;

class Unidad {

    const ENTIDAD_UNIDAD = 'unidad';
	public $id;
	public $nombre;
    public $id_dep;
	public $desc;
	private $peogTable;
    private $unidad_peogTable;
    private $docuTable;
    private $unidad_docuTable;
    private $manttoTable;
    private $unidad_manttoTable;
    private $unidadTable;
    private $grupounidadTable;
    private $unidad_grupounidadTable;

	public function __construct( \FrameWork\DatabaseTable $unidadTable,
                                \FrameWork\DatabaseTable $docuTable, 
                               \FrameWork\DatabaseTable $peogTable, \FrameWork\DatabaseTable $unidad_peogTable,
                               \FrameWork\DatabaseTable $manttoTable, \FrameWork\DatabaseTable $unidad_manttoTable,
                               \FrameWork\DatabaseTable $grupounidadTable, \FrameWork\DatabaseTable $unidad_grupounidadTable
                               ) {
        
		$this->unidadTable = $unidadTable;
        $this->peogTable = $peogTable;
        $this->unidad_peogTable = $unidad_peogTable;
        $this->docuTable = $docuTable;
        $this->manttoTable = $manttoTable;
        $this->unidad_manttoTable = $unidad_manttoTable;
        $this->grupounidadTable = $grupounidadTable;
        $this->unidad_grupounidadTable = $unidad_grupounidadTable;
        
	}
    
    
	public function getPeog( $tipo_peog ) {
		$unidad_peog = $this->unidad_peogTable->find2('unidad_id', $this->id, 'tipo_peog', $tipo_peog);

		$peogs = [];

		foreach ($unidad_peog as $unidadpeog) {
			$peog =  $this->peogTable->findById($unidadpeog->peog_id);
			if ( $peog ) {
				$peogs[] = $peog;
			}			
		}

		return $peogs;
	}    
    
	public function getDoc( $tipo_doc ) {
		
        $docs = $this->docuTable->find3('tipo_entidad', 'unidad', 'id_entidad', $this->id,'tipo', $tipo_doc );

		return $docs;
	}  
    
    public function getAllDoc() {
		
        $docs = $this->docuTable->find2('tipo_entidad', 'unidad', 'id_entidad', $this->id );

		return $docs;
	}  

 	public function getMantto( $tipo_mantto ) {
		$unidad_mantto = $this->unidad_manttoTable->find2('unidad_id', $this->id ,'tipo_mantto', $tipo_mantto);

		$manttos = [];

		foreach ($unidad_mantto as $unidadmantto) {
			$mantto =  $this->manttoTable->findById($unidadmantto->mantto_id);
			if ( $mantto ) {
				$manttos[] = $mantto;
			}			
		}

		return $manttos;
	}    
    
 	public function getPadre() {

		return $this->unidadTable->findById($this->id_dep);
	}    
    
    public function getHijos(){
        return $this->unidadTable->find('id_dep',$this->id);
        
       }
    
    public function getGrupo(){
        $unidad_grupounidad = $this->unidad_grupounidadTable->find('unidad_id', $this->id );
		$grupos = [];
		foreach ($unidad_grupounidad as $unidadgrupo) {
			$grupo =  $this->grupounidadTable->findById($unidadgrupo->grupounidad_id);
			if ( $grupo ) {
				$grupos[] = $grupo;
			}			
		}
		return $grupos;
    }
    

}