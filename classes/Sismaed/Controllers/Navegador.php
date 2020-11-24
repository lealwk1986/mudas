<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;


class Navegador {
	
	private $unidadTable;
	private $grupounidadTable;
    private $peogTable;
    private $manttoTable;
    private $reporteTable;
	private $cajachicaTable;
	private $inventarioTable;
	private $libroactaTable;
	private $plantillaTable;
    

	public function __construct( DatabaseTable $unidadTable, DatabaseTable $grupounidadTable,DatabaseTable $peogTable, 
	DatabaseTable $manttoTable, DatabaseTable $reporteTable, DatabaseTable $cajachicaTable,
	DatabaseTable $inventarioTable, DatabaseTable $libroactaTable, DatabaseTable $plantillaTable	) {
		$this->unidadTable = $unidadTable;
		$this->grupounidadTable = $grupounidadTable;
        $this->peogTable = $peogTable;
        $this->manttoTable = $manttoTable;
        $this->reporteTable = $reporteTable;
		$this->cajachicaTable = $cajachicaTable;
		$this->inventarioTable = $inventarioTable;
		$this->libroactaTable = $libroactaTable;
		$this->plantillaTable = $plantillaTable;

	}

	public function arbolUnidad() {
	
		$unidades = $this->unidadTable->findAll(); 
		$MAtriz = [];
		foreach($unidades as $unidad) {
			$MAtriz[] = [
				$unidad->id,
				$unidad->id_dep,
				$unidad->nombre
			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}
 
	public function arbolgrupoUnidad() {
	
		$unidades = $this->grupounidadTable->findAll(); 
		$MAtriz = [];
		foreach($unidades as $unidad) {
			$MAtriz[] = [
				$unidad->id,
				$unidad->nombre,
				$unidad->desc
			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}	

    public function arbolPeog() {
	
		$tabla = $this->peogTable->findAllOrder('nombre', 'ASC'); 
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->apellido,
                $dato->organizacion
			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}

	public function arbolReporte() {
	    $grupo = $_GET['grupo'];
		$tabla = $this->reporteTable->findOrder('grupo', $grupo,'fecha', 'DESC');
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->fecha,
                $this->peogTable->findById($dato->peog_id)->nombre,
                $this->peogTable->findById($dato->peog_id)->apellido,
                
			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}
    
    public function arbolMantto() {
	
        $grupo = $_GET['grupo'];
		$tabla = $this->manttoTable->findOrder('grupo', $grupo,'fecha', 'DESC'); 
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->fecha,
                /*$this->peogTable->findById($dato->peog_id)->nombre,
                $this->peogTable->findById($dato->peog_id)->apellido,*/
                
			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}
    
    public function arbolCajaChica() {

		$tabla = $this->cajachicaTable->findAllOrder('fecha_ini', 'DESC');
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->desc,
                $dato->fecha_ini,
                $dato->fecha_fin

			];

		}

        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}   

    public function arbolInventario() {
		$tabla = $this->inventarioTable->findAllOrder('fecha_ini', 'DESC');
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->desc,
                $dato->fecha_ini,
                $dato->fecha_fin
			];

		}
        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}   

	public function arbolLibroActa() {
		$tabla = $this->libroactaTable->findAllOrder('fecha_ini', 'DESC');
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->desc,
                $dato->fecha_ini,
                $dato->fecha_fin
			];

		}
        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}   

	public function arbolPlantilla() {
		$tabla = $this->plantillaTable->findAllOrder('fecha', 'DESC');
		$MAtriz = [];
		foreach($tabla as $dato) {
			$MAtriz[] = [
				$dato->id,
				$dato->nombre,
				$dato->desc,
                $dato->fecha
			];

		}
        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
	}   	
	
    public function arbolNotifica(){
        $MAtriz = [
            [ '1', 'TODO'],
            [ '2', 'Eventos de Mantto'],
            [ '3', 'Eventos de Calendario'],
            [ '4', 'Cajas Chicas'],
            [ '5', 'Vencimientos de Libros'],
            [ '6', 'Tarea de Listas'],
            [ '7', 'Materiales de Inventario']
			];
        
        $myJSON = json_encode($MAtriz);
        return $this->imprimir($myJSON);
    }
    
    private function imprimir($myJSON){
        
        $title ='';        
            ob_start();
            echo $myJSON;
            $output = ob_get_clean();       

        return ['template' => 'navegador.php',
               'title' => $title,
				'variables' => [
					'output' => $output
					]
			   ];
        }
    
    
    
}