<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Peog {
    
	private $unidadTable;
    private $peogTable;
    private $unidad_peogTable;
    private $docuTable;
    private $unidad_docuTable;
    private $mantto_peogTable;
    private $unidad_manttoTable;
    private  $authentication;
    
	public function __construct(  DatabaseTable $peogTable, DatabaseTable $docuTable ,
                                  DatabaseTable $unidad_peogTable, DatabaseTable $mantto_peogTable,
                                  Authentication $authentication) {

        $this->peogTable = $peogTable;
        $this->docuTable = $docuTable;
		$this->authentication = $authentication;
        $this->unidad_peogTable = $unidad_peogTable;
        $this->mantto_peogTable = $mantto_peogTable;

	}
    
	public function ver() {
        $title = 'Ver PEOG';
		return ['template' => 'peog.html.php', 
				'title' => $title, 
				'variables' => [
					]
				];
	}

	public function veri() {

        $peog = $this->peogTable->findById($_GET['id']);

        if($peog==false){
             $peog = $this->peogTable->findById(1);
        }
		$title = 'Ver PEOG';

		return ['template' => 'peog.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'peog' =>  $peog
					]
				];
	}
	
    public function editar(){
        $title = 'Editar Unidad';
		return ['template' => 'peog.html.php', 
				'title' => $title, 
				'variables' => [
					]
				];        
    }

    public function editari(){
        $user = $this->authentication->getUser();
        $peog = $this->peogTable->findById($_GET['id']);
        $tablaPeogs = $this->peogTable->findAll();
        $peog_categ = [ ['id'=>1, 'texto'=>'responsable'],
                ['id'=>2, 'texto'=>'usuario']
               ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio'],
                      ['id'=>5, 'texto'=>'foto']];
        $title = 'Editar Unidad';
		return ['template' => 'editpeog.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peog' => $peog,
                    'tablaPeogs' => $tablaPeogs,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ
					]
				];        
    }
    
    public function saveEditDoc(){
        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['peog_doc'];
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(isset($_POST["submit"])){
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc['tipo_entidad'].'/doc/'.$entidad_doc["tipo"].'/'.$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      $entidad_doc['nombre']=$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                      $fecha = getdate();
                      $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
                      $entidad_doc['fecha']=$fecha_MYSQL;
                      $this->docuTable->save($entidad_doc);
                  }      
                    }
                }
            }
        header('location: /peog/ver?ide='.$entidad_doc['id_entidad']); 
    }    
    
    public function delDoc(){
        $usuario= $this->authentication->getUser();

		$unidad_doc = $this->docuTable->findById($_POST['doc_id']);
        
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$unidad_doc->tipo_entidad.'/doc/'.$unidad_doc->tipo.'/'.$unidad_doc->nombre);
        
        $this->docuTable->delete($_POST['doc_id']);
        
    
        header('location: /peog/ver?ide='.$_POST['peog_id']); 
        
        
    }
    
    public function saveEdit(){
        $usuario= $this->authentication->getUser();

		$peog = $_POST['peog'];
        
        
        $id_last = $this->peogTable->save($peog)->id;
        
        if($peog['id']==''){
            $ind=$id_last;
        }else{
            $ind=$peog['id'];
        }
        
        
        if(isset($_POST['aplic'])){
        header('location: /peog/ver?id='.$ind); }
        else{
        header('location: /peog/ver?ide='.$ind);    
        }
        
        
    }
    
    public function nuevo(){
        $user = $this->authentication->getUser();
        $tablaPeogs = $this->peogTable->findAll();
        $peog_categ = [ ['id'=>1, 'texto'=>'responsable'],
                ['id'=>2, 'texto'=>'usuario']
               ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio'],
                      ['id'=>5, 'texto'=>'foto']];
        $title = 'Crear Unidad';
		return ['template' => 'editpeog.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'tablaPeogs' => $tablaPeogs,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ
					]
				];
        }
    
    public function borrar(){
        $user = $this->authentication->getUser();
        $idq = $_POST['id'];
        $this->delAllDoc($idq);
        $this->unidad_peogTable->deleteWhere('peog_id',$idq);
        $this->mantto_peogTable->deleteWhere('peog_id',$idq);
        $this->peogTable->delete($idq);
        header('location: /peog/ver');
        
    }
    
    private function delAllDoc($peog_id){
        $usuario= $this->authentication->getUser();

		$all_doc = $this->peogTable->findById($peog_id)->getAllDoc();
        
        foreach($all_doc as $peog_doc){
        
        $doc_id = $peog_doc->id;
            
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$peog_doc->tipo_entidad.'/doc/'.$peog_doc->tipo.'/'.$peog_doc->nombre);
        
        $this->docuTable->delete($doc_id);
            
        }
        
    }
    
}