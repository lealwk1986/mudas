<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class LibroActa {
	private $libroactaTable;
    private $authentication;
    private $registroTable;
    private $docuTable;
    private $peogTable;

	public function __construct(\FrameWork\DatabaseTable $libroactaTable,
                                \FrameWork\DatabaseTable $registroTable,
                                \FrameWork\DatabaseTable $docuTable, 
                                \FrameWork\DatabaseTable $peogTable,
                                Authentication $authentication) {
		$this->libroactaTable = $libroactaTable;
        $this->authentication = $authentication;
        $this->registroTable = $registroTable;
        $this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
	}
    
    public function ver() {
        
		$title = 'Ver Libro Acta';
		return ['template' => 'libroActa.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
	}
    
    public function veri() {
        
        $user = $this->authentication->getUser();
		$libroacta  = $this->libroactaTable->findById($_GET['id']);

		$title = 'Ver Libro Acta';

		return ['template' => 'libroActa.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'libroacta' => $libroacta
			  ]
		];
	}

	public function editari() {
        $user = $this->authentication->getUser();
        $libroacta  = $this->libroactaTable->findById($_GET['id']);
        $peogTable = $this->peogTable;

		$title = 'Edit Libro Acta';

		return ['template' => 'editLibroActa.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable,
					'libroacta' => $libroacta 
				]
		];
	}

	public function saveEdit() {
		$libroacta = $_POST['libroacta'];
        $libroacta['fecha_ini'] = date("Y-m-d H:i:s", strtotime($libroacta['fecha_ini']));
        $libroacta['fecha_fin'] = date("Y-m-d H:i:s", strtotime($libroacta['fecha_fin']));
        

		$id_last = $this->libroactaTable->save($libroacta)->id;
        
        if($libroacta['id']==''){
            $ind=$id_last;
        }else{
            $ind=$libroacta['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /libroacta/ver?id='.$ind); }
        else{
        header('location: /libroacta/ver?ide='.$ind);    
        }        

	}
    
    public function nuevo(){
        $user = $this->authentication->getUser();
        $peogTable = $this->peogTable;

        $title = 'Caja Chica Nuevo';
		return ['template' => 'editLibroActa.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable
					]
				]; 
        }

	public function borrar() {
        $user = $this->authentication->getUser();
        $libroacta = $this->libroactaTable->findById($_POST['id']);
        
        foreach($libroacta->getRegistro() as $registro){
            foreach($registro->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
            $this->registroTable->delete($registro->id);
        }
        $this->libroactaTable->delete($libroacta->id);

        header('location: /libroacta/ver'); 
      

	}
    
    public function delRegistro(){
        $usuario= $this->authentication->getUser();
        
        $registro =  $this->registroTable->findById($_POST['registro_id']);
        
        foreach($registro->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
        
        $this->registroTable->delete($_POST['registro_id']);
        
        header('location: /libroacta/ver?ide='.$_POST['libroacta_id']); 
        
        
    } 
    
    public function addRegistro(){

        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['registro_doc'];
        $registro = $_POST['registro'];
        $registro['fecha'] = date("Y-m-d H:i:s", strtotime($registro['fecha']));
        $libroacta_id = $registro['libroacta_id'];
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(isset($_POST["submit"])){
            $registro_id = $this->registroTable->save($registro)->id;
            $entidad_doc['id_entidad'] = $registro_id;
            
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
        header('location: /libroacta/ver?ide='.$libroacta_id); 
        
        
    } 
    
    public function editarRegistro(){
        $user = $this->authentication->getUser();
        $registro = $this->registroTable->findById($_GET['registro_id']);
        $libroacta = $this->libroactaTable->findById($_GET['libroacta_id']);
        $peogTable = $this->peogTable;
        $title = 'Editar Registro';
		return ['template' => 'editRegistro.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'registro' => $registro,
                    'libroacta' => $libroacta,
                    'peogTable' => $peogTable
					]
				];        
    }
    
    public function saveRegistro(){
        $usuario= $this->authentication->getUser();

        $registro = $_POST['registro'];
        $registro['fecha'] = date("Y-m-d H:i:s", strtotime($registro['fecha']));
        $libroacta_id = $registro['libroacta_id'];
        $this->registroTable->save($registro);
        header('location: /libroacta/ver?id='.$libroacta_id); 
        
    }
    
    public function addRegistroDoc(){
        $usuario= $this->authentication->getUser();
        $entidad_doc = $_POST['registro_doc'];
		$libroacta_id = $_POST['libroacta_id'];
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
        header('location: /libroacta/ver?id='.$libroacta_id.'&idr='.$entidad_doc['id_entidad']);
        
    }
    
    public function delRegistroDoc(){
        $usuario= $this->authentication->getUser();
        $registro_id = $_POST['registro_id'];
		$libroacta_id = $_POST['libroacta_id'];
        $doc_id = $_POST['doc_id'];
        $doc = $this->docuTable->findById($doc_id);
        
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
        $this->docuTable->delete($doc_id);
        
        
         header('location: /libroacta/ver?id='.$libroacta_id.'&idr='.$registro_id);
    }
    
    
}