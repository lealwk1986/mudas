<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Plantilla {
	private $plantillaTable;
    private $authentication;
    private $datoplantillaTable;



	public function __construct(\FrameWork\DatabaseTable $plantillaTable,
                                \FrameWork\DatabaseTable $datoplantillaTable,
                                Authentication $authentication) {
                                    $this->plantillaTable = $plantillaTable;
                                    $this->authentication = $authentication;
                                    $this->datoplantillaTable = $datoplantillaTable;
                                }
    
    public function ver() {
        
		$title = 'Ver Plantilla';
		return ['template' => 'plantilla.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
	}
    
    public function veri() {
        
        $user = $this->authentication->getUser();
		$plantilla  = $this->plantillaTable->findById($_GET['id']);

		$title = 'Ver Plantilla';

		return ['template' => 'plantilla.ajax.php', 
			'title' => $title, 
			'variables' => [
                'user' => $user,
			    'plantilla' => $plantilla
			  ]
		];
	}

	public function editari() {
        $user = $this->authentication->getUser();
        $plantilla  = $this->plantillaTable->findById($_GET['id']);

		$title = 'Edit plantilla';

		return ['template' => 'editPlantilla.ajax.php',
				'title' => $title,
				'variables' => [
                    'user' => $user,
					'plantilla' => $plantilla 
				]
		];
	}

	public function saveEdit() {
		$plantilla = $_POST['plantilla'];
        

		$id_last = $this->plantillaTable->save($plantilla)->id;
        
        if($plantilla['id']==''){
            $ind=$id_last;
        }else{
            $ind=$plantilla['id'];
        }        
        
        if(isset($_POST['aplic'])){
        header('location: /plantilla/ver?id='.$ind); }
        else{
        header('location: /plantilla/ver?ide='.$ind);    
        }        

	}
    
    public function nuevo(){
        $user = $this->authentication->getUser();


        $title = 'plantilla Nuevo';
		return ['template' => 'editPlantilla.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,

					]
				]; 
        }

	public function borrar() {
        $user = $this->authentication->getUser();
        $plantilla = $this->plantillaTable->findById($_POST['id']);
        
        foreach($plantilla->getDatoplantilla() as $datoplantilla){
            $this->datoplantillaTable->delete($datoplantilla->id);
        }
        $this->plantillaTable->delete($plantilla->id);

        header('location: /plantilla/ver'); 
      

	}
    
    public function delDatoplantilla(){
        $usuario= $this->authentication->getUser();
        
        $this->datoplantillaTable->delete($_POST['datoplantilla_id']);
        
        header('location: /plantilla/ver?ide='.$_POST['plantilla_id']); 
        
        
    } 
    
    public function addDatoplantilla(){

        $usuario= $this->authentication->getUser();
        $datoplantilla = $_POST['datoplantilla'];
        $plantilla_id = $datoplantilla['plantilla_id'];
        $datoplantilla_id = $this->datoplantillaTable->save($datoplantilla)->id;
        header('location: /plantilla/ver?ide='.$plantilla_id); 
        
        
    } 
    
    public function editarDatoplantilla(){
        $user = $this->authentication->getUser();
        $datoplantilla = $this->datoplantillaTable->findById($_GET['datoplantilla_id']);
        $plantilla = $this->plantillaTable->findById($_GET['plantilla_id']);
        $title = 'Editar Datoplantilla';
		return ['template' => 'editDatoplantilla.ajax.php', 
				'title' => $title, 
				'variables' => [
                    'user' => $user,
                    'datoplantilla' => $datoplantilla,
                    'plantilla' => $plantilla

					]
				];        
    }
    
    public function saveDatoplantilla(){
        $usuario= $this->authentication->getUser();

        $datoplantilla = $_POST['datoplantilla'];
        $plantilla_id = $datoplantilla['plantilla_id'];
        $this->datoplantillaTable->save($datoplantilla);
        header('location: /plantilla/ver?id='.$plantilla_id); 
        
    }
    

    
    
}