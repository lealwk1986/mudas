<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;
use \Datetime;

class Mantto {
    
	private $unidadTable;
    private $peogTable;
    private $unidad_peogTable;
    private $docuTable;
    private $manttoTable;
    private $unidad_manttoTable;
    private $calendarioTable;
    private  $authentication;
    private $mantto_peogTable;
    private $mantto_calendarioTable;
    private $eventoTable;
    private $grupounidadTable;
    
	public function __construct( DatabaseTable $manttoTable,DatabaseTable $peogTable,DatabaseTable $docuTable,
                                DatabaseTable $unidad_manttoTable,  DatabaseTable $mantto_peogTable,
                                DatabaseTable $calendarioTable, DatabaseTable $mantto_calendarioTable,
                                DatabaseTable $eventoTable, DatabaseTable $grupounidadTable,
                                Authentication $authentication ) {
		
        $this->manttoTable = $manttoTable;
		$this->authentication = $authentication;
        $this->docuTable = $docuTable;
		$this->peogTable = $peogTable;
        $this->calendarioTable = $calendarioTable;
        $this->unidad_manttoTable = $unidad_manttoTable;
        $this->mantto_peogTable = $mantto_peogTable;
        $this->mantto_calendarioTable = $mantto_calendarioTable;
        $this->eventoTable = $eventoTable;
        $this->grupounidadTable = $grupounidadTable;
	}
    
	public function ver() {

            		$title = 'Ver Mantenimiento';
                    $grupo = $_GET['grupo'];

		return ['template' => 'mantto.html.php', 
				'title' => $title, 
				'variables' => [
                    'grupo' => $grupo
					]
				];
	}

	public function veri() {

        $grupo = $_GET['grupo'];
        $mantto = $this->manttoTable->findById($_GET['id']);
        $peogs = $this->peogTable;
        if($mantto==false){
             $mantto = $this->manttoTable->findById(1);
        }

		$title = 'Ver Mantenimiento';

  

		return ['template' => 'mantto.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'mantto' =>  $mantto,
                        'peogs' => $peogs,
                        'grupo' => $grupo
                    
					]
				];
	}
	
	public function editari(){
        $user = $this->authentication->getUser();
        $mantto = $this->manttoTable->findById($_GET['id']);
        $grupo = $mantto->grupo;
		$tablaPeogs = $this->peogTable->findAll();
        $calendarios = $this->calendarioTable->findAll();
        $peog_categ = [ ['id'=>1, 'texto'=>'solicitante'],
                ['id'=>2, 'texto'=>'aprobador'], 
					   ['id'=>3, 'texto'=>'ejecutante']
               ];
		 $mantto_categ = [ ['id'=>1, 'texto'=>'no_programado'],
                ['id'=>2, 'texto'=>'programado']
               ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio'],
                      ['id'=>5, 'texto'=>'foto']];
		
		$mantto_estado = [['id'=>1, 'texto'=>'solicitada'],
                      ['id'=>2, 'texto'=>'aprobada'],
                      ['id'=>3, 'texto'=>'rechazada'],
                      ['id'=>4, 'texto'=>'transito'],
                      ['id'=>5, 'texto'=>'diferida'],
						['id'=>6, 'texto'=>'cerrada'] ];
        
        $grupounidad = $this->grupounidadTable;
        
		
        $title = 'Editar Mantto';
		return ['template' => 'editMantto.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'mantto' => $mantto,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ,
					'mantto_categ' =>$mantto_categ,
					'tablaPeogs' =>$tablaPeogs,
					'mantto_estado' =>$mantto_estado,
                    'calendarios' => $calendarios,
                    'grupounidad' => $grupounidad,
                    'grupo' => $grupo
					]
				];        
    }
    
    public function saveEdit(){
        $usuario= $this->authentication->getUser();

		$mantto = $_POST['mantto'];
        $grupo = $mantto['grupo'];
/*        $mantto_date = DateTime::createFromFormat('Y-m-dTH:i:s', $mantto['fecha']);
        $cadena_nuevo_formato = $mantto_date->format("Y/m/d H:m:s");
        $mantto['fecha'] = $cadena_nuevo_formato;*/
        $id_last = $this->manttoTable->save($mantto)->id;
        
        if($mantto['id']==''){
            $ind=$id_last;
        }else{
            $ind=$mantto['id'];
        }
        
        
        if(isset($_POST['aplic'])){
        header('location: /mantto/ver?id='.$ind.'&grupo='.$grupo); }
        else{
        header('location: /mantto/ver?ide='.$ind.'&grupo='.$grupo);    
        }
        
        
    }
    
    public function saveEditR(){
        $usuario= $this->authentication->getUser();
            $mantto_calendario = $_POST['mantto_calendario'];
            $mantto_id = $mantto_calendario['mantto_id'];
            $mantto = $this->manttoTable->findById($mantto_id);
            $max_ID = 5+intval($this->calendarioTable->maxId());
            $nombre_cal = 'Cal_'.$this->manttoTable->findByID($mantto_calendario['mantto_id'])->nombre.'_'.$max_ID;
            $calendario_new['nombre'] = $nombre_cal;
            $calendario_new['id'] = '';
            $calendario_new['desc'] = '';
            $fecha = getdate();
            $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
            $calendario_new['fecha'] = $fecha_MYSQL ;
            $mantto_calendario['calendario_id'] = $this->calendarioTable->save($calendario_new)->id;
        $this->mantto_calendarioTable->save($mantto_calendario);
        
        $evento['id']='';
        
        $evento['grupo']=$mantto->grupo;
        
        $evento['nombre']='e_mantto_'.$this->manttoTable->findByID($mantto_calendario['mantto_id'])->nombre;
        
        $evento['calendario_id'] = $mantto_calendario['calendario_id'];
        
        $evento_id=$this->eventoTable->save($evento)->id;
        
        
        
        $evento = $this->eventoTable->findById($evento_id);
        
       header('location: /mantto/ver?ideE='.$evento_id.'&id='.$mantto_id.'&grupo='.$mantto->grupo);       
    }
    
    public function nuevo(){
        $user = $this->authentication->getUser();
		$tablaPeogs = $this->peogTable->findAll();
        $grupo = $_GET['grupo'];
        $calendarios = $this->calendarioTable->findAll();
        $peog_categ = [ ['id'=>1, 'texto'=>'solicitante'],
                ['id'=>2, 'texto'=>'aprobador'], 
					   ['id'=>3, 'texto'=>'ejecutante']
               ];
		 $mantto_categ = [ ['id'=>1, 'texto'=>'no_programado'],
                ['id'=>2, 'texto'=>'programado']
               ];
        $doc_categ = [['id'=>1, 'texto'=>'escrito'],
                      ['id'=>2, 'texto'=>'imag'],
                      ['id'=>3, 'texto'=>'video'],
                      ['id'=>4, 'texto'=>'audio'],
                      ['id'=>5, 'texto'=>'foto']];
		
		$mantto_estado = [['id'=>1, 'texto'=>'solicitada'],
                      ['id'=>2, 'texto'=>'aprobada'],
                      ['id'=>3, 'texto'=>'rechazada'],
                      ['id'=>4, 'texto'=>'transito'],
                      ['id'=>5, 'texto'=>'diferida'],
						['id'=>6, 'texto'=>'cerrada'] ];
        $title = 'Crear Mantto';
		return ['template' => 'editMantto.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'peog_categ'  => $peog_categ,
                    'doc_categ' =>$doc_categ,
					'mantto_categ' =>$mantto_categ,
					'tablaPeogs' =>$tablaPeogs,
					'mantto_estado' =>$mantto_estado,
                    'calendarios' => $calendarios,
                    'grupo' => $grupo
					]
				];
        }    
    
    public function borrar(){
        $user = $this->authentication->getUser();
        $idq = $_POST['id'];
        $this->delAllDoc($idq);
        
        $this->mantto_calendarioTable->deletewhere('mantto_id',$idq);
        
        $this->mantto_peogTable->deletewhere('mantto_id',$idq);
        
        $this->unidad_manttoTable->deletewhere('mantto_id',$idq);
        
        $grupo =  $this->manttoTable->findById($idq)->grupo;
     
        $this->manttoTable->delete($idq);
        
        header('location: /mantto/ver?grupo='.$grupo);
        
    }       
    
    public function saveEditUnidad(){
        $usuario= $this->authentication->getUser();

		$unidad_mantto = $_POST['unidad_mantto'];
        $this->unidad_manttoTable->save($unidad_mantto);
        $mantto = $this->manttoTable->findById($unidad_mantto['mantto_id']);
        
        header('location: /mantto/ver?ide='.$unidad_mantto['mantto_id'].'&grupo='.$mantto->grupo); 
    }  
    
    public function delUnidad(){
        $usuario= $this->authentication->getUser();
		$unidad_mantto = $_POST['unidad_mantto'];
        $this->unidad_manttoTable->deleteWhere2('unidad_id',$unidad_mantto['unidad_id'],'mantto_id',$unidad_mantto['mantto_id']);
        $mantto = $this->manttoTable->findById($unidad_mantto['mantto_id']);
        header('location: /mantto/ver?ide='.$unidad_mantto['mantto_id'].'&grupo='.$mantto->grupo); 
    }
    
    public function delAllUnidad(){
        $usuario= $this->authentication->getUser();
		$mantto_id = $_POST['mantto_id'];
        $this->unidad_manttoTable->deleteWhere('mantto_id',$mantto_id);
        
        header('location: /mantto/ver?ide='.$mantto_id); 
    }
    
    public function saveEditPeog(){
        $usuario= $this->authentication->getUser();

		$mantto_peog = $_POST['mantto_peog'];
        $this->mantto_peogTable->save($mantto_peog);
        $mantto = $this->manttoTable->findById($mantto_peog['mantto_id']);
        
        header('location: /mantto/ver?ide='.$mantto_peog['mantto_id'].'&grupo='.$mantto->grupo); 
        
        
    }   
    
    public function saveEditGrupo(){
        $usuario= $this->authentication->getUser();
		$mantto_id = $_POST['mantto_id'];
        $mantto = $this->manttoTable->findById($mantto_id);
        $grupounidad_id = $_POST['grupounidad_id'];
        $unidades = $this->grupounidadTable->findById($grupounidad_id)->getUnidad();
        $unidad_mantto['mantto_id']=$mantto_id;
        foreach($unidades as $unidad){
          $unidad_mantto['unidad_id']= $unidad->id; 
          $this->unidad_manttoTable->save($unidad_mantto);  
        }
        header('location: /mantto/ver?ide='.$mantto_id.'&grupo='.$mantto->grupo); 
        
        
    } 
    
    public function delPeog(){
        $usuario= $this->authentication->getUser();
		$mantto_peog = $_POST['mantto_peog'];
        $this->mantto_peogTable->deleteWhere3('peog_id',$mantto_peog['peog_id'],'mantto_id',$mantto_peog['mantto_id'], 'tipo_peog', $mantto_peog['tipo_peog']);
        $mantto = $this->manttoTable->findById($mantto_peog['mantto_id']);
        header('location: /mantto/ver?ide='.$mantto_peog['mantto_id'].'&grupo='.$mantto->grupo); 
    }    
    
    public function addNewCalend(){
        $usuario= $this->authentication->getUser();

		$mantto_calendario = $_POST['mantto_calendario'];
        
        if($mantto_calendario['calendario_id']==0){
            $max_ID = 10000+intval($this->calendarioTable->maxId());
            $nombre_cal = 'Cal_'.$this->manttoTable->findByID($mantto_calendario['mantto_id'])->nombre.'_'.$max_ID;
            $calendario_new['nombre'] = $nombre_cal;
            $calendario_new['desc'] = '';
            $fecha = getdate();
            $fecha_MYSQL = $fecha['year'].'/'. $fecha['mon'].'/'. $fecha['mday'].' '. $fecha['hours'].':'. $fecha['minutes'].':'. $fecha['seconds'];
            $calendario_new['fecha'] = $fecha_MYSQL ;
            $mantto_calendario['calendario_id'] = $this->calendarioTable->save($calendario_new)->id;
        }
        
        
        $this->mantto_calendarioTable->save($mantto_calendario);
        $mantto = $this->manttoTable->findById($mantto_calendario['mantto_id']);
        header('location: /mantto/ver?ide='.$mantto_calendario['mantto_id'].'&grupo='.$mantto->grupo); 
        
        
    }  
    
    public function addNewEvent(){
        $usuario= $this->authentication->getUser();

		$evento = $_POST['evento'];
        
        $evento['id']='';
        
        $calendario_id = $_POST['calendario_id'];
        
        $mantto_id = $_POST['mantto_id'];
        
        $mantto = $this->manttoTable->findById($mantto_id);
        
        $evento['calendario_id'] = $calendario_id;
        
        $event_desde = date("Y-m-d\TH:i:s", strtotime($_POST['event_desde']));
        
        $event_hasta = date("Y-m-d\TH:i:s", strtotime($_POST['event_hasta']));
        
        $event_tiempo = $_POST['event_tiempo'];
        
        $event_frecuencia = $_POST['event_frecuencia'];
        
        $event_actual = $event_desde;
        
        $nn = 1;
        
        $nombre = $evento['nombre'];
        
         switch($event_tiempo){
            case 'D':
                $max = 31;
            break;
            case 'S':
                $max = 6;
            break;
            case 'M':
                $max = 12;
            break;
            case 'Y':
                $max = 5;
            break;                  
          }  
        
        do{
          switch($event_tiempo){
            case 'D':
                $fecha_MYSQL = date("Y-m-d H:i:s", strtotime($event_actual));
                $evento['fecha'] = $fecha_MYSQL ;
                $evento['nombre'] =   $nombre.'_'.$nn;
                $evento['grupo'] = $mantto->grupo;
                  $this->eventoTable->save($evento);
                  $event_actual = date("Y-m-d\TH:i:s", strtotime($event_actual."+ ".$event_frecuencia." days"));
                  $nn++;
            break;
            case 'S':
                $fecha_MYSQL = date("Y-m-d H:i:s", strtotime($event_actual));
                $evento['fecha'] = $fecha_MYSQL ;
                $evento['nombre'] =   $nombre.'_'.$nn;
                $evento['grupo'] = $mantto->grupo;
                  $this->eventoTable->save($evento);
                  $event_actual = date("Y-m-d\TH:i:s", strtotime($event_actual."+ ".$event_frecuencia." week"));
                  $nn++;
            break;
            case 'M':
                $fecha_MYSQL = date("Y-m-d H:i:s", strtotime($event_actual));
                $evento['fecha'] = $fecha_MYSQL ;
                $evento['nombre'] =   $nombre.'_'.$nn;
                $evento['grupo'] = $mantto->grupo;
                  $this->eventoTable->save($evento);
                  $event_actual = date("Y-m-d\TH:i:s", strtotime($event_actual."+ ".$event_frecuencia." month"));
                  $nn++;
            break;
            case 'Y':
                $fecha_MYSQL = date("Y-m-d H:i:s", strtotime($event_actual));
                $evento['fecha'] = $fecha_MYSQL ;
                $evento['nombre'] =   $nombre.'_'.$nn;
                $evento['grupo'] = $mantto->grupo;
                  $this->eventoTable->save($evento);
                  $event_actual = date("Y-m-d\TH:i:s", strtotime($event_actual."+ ".$event_frecuencia." year"));
                  $nn++;
            break;                  
          }  
        }while(strtotime($event_actual)<=strtotime($event_hasta) &&  $nn<=$max);
        
        
        header('location: /mantto/ver?ideC='.$calendario_id.'&id='.$mantto_id.'&grupo='.$mantto->grupo); 
        
        
    } 
    
    public function delCalend(){
        $usuario= $this->authentication->getUser();
		$mantto_calendario = $_POST['mantto_calendario'];
        $this->mantto_calendarioTable->deleteWhere2('calendario_id',$mantto_calendario['calendario_id'],'mantto_id',$mantto_calendario['mantto_id']);
        $mantto = $this->manttoTable->findById($mantto_calendario['mantto_id']);
        header('location: /mantto/ver?ide='.$mantto_calendario['mantto_id'].'&grupo='.$mantto->grupo); 
    } 
    
    public function saveEditDoc(){
        $usuario= $this->authentication->getUser();

		$entidad_doc = $_POST['mantto_doc'];
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
        $mantto = $this->manttoTable->findById($entidad_doc['id_entidad']);
        header('location: /mantto/ver?ide='.$entidad_doc['id_entidad'].'&grupo='.$mantto->grupo); 
    }    
    
    public function delDoc(){
        $usuario= $this->authentication->getUser();

		$entidad_doc = $this->docuTable->findById($_POST['doc_id']);
        
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc->tipo_entidad.'/doc/'.$entidad_doc->tipo.'/'.$entidad_doc->nombre);
        
        $this->docuTable->delete($_POST['doc_id']);
        
        $mantto = $this->manttoTable->findById($entidad_doc['id_entidad']);
        header('location: /mantto/ver?ide='.$_POST['mantto_id'].'&grupo='.$mantto->grupo); 
        
        
    }
    
    public function editCal(){
        $user = $this->authentication->getUser();
        $calendario = $this->calendarioTable->findById($_GET['ideC']);
        $mantto = $this->manttoTable->findById($_GET['id']);
        $title = 'Editar Calendario';
		return ['template' => 'editCalendario.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'calendario' => $calendario,
                    'mantto' => $mantto
					]
				];        
    }
    
    public function editEvent(){
        $user = $this->authentication->getUser();
        $evento = $this->eventoTable->findById($_GET['ideE']);
        $mantto = $this->manttoTable->findById($_GET['id']);
        $tablaPeogs = $this->peogTable->findAll();
        $title = 'Editar Evento';
		return ['template' => 'editEvento.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'evento' => $evento,
                    'mantto' => $mantto,
                    'tablaPeogs' => $tablaPeogs
					]
				];        
    }
    
    public function saveEditEventDoc(){
        $usuario= $this->authentication->getUser();
        
        $evento_id = $_POST['evento_id'];
        $mantto_id = $_POST['mantto_id'];
		$entidad_doc = $_POST['evento_doc'];
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
        $mantto = $this->manttoTable->findById($mantto_id);
        header('location: /mantto/ver?ideE='.$evento_id.'&id='.$mantto_id.'&grupo='.$mantto->grupo); 

    }   
    
	public function saveEditCalend(){
        $usuario= $this->authentication->getUser();

		$calendario = $_POST['calendario'];
        $mantto_id = $_POST['mantto_id'];
        $mantto = $this->manttoTable->findById($mantto_id);
        $id_last = $this->calendarioTable->save($calendario)->id;
        header('location: /mantto/ver?id='.$mantto_id.'&grupo='.$mantto->grupo); 

        
        
    }
    
    public function saveEditEvent(){
        $usuario= $this->authentication->getUser();

		$evento = $_POST['evento'];
        $mantto_id = $_POST['mantto_id'];
        $mantto = $this->manttoTable->findById($mantto_id);
        $id_last = $this->eventoTable->save($evento)->id;
        header('location: /mantto/ver?id='.$mantto_id.'&grupo='.$mantto->grupo); 

        
        
    }
    
    public function delEvent(){
        $usuario= $this->authentication->getUser();
		$evento = $_POST['evento'];
        $calendario_id = $_POST['calendario_id'];
        $mantto_id = $_POST['mantto_id'];
        $this->delAllEventDoc($evento['id']);
        $this->eventoTable->deleteWhere('id',$evento['id']);
        $mantto = $this->manttoTable->findById($mantto_id);
        header('location: /mantto/ver?ideC='.$calendario_id.'&id='.$mantto_id.'&grupo='.$mantto->grupo); 
    }
    
    public function delEventDoc(){
        $usuario= $this->authentication->getUser();
        $evento_id = $_POST['evento_id'];
        $mantto_id = $_POST['mantto_id'];
        $mantto = $this->manttoTable->findById($mantto_id);
        
        $entidad_doc = $this->docuTable->findById($_POST['doc_id']);

        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$entidad_doc->tipo_entidad.'/doc/'.$entidad_doc->tipo.'/'.$entidad_doc->nombre);
        
        $this->docuTable->delete($_POST['doc_id']);
        
        header('location: /mantto/ver?ideE='.$evento_id.'&id='.$mantto_id.'&grupo='.$mantto->grupo); 
            
 
        
    }
    
    private function delAllDoc($mantto_id){
        $usuario= $this->authentication->getUser();

		$all_doc = $this->manttoTable->findById($mantto_id)->getAllDoc();
        
        foreach($all_doc as $mantto_doc){
        
        $doc_id = $mantto_doc->id;
            
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$mantto_doc->tipo_entidad.'/doc/'.$mantto_doc->tipo.'/'.$mantto_doc->nombre);
        
        $this->docuTable->delete($doc_id);
            
        }
        
    }
    
    private function delAllEventDoc($event_id){
        $usuario= $this->authentication->getUser();

		$all_doc = $this->eventoTable->findById($event_id)->getAllDoc();
        
        foreach($all_doc as $event_doc){
        
        $doc_id = $event_doc->id;
            
        unlink($_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$event_doc->tipo_entidad.'/doc/'.$event_doc->tipo.'/'.$event_doc->nombre);
        
        $this->docuTable->delete($doc_id);
            
        }
        
    }
}