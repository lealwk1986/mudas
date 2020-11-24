<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Inventario {
	private $inventarioTable;
    private $entradamTable;
    private $docuTable;
    private $peogTable;
    private $authentication;

	public function __construct(\FrameWork\DatabaseTable $inventarioTable,
                                \FrameWork\DatabaseTable $entradamTable,
                                \FrameWork\DatabaseTable $docuTable, 
                                \FrameWork\DatabaseTable $peogTable,
                                Authentication $authentication) {
		$this->inventarioTable = $inventarioTable;
        $this->entradamTable = $entradamTable;
        $this->docuTable = $docuTable;
        $this->peogTable = $peogTable;
        $this->authentication = $authentication;        
	}
    
    public function ver() {
        
		$title = 'Ver Inventario';
		return ['template' => 'inventario.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
	}
    
    public function veri() {
        
        $user = $this->authentication->getUser();
		$inventario  = $this->inventarioTable->findById($_GET['id']);
        $entradam = $this->entradamTable;

		$title = 'Ver Inventario';

		return ['template' => 'inventario.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'inventario' => $inventario,
                'entradam' => $entradam
			  ]
		];
	}

	public function editari() {
        $user = $this->authentication->getUser();
        $inventario  = $this->inventarioTable->findById($_GET['id']);
        $peogTable = $this->peogTable;

		$title = 'Edit Caja Chica';

		return ['template' => 'editInventario.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable,
					'inventario' => $inventario 
				]
		];
	}

	public function saveEdit() {
		$inventario = $_POST['inventario'];
        

        
        $inventario['fecha_ini'] = date("Y-m-d H:i:s", strtotime($inventario['fecha_ini']));
        $inventario['fecha_fin'] = date("Y-m-d H:i:s", strtotime($inventario['fecha_fin']));
        

		$id_last = $this->inventarioTable->save($inventario)->id;
        
        if($inventario['id']==''){
            $ind=$id_last;
        }else{
            $ind=$inventario['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /inventario/ver?id='.$ind); }
        else{
        header('location: /inventario/ver?ide='.$ind);    
        }        

	}

	public function borrar() {
        $user = $this->authentication->getUser();
        $inventario = $this->inventarioTable->findById($_POST['id']);
        
        foreach($inventario->getEntradam() as $entrada){
            foreach($entrada->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
            $this->entradamTable->delete($entrada->id);
        }
        $this->inventarioTable->delete($inventario->id);

        header('location: /inventario/ver'); 
      

	}
    
    public function delEntradam(){
        $usuario= $this->authentication->getUser();
        
        $entrada =  $this->entradamTable->findById($_POST['entradam_id']);
        
        foreach($entrada->getAllDoc() as $doc){
                unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$doc->tipo_entidad.'/doc/'.$doc->tipo.'/'.$doc->nombre);
                $this->docuTable->delete($doc->id);
            }
        
        $this->entradamTable->delete($_POST['entradam_id']);
        
        header('location: /cajachica/ver?ide='.$_POST['inventario_id']); 
        
        
    } 
    
    public function addEntradam(){

        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['entradam_doc'];
        $entradam = $_POST['entradam'];
        $entradam['fecha'] = date("Y-m-d H:i:s", strtotime($entradam['fecha']));
        $inventario_id = $entradam['inventario_id'];

        if($_POST['nomOpt']=='0'){
           foreach($this->entradamTable->find('inventario_id',$inventario_id) as $entr){
            if($entradam['nombre']==$entr->nombre){
                $entrfinal = $entr;
                break;
                }
            }
            $entradam['desc'] = $entrfinal->desc;
            $entradam['unidad'] = $entrfinal->unidad;
        }
        else{
            $entradam['nombre'] = $_POST['nombre2'];
        }
        
        
        $max_ID = 10000+intval($this->docuTable->maxId());
        if(isset($_POST["submit"])){
            
            $entradam_id = $this->entradamTable->save($entradam)->id;
            $entidad_doc['id_entidad'] = $entradam_id;
            
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
        header('location: /inventario/ver?ide='.$inventario_id); 
        
        
        
        
        
        
        
    } 
    
    public function nuevo(){
        $user = $this->authentication->getUser();
        $peogTable = $this->peogTable;

        $title = 'Caja Chica Nuevo';
		return ['template' => 'editInventario.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peogTable' => $peogTable
					]
				]; 
        }
    
    
    
    
}