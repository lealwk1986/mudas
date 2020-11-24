<?php
namespace Sismaed\Entity;

class Inventario {

	public $id;
	public $nombre;
	public $desc;
    public $fecha_ini;
    public $fecha_fin;
    public $peog_id;
    private $entradamTable;
    private $peogTable;


	public function __construct( \FrameWork\DatabaseTable $entradamTable,  \FrameWork\DatabaseTable $peogTable) {
        
		$this->entradamTable = $entradamTable;
        $this->peogTable = $peogTable;
    
	}
    
	public function getEntradam() {
        
		$entradas = $this->entradamTable->find('inventario_id', $this->id);

		return $entradas;
	} 
    
    public function getListaEntr(){
        $matrizEntr = $this->entradamTable->agrupar('nombre','cantidad','inventario_id',$this->id);
        
        return $matrizEntr;
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