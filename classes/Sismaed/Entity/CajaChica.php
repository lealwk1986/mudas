<?php
namespace Sismaed\Entity;

class CajaChica {

	public $id;
	public $nombre;
	public $desc;
    public $monto;
    public $fecha_ini;
    public $fecha_fin;
    public $peog_id;
    private $gastoTable;
    private $peogTable;


	public function __construct( \FrameWork\DatabaseTable $gastoTable,  \FrameWork\DatabaseTable $peogTable) {
        
		$this->gastoTable = $gastoTable;
        $this->peogTable = $peogTable;
    
	}
    
    
	public function getGasto() {
        
		$gastos = $this->gastoTable->find('cajachica_id', $this->id);

		return $gastos;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 
    
    public function getResto() {
        $Inicial = $this->monto;
        foreach($this->getGasto() as $gasto){
            $Inicial -= $gasto->monto;
        }
        return $Inicial;
    }
}