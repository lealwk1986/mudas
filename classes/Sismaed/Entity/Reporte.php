<?php
namespace Sismaed\Entity;

class Reporte {

	public $id;
	public $nombre;
    public $fecha;
    public $peog_id;
    public $plantilla_id;
    public $usuario_id;
    private $datoreporteTable;
    private $peogTable;
    private $plantillaTable;
    private $eventoTable;
    private $reporte_eventoTable;


	public function __construct( \FrameWork\DatabaseTable $datoreporteTable,  \FrameWork\DatabaseTable $peogTable, \FrameWork\DatabaseTable $plantillaTable,  \FrameWork\DatabaseTable $eventoTable,  \FrameWork\DatabaseTable $reporte_eventoTable) {
        
		$this->datoreporteTable = $datoreporteTable;
        $this->peogTable = $peogTable;
        $this->plantillaTable = $plantillaTable;
        $this->eventoTable = $eventoTable;
        $this->reporte_eventoTable = $reporte_eventoTable;
    
	}
    
    
	public function getDatoreporte() {
        
		$datareportes = $this->datoreporteTable->find('reporte_id', $this->id);

		return $datareportes;
	}  
    
    public function getPeog() {
        
		$peog = $this->peogTable->findById($this->peog_id);

		return $peog;
	} 
    
    public function getPlantilla() {
        
		$plantilla = $this->plantillaTable->findById($this->plantilla_id);

		return $plantilla;
	}     
    
    public function getEvento(){
        
        $reporte_evento = $this->reporte_eventoTable->find('reporte_id', $this->id);

		$eventos = [];

		foreach ($reporte_evento as $reporteevento) {
			$evento =  $this->eventoTable->findById($reporteevento->evento_id);
			if ( $evento ) {
				$eventos[] = $evento;
			}			
		}

		return $eventos;
    }

}