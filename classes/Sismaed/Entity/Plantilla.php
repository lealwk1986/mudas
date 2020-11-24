<?php
namespace Sismaed\Entity;

class Plantilla {

	public $id;
	public $nombre;
	public $desc;
    public $fecha;
    private $datoplantillaTable;


	public function __construct( \FrameWork\DatabaseTable $datoplantillaTable) {
        
		$this->datoplantillaTable = $datoplantillaTable;
    
	}
    
    
	public function getDatoplantilla() {
        
		$datoplantilla = $this->datoplantillaTable->find('plantilla_id', $this->id);

		return $datoplantilla;
	}  
    

}