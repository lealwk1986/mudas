<?php
namespace Sismaed\Controllers;
use \FrameWork\DatabaseTable;
use \FrameWork\Authentication;

class Registro {
	private $usuariosTable;
    private $authentication;

	public function __construct(DatabaseTable $usuariosTable, Authentication $authentication) {
		$this->usuariosTable = $usuariosTable;
        $this->authentication = $authentication;
	}

	public function registrationForm() {
		return ['template' => 'register.html.php', 
				'title' => 'Registro de Cuenta'];
	}

    public function modform() {
        $usuario = $this->usuariosTable->findById($_GET['id']);
		return ['template' => 'register.html.php', 
				'title' => 'Modificar de Cuenta',
                'variables' => [
				    	'usuarioO' => $usuario
				    ]
               ];
	}
    

	public function success() {
		return ['template' => 'registersuccess.html.php', 
			    'title' => 'Registro Exitoso'];
	}

	public function registerUser() {
		$usuario = $_POST['usuario'];

		//Assume the data is valid to begin with
		$valid = true;
		$errors = [];

		//But if any of the fields have been left blank, set $valid to false
		if (empty($usuario['name'])) {
			$valid = false;
			$errors[] = 'Name cannot be blank';
		}

		if (empty($usuario['email'])) {
			$valid = false;
			$errors[] = 'Email cannot be blank';
		}
		else if (filter_var($usuario['email'], FILTER_VALIDATE_EMAIL) == false) {
			$valid = false;
			$errors[] = 'Invalid email address';
		}
		else { //if the email is not blank and valid:
			//convert the email to lowercase
			$usuario['email'] = strtolower($usuario['email']);

			//search for the lowercase version of `$author['email']`
			if (count($this->usuariosTable->find('email', $usuario['email'])) > 0 && !isset($_POST['modificar']) ) {
				$valid = false;
				$errors[] = 'Este E-mail ya está registrado';
			}
		}


		if (empty($usuario['password'])) {
			$valid = false;
			$errors[] = 'El password no puede estar en blanco';
		}

		//If $valid is still true, no fields were blank and the data can be added
		if ($valid == true) {
			//Hash the password before saving it in the database
			$usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT);

			//When submitted, the $author variable now contains a lowercase value for email
			//and a hashed password
			$this->usuariosTable->save($usuario);

			header('Location: /usuario/success');
		}
		else {
			//If the data is not valid, show the form again
			return ['template' => 'register.html.php', 
				    'title' => 'Register an account',
				    'variables' => [
				    	'errors' => $errors,
				    	'usuario' => $usuario
				    ]
				   ]; 
		}
	}

	public function list() {
		$usuarios = $this->usuariosTable->findAll();
        
        $user = $this->authentication->getUser();

		return ['template' => 'authorlist.html.php',
				'title' => 'Lista de Usuarios',
				'variables' => [
						'usuarios' => $usuarios,
                        'user'  => $user
					]
				];
	}

	public function permissions() {

		$usuario = $this->usuariosTable->findById($_GET['id']);

		$reflected = new \ReflectionClass('\Sismaed\Entity\Usuario');
		$constants = $reflected->getConstants();

		return ['template' => 'permissions.html.php',
				'title' => 'Edit Permissions',
				'variables' => [
						'usuario' => $usuario,
						'permissions' => $constants
					]
				];	
	}
    
    
    
	public function savePermissions() {
        
		$usuario = [
			'id' => $_GET['id'],
			'permissions' => array_sum($_POST['permissions'] ?? []),
            'grupo' => array_sum($_POST['grupos'] ?? [])
		];

		$this->usuariosTable->save($usuario);

		header('location: /usuario/lista');
	}
    
   
	public function deleteUser() {

		$usua = $this->authentication->getUser();

		$usuario = $this->usuariosTable->findById($_POST['id']);

		if (!$usua->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6) ) {
			return;
		}
		

		$this->usuariosTable->delete($_POST['id']);

		header('location: /usuario/lista'); 
	}

}