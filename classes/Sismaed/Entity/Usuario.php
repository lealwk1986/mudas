<?php
namespace Sismaed\Entity;

class Usuario {

	const PERMISO_1 = 1;
	const PERMISO_2 = 2;
	const PERMISO_3 = 4;
	const PERMISO_4 = 8;
	const PERMISO_5 = 16;
	const PERMISO_6 = 32;
    
    const GRUPO_1 = 1;
	const GRUPO_2 = 2;
	const GRUPO_3 = 4;
	const GRUPO_4 = 8;
	const GRUPO_5 = 16;
	const GRUPO_6 = 32;
    

	public $id;
	public $name;
	public $email;
	public $password;
    public $permissions;
    public $grupo;
    public $peog_id;
    

	public function __construct() {
	}

	public function hasPermission($permission) {
		return $this->permissions & $permission;  
	}
    
    public function hasGrupo($grupo) {
		return $this->grupo & $grupo;  
	}
}