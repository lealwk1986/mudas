<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Unidad {
    
	private $unidadTable;
    private $peogTable;
    private $unidad_peogTable;
    private $docuTable;
    private $unidad_docuTable;
    private $manttoTable;
    private $unidad_manttoTable;
    private $grupounidadTable;
    private $unidad_grupounidadTable;
    
    private  $authentication;
    
	public function __construct( DatabaseTable $unidadTable, DatabaseTable $peogTable, DatabaseTable $docuTable, DatabaseTable $grupounidadTable,
                                DatabaseTable $unidad_peogTable,  DatabaseTable $unidad_grupounidadTable,
                                Authentication $authentication ) {
		$this->authentication = $authentication;
        $this->unidadTable = $unidadTable;
        $this->peogTable = $peogTable;
        $this->unidad_peogTable = $unidad_peogTable;
        $this->docuTable = $docuTable;
        $this->grupounidadTable = $grupounidadTable;
        $this->unidad_grupounidadTable = $unidad_grupounidadTable;
	}
    
    public static function borrarR($i,$PP, &$unidades, &$unidad_peog, &$unidad_grupounidad, &$docu, $recursivo = true){
	$fl=$PP[$i];
	foreach( $fl as $value)
		{	echo 'a borrar: '.$value;
            if(true){
            
            $unidad_peog->deleteWhere('unidad_id',$value);     
            $unidad_grupounidad->deleteWhere('unidad_id',$value); 
                
 
            $all_doc = $unidades->findById($value)->getAllDoc();
        
            foreach($all_doc as $unidad_doc){

                $doc_id = $unidad_doc->id;
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$unidad_doc->tipo_entidad.'/doc/'.$unidad_doc->tipo.'/'.$unidad_doc->nombre);
                $docu->delete($doc_id);

            }   
                
             $unidades->delete($value);   
                
            if($recursivo){
                self::borrarR($value,$PP,$unidades, $unidad_peog, $unidad_grupounidad, $docu);
            }
		}
    }
    }
    
	public function ver() {
        $title = 'Ver Unidad';
        $user = $this->authentication->getUser();
		return ['template' => 'unidad.html.php', 
				'title' => $title, 
				'variables' => [
					]
				];
	}

	public function veri() {
         $user = $this->authentication->getUser();
        $unidad = $this->unidadTable->findById($_GET['id']);

        if($unidad==false){
             $unidad = $this->unidadTable->findById(1);
        }
		$title = 'Ver Unidad';

		return ['template' => 'unidad.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'user' => $user,
                        'unidad' =>  $unidad,
					]
				];
	}
	
    public function editari(){
        $user = $this->authentication->getUser();
        
            
        $unidad = $this->unidadTable->findById($_GET['id']);
        $grupounidadTable = $this->grupounidadTable;
        $unidad_grupounidadTable = $this->unidad_grupounidadTable;
        
        $peog_categ = [ ['id'=>1, 'texto'=>'responsable'],
                ['id'=>2, 'texto'=>'usuario']
               ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio']];
        
        $tablaPeogs =  $this->peogTable->findAll();
        $title = 'Editar Unidad';
		return ['template' => 'editunidad.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'unidad' => $unidad,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ,
                    'tablaPeogs' => $tablaPeogs,
                    'grupounidad' => $grupounidadTable
					]
				];        
    }
    
    public function nuevo(){
            $user = $this->authentication->getUser();
            $id_dep=$_GET['id_dep'];
            $padre =$this->unidadTable->findById($_GET['id_dep']);
        
        
        $peog_categ = [ ['id'=>1, 'texto'=>'responsable'],
                        ['id'=>2, 'texto'=>'usuario']
                       ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio']];
        
        $tablaPeogs =  $this->peogTable->findAll();
        $title = 'Editar Unidad';
		return ['template' => 'editunidad.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ,
                    'tablaPeogs' => $tablaPeogs,
                    'id_dep' => $id_dep,
                    'padre' => $padre
					]
				]; 
        }
    
    public function borrar(){
        $user = $this->authentication->getUser();
        $idq = $_POST['id'];
        $unidad = $this->unidadTable->findById($idq);
        $id_dep2 = $unidad->id_dep;
        $unidades = $this->unidadTable->findAll();
		$MAtriz = [];
		foreach($unidades as $uni) {
			$MAtriz[] = [
				$uni->id,
				$uni->id_dep
			];
		}   
    $PP=[];
    $PP2=[0=>0];    
    foreach ( $MAtriz as $index=>$row ) {
      $PP[$row[0]] = [];
      $PP[$row[1]] = [];
    }
 
    $PP[] = [];
    foreach ( $MAtriz as $row ) {
      $PP[$row[ 1 ]][] = $row[ 0 ];
        
    }
        echo 'Totales '.count($PP).'<br>';
        foreach($PP as $index=>$row){
            echo $index.':   ';
            foreach($row as $valor){
                echo $valor.' ';
            } echo '<br>';
        }
        
       
        
       self::borrarR($idq ,$PP,$this->unidadTable,$this->unidad_peogTable,$this->unidad_grupounidadTable, $this->docuTable,true); 
       $this->delAllDoc($idq);
       $this->unidad_peogTable->deleteWhere('unidad_id',$idq);
       $this->unidad_grupounidadTable->deleteWhere('unidad_id',$idq);
       $this->unidadTable->delete($idq);
        
        header('location: /unidad/ver?id='.$id_dep2);
        
    }
    
    public function saveEdit(){
        $usuario= $this->authentication->getUser();

		$unidad = $_POST['unidad'];
        
        $id_last = $this->unidadTable->save($unidad)->id;
        
        if($unidad['id']==''){
            $ind=$id_last;
        }else{
            $ind=$unidad['id'];
        }
        
        
        if(isset($_POST['aplic'])){
        header('location: /unidad/ver?ide='.$ind); }
        else{
        header('location: /unidad/ver?id='.$ind);    
        }
        
        
    }
    
    public function saveEditPeog(){
        $usuario= $this->authentication->getUser();

		$unidad_peog = $_POST['unidad_peog'];
        $unidad_peog['catUnidadPeog_id'] = 0;
        $this->unidad_peogTable->save($unidad_peog);
        
        header('location: /unidad/ver?ide='.$unidad_peog['unidad_id']); 
        
        
    }
    
    public function delPeog(){
        $usuario= $this->authentication->getUser();

		$unidad_peog = $_POST['unidad_peog'];
        $this->unidad_peogTable->deleteWhere3('unidad_id',$unidad_peog['unidad_id'],'peog_id',$unidad_peog['peog_id'],'tipo_peog',$unidad_peog['tipo_peog']);
        
        header('location: /unidad/ver?ide='.$unidad_peog['unidad_id']); 
        
        
    }
    
    public function delDoc(){
        $usuario= $this->authentication->getUser();

		$unidad_doc = $this->docuTable->findById($_POST['doc_id']);
        
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$unidad_doc->tipo_entidad.'/doc/'.$unidad_doc->tipo.'/'.$unidad_doc->nombre);
        
        $this->docuTable->delete($_POST['doc_id']);
        
    
        header('location: /unidad/ver?ide='.$_POST['unidad_id']); 
        
        
    }
    
    private function delAllDoc($unidad_id){
        $usuario= $this->authentication->getUser();

		$all_doc = $this->unidadTable->findById($unidad_id)->getAllDoc();
        
        foreach($all_doc as $unidad_doc){
        
        $doc_id = $unidad_doc->id;
            
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$unidad_doc->tipo_entidad.'/doc/'.$unidad_doc->tipo.'/'.$unidad_doc->nombre);
        
        $this->docuTable->delete($doc_id);
            
        }
    
        header('location: /unidad/ver?ide='.$_POST['unidad_id']); 
        
        
    }
    
    public function saveEditDoc(){
        $usuario= $this->authentication->getUser();
        $max_ID = 10000+intval($this->docuTable->maxId());
		$unidad_doc = $_POST['unidad_doc'];
 
        if(isset($_POST["submit"])){
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$unidad_doc['tipo_entidad'].'/doc/'.$unidad_doc["tipo"].'/'.$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      $unidad_doc['nombre']=$max_ID.'_'.$_FILES["fileToUpload"]["name"][$i];
                      $fecha = getdate();
                      $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
                      $unidad_doc['fecha']=$fecha_MYSQL;
                      $this->docuTable->save($unidad_doc);
                  }      
                    }
                }
            }
        header('location: /unidad/ver?ide='.$unidad_doc['id_entidad']); 
    }    
    
    public function saveEditGrupo(){
        $usuario= $this->authentication->getUser();

		$unidad_grupounidad = $_POST['unidad_grupounidad'];
        $this->unidad_grupounidadTable->save($unidad_grupounidad);
        
        header('location: /unidad/ver?ide='.$unidad_grupounidad['unidad_id']); 
        
        
    }
    
    public function delGrupo(){
        $usuario= $this->authentication->getUser();

		$unidad_grupounidad = $_POST['unidad_grupounidad'];
        $this->unidad_grupounidadTable->deleteWhere2('unidad_id',$unidad_grupounidad['unidad_id'],'grupounidad_id',$unidad_grupounidad['grupounidad_id']);
        
        header('location: /unidad/ver?ide='.$unidad_grupounidad['unidad_id']); 
        
        
    }
    
    
    
}