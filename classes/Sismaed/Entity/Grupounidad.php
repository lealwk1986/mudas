<?php
namespace Sismaed\Entity;

class Grupounidad {

	public $id;
	public $nombre;
	public $desc;
    private $unidad_grupounidadTable;
    private $unidadTable;

	public function __construct( \FrameWork\DatabaseTable $unidadTable,
                                \FrameWork\DatabaseTable $unidad_grupounidadTable ) {
        
		$this->unidadTable = $unidadTable;
        $this->unidad_grupounidadTable = $unidad_grupounidadTable;
        
	}
    
    
	public function getUnidad( ) {
        
		$unidad_grupounidad = $this->unidad_grupounidadTable->find('grupounidad_id', $this->id);

		$unidades = [];

		foreach ($unidad_grupounidad as $unidadgrupou) {
			$unidad =  $this->unidadTable->findById($unidadgrupou->unidad_id);
			if ( $unidad ) {
				$unidades[] = $unidad;
			}			
		}

		return $unidades;
	}    
    
    

}