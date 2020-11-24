<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Notifica {
    private $cajachicaTable;
    private $eventoTable;
    private $entradamTable;
    private $libroactaTable;
    private $registroTable;
    private $authentication;
    
    public function __construct( DatabaseTable $cajachicaTable, DatabaseTable $eventoTable, DatabaseTable $entradamTable , DatabaseTable $libroactaTable, DatabaseTable $registroTable, Authentication $authentication ){
        
        $this->cajachicaTable = $cajachicaTable ;
        $this->eventoTable = $eventoTable ;
        $this->entradamTable = $entradamTable ;
        $this->libroactaTable = $libroactaTable ;
        $this->registroTable = $registroTable ;
        $this->authentication = $authentication ; 
    }
    
    public function ver(){
        $title = 'Ver Noticifación';
		return ['template' => 'notifica.html.php', 
			'title' => $title, 
			'variables' => [
			  ]
		];
    }
    
    public function veri() {
        
        
        $id = $_GET['id'];
        $user = $this->authentication->getUser();
		$title = 'Ver Notificaciones';
        
        
        switch($id){
            case '1':
                $lista = [];
            break;
            case '2':
                $lista = $this->eventoTable->findLessThan('fecha',date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days')));
            break;
            case '3':
                $lista = $this->eventoTable->findLessThan('fecha',date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days')));
            break;
            case '4':
                $lista = $this->cajachicaTable->findLessThan('fecha_fin',date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days')));
            break;  
            case '5':
                $lista = $this->libroactaTable->findLessThan('fecha_fin',date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days')));
            break; 
            case '6':
                $lista = $this->datolistaTable->findLessThan('fecha',date("Y/m/d H:i:s",strtotime( date("Y-m-d H:i:s").'-2 days')));
            break; 
            case '7':
                $lista = $this->entradamTable->agruparTodoMenor('nombre','cantidad','min');
                $strin = $query = 'SELECT `'.'nombre'.'`, SUM(`'.'cantidad'.'`) AS `'.'cantidad'.'` FROM `' . 'entradam' .'` GROUP BY `'.'nombre'.'`' ; 
            break; 
            default:
                $lista = [];
          } 
        
        
        
        

		return ['template' => 'notifica.ajax.php', 
                'title' => $title, 
                'variables' => [
                    'user' => $user,
                    'lista' => $lista,
                    'strin' => $strin
			  ]
		];
	}    
    
    

}