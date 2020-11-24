<?php
namespace FrameWork;

class EntryPoint {
	private $route;
	private $method;
	private $routes;

	public function __construct(string $route, string $method, \FrameWork\Routes $routes) {
		$this->route = $route;
		$this->routes = $routes;
		$this->method = $method;
		$this->checkUrl();
	}

	private function checkUrl() {
		if ($this->route !== strtolower($this->route)) {
			http_response_code(301);
			header('location: ' . strtolower($this->route));
		}
	}

	private function loadTemplate($templateFileName, $subroute = '' , $variables = []) {
		extract($variables);

		ob_start();
		include  __DIR__ . '/../../templates/'.$subroute.'/'.$templateFileName;

		return ob_get_clean();
	}

	public function run() {

		$routes = $this->routes->getRoutes();	

		$authentication = $this->routes->getAuthentication();

		if (isset($routes[$this->route]['login']) && !$authentication->isLoggedIn()) {
			header('location: /login/error');
		}else if (isset($routes[$this->route]['permissions']) && isset($routes[$this->route]['ajax']) && !$this->routes->checkPermission($routes[$this->route]['permissions'])) {
			$base='ajax.html.php';	
            $output='NO TIENE PERMISOS PARA VER ESTA PAGINA';
            echo $this->loadTemplate($base, '' ,['loggedIn' => $authentication->isLoggedIn(),
			                                             'output' => $output,
			                                             
                                                         'user' => $authentication->getuser()
			                                            ]);

		}
		else if (isset($routes[$this->route]['permissions']) && !$this->routes->checkPermission($routes[$this->route]['permissions'])) {
			header('location: /login/permissionserror');	
		}
		else {
			$controller = $routes[$this->route][$this->method]['controller'];
			$action = $routes[$this->route][$this->method]['action'];
			$page = $controller->$action();

			$title = $page['title'];

			if (isset($page['variables'])) {
				$output = $this->loadTemplate($page['template'], $routes[$this->route]['ruta'] ?? '', $page['variables']);
			}
			else {
				$output = $this->loadTemplate($page['template'], $routes[$this->route]['ruta'] ?? '');
			}
            
            $base='layout.html.php';
            
            if($routes[$this->route]['ajax'] ?? false){
                if(!(isset($routes[$this->route]['login']) && !$authentication->isLoggedIn())){
                $base='ajax.html.php';
                }else{
                    $base='logingerro.html.php';
                }
            }

			echo $this->loadTemplate($base, '' ,['loggedIn' => $authentication->isLoggedIn(),
			                                             'output' => $output,
			                                             'title' => $title,
                                                         'user' => $authentication->getuser()
			                                            ]);

		}

	}
}