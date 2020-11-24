<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class CajaChica {
	private $cajachicaTable;
    private $authentication;
    private $gastoTable;
    private $docuTable;
    private $peogTable;

	public function __construct(\FrameWork\DatabaseTable $cajachicaTable,
                                \FrameWork\DatabaseTable $gastoTable,
                                \FrameWork\DatabaseTable $docuTable, 
                                \FrameWork\DatabaseTable $peogTable,
                                Authentication $authentication) {
		$this->cajachicaTable = $cajachicaTable;
        $this->authentication = $authentication;
        $this->gastoTable = $gastoTable;
        $this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
	}
    
    public function ver() {
        
		$title = 'Ver Caja Chica';
		return ['template' => 'cajaChica.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
	}
    
    public function veri() {
        
        $user = $this->authentication->getUser();
		$cajachica  = $this->cajachicaTable->findById($_GET['id']);

		$title = 'Ver Caja Chica';

		return ['template' => 'cajaChica.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'cajachica' => $cajachica
			  ]
		];
	}

	public function editari() {
        $user = $this->authentication->getUser();
        $cajachica  = $this->cajachicaTable->findById($_GET['id']);
        $peogTable = $this->peogTable;

		$title = 'Edit Caja Chica';

		return ['template' => 'editCajaChica.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable,
					'cajachica' => $cajachica 
				]
		];
	}

	public function saveEdit() {
		$cajachica = $_POST['cajachica'];
        $cajachica['fecha_ini'] = date("Y-m-d H:i:s", strtotime($cajachica['fecha_ini']));
        $cajachica['fecha_fin'] = date("Y-m-d H:i:s", strtotime($cajachica['fecha_fin']));
        

		$id_last = $this->cajachicaTable->save($cajachica)->id;
        
        if($cajachica['id']==''){
            $ind=$id_last;
        }else{
            $ind=$cajachica['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /cajachica/ver?id='.$ind); }
        else{
        header('location: /cajachica/ver?ide='.$ind);    
        }        

	}

	public function borrar() {
        $user = $this->authentication->getUser();
        $cajachica = $this->cajachicaTable->findById($_POST['id']);
        
        foreach($cajachica->getGasto() as $gasto){
            foreach($gasto->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
            $this->gastoTable->delete($gasto->id);
        }
        $this->cajachicaTable->delete($cajachica->id);

        header('location: /cajachica/ver'); 
      

	}
    
    public function delGasto(){
        $usuario= $this->authentication->getUser();
        
        $gasto =  $this->gastoTable->findById($_POST['gasto_id']);
        
        foreach($gasto->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
        
        $this->gastoTable->delete($_POST['gasto_id']);
        
        header('location: /cajachica/ver?ide='.$_POST['cajachica_id']); 
        
        
    } 
    
    public function addGasto(){

        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['gasto_doc'];
        $gasto = $_POST['gasto'];
        $gasto['id'] = '';
        $gasto['fecha'] = date("Y-m-d H:i:s", strtotime($gasto['fecha']));
        $cajachica_id = $gasto['cajachica_id'];
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(isset($_POST["submit"])){
            
            $gasto_id = $this->gastoTable->save($gasto)->id;
            $entidad_doc['id_entidad'] = $gasto_id;
            
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc['tipo_entidad'].'/doc/'.$entidad_doc["tipo"].'/'.$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      $entidad_doc['nombre']=$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                      $fecha = getdate();
                      $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
                      $entidad_doc['fecha']=$fecha_MYSQL;
                      $entidad_doc['id'] = '';
                      $this->docuTable->save($entidad_doc);
                        }      
                    }
                }
            
            }
        header('location: /cajachica/ver?ide='.$cajachica_id); 
        
        
        
        
        
        
        
    } 
    
    public function nuevo(){
        $user = $this->authentication->getUser();
        $peogTable = $this->peogTable;

        $title = 'Caja Chica Nuevo';
		return ['template' => 'editCajaChica.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable
					]
				]; 
        }
    
    
    
    
}