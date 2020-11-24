<?php
namespace Sismaed\Entity;
use \FrameWork\DatabaseTable;

class Calendario {

	public $id;
	public $nombre;
	public $des;
    public $fecha;
    
    private $eventoTable;
    private $mantto_calendTable;
    private $manttoTable;

	public function __construct( \FrameWork\DatabaseTable $eventoTable,
                                \FrameWork\DatabaseTable $mantto_calendTable,
                               \FrameWork\DatabaseTable $manttoTable) {
		$this->eventoTable = $eventoTable;
        $this->mantto_calendTable = $mantto_calendTable;
        $this->manttoTable = $manttoTable;
	}


	public function getManttos() {
		$mantto_calend = $this->mantto_calendTable->find('calendario_id', $this->id);

		$manttos = [];

		foreach ($mantto_calend as $item) {
			$mantto =  $this->manttoTable->findById($item->unidad_id);
			if ( $mantto ) {
				$manttos[] = $mantto;
			}			
		}

		return $manttos;
	}      
    
 	public function getEvento() {
		$eventos = $this->eventoTable->find('calendario_id', $this->id);
		return $eventos;
	}  
    
    
}