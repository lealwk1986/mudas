<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;

class Documento {
	private $nombreDoc;
    private $docuTable;

	public function __construct(DatabaseTable $docuTable) {
        $this->docuTable = $docuTable;
	}

	public function servir() {
        $title = "Documento";
        return ['template' => 'documento.html.php',
               'title' => $title ];
	}

    public function subir() {
            if(isset($_POST["submit"])){
                for($i=0; $i< count($_FILES["fileToUpload"]["name"]); $i++){
                    $tmpFilePath=$_FILES["fileToUpload"]["tmp_name"][$i];
                    if($tmpFilePath != ""){
     $newFilePath=$_SERVER["DOCUMENT_ROOT"].'/../data'.'/'.$_POST["tipo_entidad"].'/doc/'.$_POST["tipo_doc"].'/'.$_FILES["fileToUpload"]["name"][$i];
                  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                      header('location: /'.$_POST["tipo_entidad"].'/ver?id='.$_POST["entidad_id"]); 
                  }      
                    }
                }
            }

           
        }
	
}