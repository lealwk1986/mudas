<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Grupounidad {
	private $grupounidadTable;
    private $authentication;
    private $unidad_grupounidadTable;

	public function __construct(\FrameWork\DatabaseTable $grupounidadTable,
                               \FrameWork\DatabaseTable $unidad_grupounidadTable,
                                Authentication $authentication) {
		$this->grupounidadTable = $grupounidadTable;
        $this->authentication = $authentication;
        $this->unidad_grupounidadTable = $unidad_grupounidadTable;
	}
    
    public function ver() {
        
		$title = 'Ver GrupoUnidad';
		return ['template' => 'grupounidad.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
	}
    
    public function veri() {
        
        $user = $this->authentication->getUser();
		$grupounidad  = $this->grupounidadTable->findById($_GET['id']);

		$title = 'Ver GrupoUnidad';

		return ['template' => 'grupounidad.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'grupounidad' => $grupounidad
			  ]
		];
	}

	public function editari() {
        $user = $this->authentication->getUser();
        $grupounidad = $this->grupounidadTable->findById($_GET['id']);
        

		$title = 'Edit GrupoUnidad';

		return ['template' => 'editGrupounidad.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
					'grupounidad' => $grupounidad ?? null
				]
		];
	}

	public function saveEdit() {
		$grupounidad = $_POST['grupounidad'];

		$id_last = $this->grupounidadTable->save($grupounidad)->id;
        
        if($grupounidad['id']==''){
            $ind=$id_last;
        }else{
            $ind=$grupounidad['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /grupounidad/ver?id='.$ind); }
        else{
        header('location: /grupounidad/ver?ide='.$ind);    
        }        

	}

	public function borrar() {
        $user = $this->authentication->getUser();
        
        $this->unidad_grupounidadTable->deleteWhere( 'grupounidad_id', $_POST['id']);
		$this->grupounidadTable->delete($_POST['id']);
        

        header('location: /grupounidad/ver'); 
      

	}
    
    public function delUnidad(){
        $usuario= $this->authentication->getUser();
        
        $this->unidad_grupounidadTable->deleteWhere2('unidad_id', $_POST['unidad_id'], 'grupounidad_id', $_POST['grupounidad_id']);
        
        header('location: /grupounidad/ver?ide='.$_POST['grupounidad_id']); 
        
        
    } 
    
    public function addUnidad(){
        $usuario= $this->authentication->getUser();
        $unidad_grupounidad = $_POST['unidad_grupounidad'];
 
        $this->unidad_grupounidadTable->save($unidad_grupounidad);
        
        header('location: /grupounidad/ver?ide='.$unidad_grupounidad['grupounidad_id']); 
        
        
    } 
    
    public function nuevo(){
        $user = $this->authentication->getUser();

        $title = 'Unidad Nuevo';
		return ['template' => 'editGrupounidad.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
					]
				]; 
        }
    
    
    
    
}