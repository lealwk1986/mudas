<?php
namespace Sismaed\Controllers;

class Login {
	private $authentication;

	public function __construct(\FrameWork\Authentication $authentication) {
		$this->authentication = $authentication;
	}

	public function loginForm() {
        
        header('Location: /');
		/*return ['template' => 'login.html.php', 'title' => 'Log In'];*/
	}

	public function processLogin() {
		if ($this->authentication->login($_POST['email'], $_POST['password'])) {
			header('location: /unidad/ver');
		}
		else {
            
            header('Location: /');
/*			return ['template' => 'login.html.php',
					'title' => 'Log In',
					'variables' => [
							'error' => 'Invalid username/password.'
						]
					];*/
		}
	}

	public function success() {
		return ['template' => 'loginsuccess.html.php', 'title' => 'Login Successful'];
	}

	public function error() {
        
        header('Location: /');
		/*return ['template' => 'loginerror.html.php', 'title' => 'You are not logged in'];*/
	}

	public function permissionsError() {
        
        /* header('Location: /');*/
		return ['template' => 'permissionserror.html.php', 'title' => 'Access Denied'];
	}

	public function logout() {
		unset($_SESSION);
		session_destroy();
        
        header('Location: /');
		/*return ['template' => 'logout.html.php', 'title' => 'You have been logged out'];*/
	}
    
    public function home() {
		$title = 'SISMAED 1.0';

		return ['template' => 'home.html.php', 'title' => $title];
	}
}
