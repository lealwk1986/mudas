<?php
namespace Sismaed\Entity;

class LibroActa {

	public $id;
	public $nombre;
	public $desc;
    public $fecha_ini;
    public $fecha_fin;
    public $peog_id;
    private $registroTable;
    private $peogTable;


	public function __construct( \FrameWork\DatabaseTable $registroTable,  \FrameWork\DatabaseTable $peogTable) {
        
		$this->registroTable = $registroTable;
        $this->peogTable = $peogTable;
    
	}
    
    
	public function getRegistro() {
        
		$registros = $this->registroTable->find('libroacta_id', $this->id);

		return $registros;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 
    

}