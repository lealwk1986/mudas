<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Reporte {
	private $reporteTable;
    private $authentication;
    private $datoreporteTable;
    private $docuTable;
    private $peogTable;
    private $plantillaTable;
    private $eventoTable;
    private $reporte_eventoTable;

	public function __construct(\FrameWork\DatabaseTable $reporteTable,
                                \FrameWork\DatabaseTable $datoreporteTable,
                                \FrameWork\DatabaseTable $docuTable, 
                                \FrameWork\DatabaseTable $peogTable,
                                \FrameWork\DatabaseTable $plantillaTable,
                                \FrameWork\DatabaseTable $eventoTable,
                                \FrameWork\DatabaseTable $reporte_eventoTable,
                                Authentication $authentication) {
		$this->reporteTable = $reporteTable;
        $this->authentication = $authentication;
        $this->datoreporteTable = $datoreporteTable;
        $this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
        $this->plantillaTable = $plantillaTable;
        $this->eventoTable = $eventoTable;
        $this->reporte_eventoTable = $reporte_eventoTable;
        
	}
    
    public function ver() {
        
        $peogTable = $this->peogTable;
		$title = 'Ver reporte';
         $grupo = $_GET['grupo'];
		return ['template' => 'reporte.html.php', 
			'title' => $title, 
			'variables' => [
                'peogTable' => $peogTable,
                'grupo' => $grupo
			  ]
		];
	    }
    
    public function veri() {
        
        $grupo = $_GET['grupo'];
        $user = $this->authentication->getUser();
		$reporte  = $this->reporteTable->findById($_GET['id']);

		$title = 'Ver reporte';

		return ['template' => 'reporte.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'reporte' => $reporte,
                'grupo' => $grupo
			  ]
		];
	    }

	public function editari() {
        $user = $this->authentication->getUser();
        $reporte  = $this->reporteTable->findById($_GET['id']);
        $grupo = $reporte->grupo;
        $peogTable = $this->peogTable;
        $plantillaTable = $this->plantillaTable;
        $date1 = date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days'));
        $date2 = date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'+3h'));
        $eventos = $this->eventoTable->findByDateRange2('grupo', $grupo,'fecha',$date1,$date2);

		$title = 'Edit reporte';

		return ['template' => 'editReporte.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable,
                    'plantillaTable' => $plantillaTable,
					'reporte' => $reporte ,
                    'eventos' => $eventos,
                    'date1' => $date1,
                    'date2' => $date2,
                    'grupo' => $grupo
				]
		];
	    }

	public function saveEdit() {
		$reporte = $_POST['reporte'];
        $grupo = $reporte['grupo'];
        $reporte['fecha'] = date("Y-m-d H:i:s", strtotime($reporte['fecha']));
        

		$id_last = $this->reporteTable->save($reporte)->id;
        
        if($reporte['id']==''){
            $ind=$id_last;
        }else{
            $ind=$reporte['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /reporte/ver?id='.$ind.'&grupo='.$grupo); }
        else{
        
            
         foreach( $this->plantillaTable->findByID($reporte['plantilla_id'])->getDatoplantilla() as $dato){
             $datoreporte['id']='';
             $datoreporte['nombre']=$dato->nombre;
             $datoreporte['reporte_id']=$ind;
             $datoreporte['valor1']='NR';
             $datoreporte['valor2']='N/A';
             $this->datoreporteTable->save($datoreporte);

         }
             header('location: /reporte/ver?ide='.$ind.'&grupo='.$grupo); 
            
            
        }        

	    }
    
    public function nuevo(){
        $user = $this->authentication->getUser();
        $peogTable = $this->peogTable;
        $plantillaTable = $this->plantillaTable;
        $grupo = $_GET['grupo'];

        $title = 'reporte Nuevo';
		return ['template' => 'editReporte.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable,
                    'plantillaTable' => $plantillaTable,
                    'grupo' => $grupo
					]
				]; 
        }

	public function borrar() {
        $user = $this->authentication->getUser();
        $reporte = $this->reporteTable->findById($_POST['id']);
        
        foreach($reporte->getDatoreporte() as $datoreporte){
            foreach($datoreporte->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
            $this->datoreporteTable->delete($datoreporte->id);
        }
        $this->reporte_eventoTable->deleteWhere('reporte_id', $reporte->id);
        
        $grupo =  $this->reporteTable->findById($idq)->grupo;
        
        $this->reporteTable->delete($reporte->id);

        header('location: /reporte/ver?grupo='.$grupo); 
      

	    }
    
    public function delDatoreporte(){
        $usuario= $this->authentication->getUser();
        
        $datoreporte =  $this->datoreporteTable->findById($_POST['datoreporte_id']);
        
        foreach($datoreporte->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
        $grupo =  $this->reporteTable->findById($datoreporte->reporte_id)->grupo;
        $this->datoreporteTable->delete($_POST['datoreporte_id']);
 
        header('location: /reporte/ver?ide='.$_POST['reporte_id'].'&grupo='.$grupo); 
        
        
        } 
    
    public function addDatoreporte(){

        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['datoreporte_doc'];
        $datoreporte = $_POST['datoreporte'];
        $grupo =  $this->reporteTable->findById($datoreporte['reporte_id'])->grupo;
        $reporte_id = $datoreporte['reporte_id'];
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(isset($_POST["submit"])){
            $datoreporte_id = $this->datoreporteTable->save($datoreporte)->id;
            $entidad_doc['id_entidad'] = $datoreporte_id;
            
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc['tipo_entidad'].'/doc/'.$entidad_doc["tipo"].'/'.$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      $entidad_doc['nombre']=$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                      $fecha = getdate();
                      $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
                      $entidad_doc['fecha']=$fecha_MYSQL;
                      $entidad_doc['id']='';
                      $this->docuTable->save($entidad_doc);
                        }      
                    }
                }
            
            }
        header('location: /reporte/ver?ide='.$reporte_id.'&grupo='.$grupo); 
        
        
        } 
    
    public function editarDatoreporte(){
        $user = $this->authentication->getUser();
        $datoreporte = $this->datoreporteTable->findById($_GET['datoreporte_id']);
        $datoreporte = $this->reporteTable->findById($_GET['reporte_id']);
        $peogTable = $this->peogTable;
        $title = 'Editar datoreporte';
		return ['template' => 'editDatoreporte.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'datoreporte' => $datoreporte,
                    'reporte' => $reporte,
                    'peogTable' => $peogTable
					]
				];        
        }
    
    public function saveDatoreporte(){
        $usuario= $this->authentication->getUser();

        $datoreporte = $_POST['datoreporte'];
        $datoreporte['fecha'] = date("Y-m-d H:i:s", strtotime($datoreporte['fecha']));
        $reporte_id = $datoreporte['reporte_id'];
        $grupo =  $this->reporteTable->findById($datoreporte['reporte_id'])->grupo;
        $this->datoreporteTable->save($datoreporte);
        header('location: /reporte/ver?id='.$reporte_id.'&grupo='.$grupo); 
        
     }
    
    public function addDatoreporteDoc(){
        $usuario= $this->authentication->getUser();
        $entidad_doc = $_POST['datoreporte_doc'];
		$reporte_id = $_POST['reporte_id'];
        $grupo =  $this->reporteTable->findById($reporte_id)->grupo;
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(true){
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc['tipo_entidad'].'/doc/'.$entidad_doc["tipo"].'/'.$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      $entidad_doc['nombre']=$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                      $fecha = getdate();
                      $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
                      $entidad_doc['fecha']=$fecha_MYSQL;
                      $entidad_doc['id']='';
                      $this->docuTable->save($entidad_doc);
                        }      
                    }
                }
            
            }
        header('location: /reporte/ver?id='.$reporte_id.'&idr='.$entidad_doc['id_entidad'].'&grupo='.$grupo);
        
        }
    
    public function delDatoreporteDoc(){
        $usuario= $this->authentication->getUser();
        $datoreporte_id = $_POST['datoreporte_id'];
        
		$reporte_id = $_POST['reporte_id'];
        $grupo =  $this->reporteTable->findById($reporte_id)->grupo;
        $doc_id = $_POST['doc_id'];
        $doc = $this->docuTable->findById($doc_id);
        
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
        $this->docuTable->delete($doc_id);
        
        
         header('location: /reporte/ver?id='.$reporte_id.'&idr='.$data_id.'&grupo='.$grupo);
     }
    
    public function someterreporte(){
        $usuario= $this->authentication->getUser();

        $datosreporte = $_POST['datosreporte'];
        
        foreach($datosreporte as $index=>$datoreporte){
            if(!isset($datoreporte['valor1']) ){
                $datoreporte['valor1']='NR';
            }
            
            $this->datoreporteTable->save($datoreporte);
        }
        
        $grupo =  $this->reporteTable->findById($datosreporte[0]['reporte_id'])->grupo;
        header('location: /reporte/ver?id='.$datosreporte[0]['reporte_id'].'&grupo='.$grupo); 
        
        }
    
    public function addEvento(){

        $usuario= $this->authentication->getUser();


        $reporte_evento = $_POST['reporte_evento'];
        $reporte_id = $reporte_evento['reporte_id'];
        $grupo =  $this->reporteTable->findById($reporte_id)->grupo;
        $reporte_evento = $this->reporte_eventoTable->save($reporte_evento)->id;

        header('location: /reporte/ver?ide='.$reporte_id.'&grupo='.$grupo); 
        
        
        } 
    
    public function delEvento(){
        $usuario= $this->authentication->getUser();
        $evento_id = $_POST['evento_id'];
		$reporte_id = $_POST['reporte_id'];
        $grupo =  $this->reporteTable->findById($reporte_id)->grupo;
        
        $this->reporte_eventoTable->deleteWhere2('reporte_id', $reporte_id, 'evento_id', $evento_id);
        
         header('location: /reporte/ver?ide='.$reporte_id.'&grupo='.$grupo);
    }
    
    
}