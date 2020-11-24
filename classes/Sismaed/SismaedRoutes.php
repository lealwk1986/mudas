<?php
namespace Sismaed;

class SismaedRoutes implements \FrameWork\Routes {
    private $usuariosTable;
	private $authentication;
    
    private $unidadTable;
    private $peogTable;
    private $manttoTable;
    private $docuTable;
    private $unidad_docuTable;
    private $unidad_manttoTable;
    private $peog_docuTable;
    private $mantto_docuTable;
    private $mantto_peogTable;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->usuariosTable = new \FrameWork\DatabaseTable($pdo, 'usuario', 'id', '\Sismaed\Entity\Usuario');
        $this->authentication = new \FrameWork\Authentication($this->usuariosTable, 'email', 'password');       

        $this->unidadTable = new \FrameWork\DatabaseTable($pdo,'unidad', 'id', '\Sismaed\Entity\Unidad',
                              [&$this->unidadTable, &$this->docuTable, &$this->peogTable, &$this->unidad_peogTable, &$this->manttoTable, &$this->unidad_manttoTable, &$this->grupounidadTable, &$this->unidad_grupounidadTable ]);   
        $this->peogTable = new \FrameWork\DatabaseTable($pdo,'peog','id','\Sismaed\Entity\Peog', 
                            [ &$this->peogTable ,&$this->docuTable ,  &$this->unidadTable,  &$this->unidad_peogTable, &$this->manttoTable, &$this->mantto_peogTable ]);
        $this->grupounidadTable = new \FrameWork\DatabaseTable($pdo,'grupounidad','id','\Sismaed\Entity\Grupounidad', 
                            [  &$this->unidadTable, &$this->unidad_grupounidadTable ]);
        $this->manttoTable = new \FrameWork\DatabaseTable($pdo,'mantto', 'id', '\Sismaed\Entity\Mantto',
                              [&$this->docuTable, &$this->peogTable, &$this->mantto_peogTable, &$this->unidadTable, &$this->unidad_manttoTable,
                              &$this->calendarioTable, &$this->mantto_calendarioTable]);        
        $this->docuTable = new \FrameWork\DatabaseTable($pdo,'documento','id','\Sismaed\Entity\Documento');
        $this->eventoTable = new \FrameWork\DatabaseTable($pdo,'evento','id', '\Sismaed\Entity\Evento', [&$this->docuTable, &$this->mantto_calendarioTable, &$this->manttoTable] );
        $this->calendarioTable = new \FrameWork\DatabaseTable($pdo,'calendario','id','\Sismaed\Entity\Calendario',
                                [&$this->eventoTable,&$this->mantto_calendarioTable,&$this->manttoTable]);
        $this->cajachicaTable = new \FrameWork\DatabaseTable($pdo,'cajachica','id','\Sismaed\Entity\CajaChica',[&$this->gastoTable, &$this->peogTable]);
        $this->gastoTable = new \FrameWork\DatabaseTable($pdo,'gasto','id','\Sismaed\Entity\Gasto',[&$this->docuTable, $this->peogTable] );
        $this->inventarioTable = new \FrameWork\DatabaseTable($pdo,'inventario','id','\Sismaed\Entity\Inventario',[&$this->entradamTable, $this->peogTable]);
        $this->entradamTable = new \FrameWork\DatabaseTable($pdo,'entradam','id','\Sismaed\Entity\Entradam',[&$this->inventarioTable, &$this->docuTable, $this->peogTable] );
        $this->libroactaTable = new \FrameWork\DatabaseTable($pdo,'libroacta','id','\Sismaed\Entity\LibroActa',[&$this->registroTable, $this->peogTable]);
        $this->registroTable = new \FrameWork\DatabaseTable($pdo,'registro','id','\Sismaed\Entity\Registro',[&$this->docuTable, $this->peogTable] );
        $this->plantillaTable = new \FrameWork\DatabaseTable($pdo,'plantilla','id','\Sismaed\Entity\Plantilla',[&$this->datoplantillaTable]);
        $this->datoplantillaTable = new \FrameWork\DatabaseTable($pdo,'datoplantilla','id');
        $this->reporteTable = new \FrameWork\DatabaseTable($pdo,'reporte','id','\Sismaed\Entity\Reporte',[&$this->datoreporteTable,  &$this->peogTable, &$this->plantillaTable, &$this->eventoTable, &$this->reporte_eventoTable]);
        $this->datoreporteTable = new \FrameWork\DatabaseTable($pdo,'datoreporte','id','\Sismaed\Entity\Datoreporte',[&$this->docuTable]);

        $this->unidad_peogTable = new \FrameWork\DatabaseTable($pdo,'unidad_has_peog','unidad_id');
        $this->unidad_manttoTable = new \FrameWork\DatabaseTable($pdo,'unidad_has_mantto','unidad_id');
        $this->unidad_grupounidadTable = new \FrameWork\DatabaseTable($pdo,'unidad_has_grupounidad','unidad_id');
        $this->mantto_peogTable = new \FrameWork\DatabaseTable($pdo,'mantto_has_peog','mantto_id');
        $this->mantto_calendarioTable = new \FrameWork\DatabaseTable($pdo,'mantto_has_calendario','mantto_id');
        $this->reporte_eventoTable = new \FrameWork\DatabaseTable($pdo,'reporte_has_evento','reporte_id');

	}

	public function getRoutes(): array {
		$usuarioController = new \Sismaed\Controllers\Registro($this->usuariosTable, $this->authentication);
		$loginController = new \Sismaed\Controllers\Login($this->authentication);
        $unidadController = new \Sismaed\Controllers\Unidad($this->unidadTable, $this->peogTable, $this->docuTable, $this->grupounidadTable , $this->unidad_peogTable, $this->unidad_grupounidadTable , $this->authentication);
        $documentoController = new \Sismaed\Controllers\Documento( $this->docuTable);
		$manttoController = new \Sismaed\Controllers\Mantto($this->manttoTable, $this->peogTable, $this->docuTable, $this->unidad_manttoTable, $this->mantto_peogTable ,$this->calendarioTable, $this->mantto_calendarioTable, $this->eventoTable, $this->grupounidadTable ,$this->authentication);
		$peogController = new \Sismaed\Controllers\Peog($this->peogTable, $this->docuTable, $this->unidad_peogTable , $this->mantto_peogTable , $this->authentication);
        $navegadorController = new \Sismaed\Controllers\Navegador($this->unidadTable, $this->grupounidadTable,$this->peogTable, $this->manttoTable , $this->reporteTable, $this->cajachicaTable, $this->inventarioTable, $this->libroactaTable ,  $this->plantillaTable);
        $grupounidadController = new \Sismaed\Controllers\Grupounidad($this->grupounidadTable, $this->unidad_grupounidadTable, $this->authentication);
        $cajachicaController = new \Sismaed\Controllers\CajaChica($this->cajachicaTable, $this->gastoTable, $this->docuTable, $this->peogTable ,$this->authentication);
        $inventarioController = new \Sismaed\Controllers\Inventario($this->inventarioTable, $this->entradamTable, $this->docuTable, $this->peogTable ,$this->authentication);
        $libroactaController = new \Sismaed\Controllers\LibroActa($this->libroactaTable, $this->registroTable, $this->docuTable, $this->peogTable ,$this->authentication);
        $plantillaController = new \Sismaed\Controllers\Plantilla($this->plantillaTable, $this->datoplantillaTable, $this->authentication);
        $reporteController = new \Sismaed\Controllers\Reporte($this->reporteTable, $this->datoreporteTable, $this->docuTable, $this->peogTable, $this->plantillaTable , $this->eventoTable , $this->reporte_eventoTable ,$this->authentication);
        $dummyController = new \Sismaed\Controllers\Dummy($this->peogTable, $this->gastoTable, $this->docuTable);
        $notificaController = new \Sismaed\Controllers\Notifica( $this->cajachicaTable, $this->eventoTable, $this->entradamTable, $this->libroactaTable, $this->registroTable, $this->authentication);
        
		$routes = [
            
            'notifica/ver' => [
                'GET' => [
                        'controller' =>$notificaController,
                        'action' => 'ver'],
                        'ruta' => 'notifica',
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'notifica/veri' => [
                'GET' => ['controller' =>$notificaController,
                           'action' => 'veri'],
                'ruta' => 'notifica',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            
            'navegador/unidad'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolUnidad'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],

            'navegador/grupounidad'=> [
                'GET' => ['controller' =>$navegadorController,
                            'action' => 'arbolgrupoUnidad'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                            ],

            'navegador/peog'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolPeog'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'navegador/reporte'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolReporte'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'navegador/mantto'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolMantto'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'navegador/cajachica'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolCajaChica'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'navegador/inventario'=> [
                'GET' => ['controller' =>$navegadorController,
                            'action' => 'arbolInventario'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                            ],

            'navegador/libroacta'=> [
                'GET' => ['controller' =>$navegadorController,
                            'action' => 'arbolLibroActa'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                            ],

            'navegador/plantilla'=> [
                'GET' => ['controller' =>$navegadorController,
                            'action' => 'arbolPlantilla'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                            ],                

            'navegador/notifica'=> [
                'GET' => ['controller' =>$navegadorController,
                           'action' => 'arbolNotifica'],
                'ruta' => '',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            
            'reporte/ver' => [
                'GET' => [
                        'controller' =>$reporteController,
                        'action' => 'ver'],
                        'ruta' => 'reporte',
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'reporte/veri' => [
                'GET' => ['controller' =>$reporteController,
                           'action' => 'veri'],
                'ruta' => 'reporte',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'reporte/editari' => [
                'GET' => [
                    'controller' => $reporteController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $reporteController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'reporte',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/adddatoreporte' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'addDatoreporte'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/deldatoreporte' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'delDatoreporte'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/nuevo' => [
                'GET' => [
                    'controller' => $reporteController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'reporte',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/borrar' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/editardatoreporte' => [
                'GET' => [
                    'controller' => $reporteController,
                    'action' => 'editarDatoreporte'
                        ],
                'ruta' => 'reporte',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/savedatoreporte' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'saveDatoreporte'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/adddatoreportedoc' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'addDatoreporteDoc'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/deldatoreportedoc' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'delDatoreporteDoc'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/someterreporte' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'someterreporte'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/addevento' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'addEvento'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'reporte/delevento' => [
                'POST' => [
                    'controller' => $reporteController,
                    'action' => 'delEvento'
                        ],
                'ruta' => 'reporte',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            
            'plantilla/ver' => [
                'GET' => [
                        'controller' =>$plantillaController,
                        'action' => 'ver'],
                        'ruta' => 'plantilla',
                    'loging' => true,
                    'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'plantilla/veri' => [
                'GET' => ['controller' =>$plantillaController,
                           'action' => 'veri'],
                    'ruta' => 'plantilla',
                    'ajax' =>true,
                    'loging' => true,
                    'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'plantilla/editari' => [
                'GET' => [
                    'controller' => $plantillaController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $plantillaController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'plantilla',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'plantilla/adddatoplantilla' => [
                'POST' => [
                    'controller' => $plantillaController,
                    'action' => 'addDatoplantilla'
                        ],
                'ruta' => 'plantilla',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
             ],
            'plantilla/deldatoplantilla' => [
                'POST' => [
                    'controller' => $plantillaController,
                    'action' => 'delDatoplantilla'
                        ],
                'ruta' => 'plantilla',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'plantilla/nuevo' => [
                'GET' => [
                    'controller' => $plantillaController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'plantilla',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'plantilla/borrar' => [
                'POST' => [
                    'controller' => $plantillaController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'plantilla',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'plantilla/editardatoplantilla' => [
                'GET' => [
                    'controller' => $plantillaController,
                    'action' => 'editarDatoplantilla'
                        ],
                'ruta' => 'plantilla',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'plantilla/savedatoplantilla' => [
                'POST' => [
                    'controller' => $plantillaController,
                    'action' => 'saveDatoplantilla'
                        ],
                'ruta' => 'plantilla',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            
            'libroacta/ver' => [
                'GET' => [
                        'controller' =>$libroactaController,
                        'action' => 'ver'],
                        'ruta' => 'libroacta',
                    'loging' => true,
                    'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                           ],
            'libroacta/veri' => [
                'GET' => ['controller' =>$libroactaController,
                           'action' => 'veri'],
                    'ruta' => 'libroacta',
                    'ajax' =>true,
                    'loging' => true,
                    'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                           ],
            'libroacta/editari' => [
                'GET' => [
                    'controller' => $libroactaController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $libroactaController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'libroacta',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
              ],
            'libroacta/addregistro' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'addRegistro'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
             ],
            'libroacta/delregistro' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'delRegistro'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/nuevo' => [
                'GET' => [
                    'controller' => $libroactaController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'libroacta',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/borrar' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/editarregistro' => [
                'GET' => [
                    'controller' => $libroactaController,
                    'action' => 'editarRegistro'
                        ],
                'ruta' => 'libroacta',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/saveregistro' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'saveRegistro'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/addregistrodoc' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'addRegistroDoc'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'libroacta/delregistrodoc' => [
                'POST' => [
                    'controller' => $libroactaController,
                    'action' => 'delRegistroDoc'
                        ],
                'ruta' => 'libroacta',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            
            'inventario/ver' => [
                'GET' => [
                        'controller' =>$inventarioController,
                        'action' => 'ver'],
                'ruta' => 'inventario',
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'inventario/veri' => [
                'GET' => ['controller' =>$inventarioController,
                           'action' => 'veri'],
                    'ruta' => 'inventario',
                    'ajax' =>true,
                    'loging' => true,
                    'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                           ],
            'inventario/editari' => [
                'GET' => [
                    'controller' => $inventarioController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $inventarioController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'inventario',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'inventario/addentradam' => [
                'POST' => [
                    'controller' => $inventarioController,
                    'action' => 'addEntradam'
                        ],
                'ruta' => 'inventario',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'inventario/editentradam' => [
                'GET' => [
                    'controller' => $inventarioController,
                    'action' => 'editItem'
                        ],
                'POST' => [
                    'controller' => $inventarioController,
                    'action' => 'saveEditItem'
                        ],
                'ruta' => 'inventario',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'inventario/delentradam' => [
                'POST' => [
                    'controller' => $inventarioController,
                    'action' => 'delEntradam'
                        ],
                'ruta' => 'inventario',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'inventario/nuevo' => [
                'GET' => [
                    'controller' => $inventarioController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'inventario',
                'ajax' => true,
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'inventario/borrar' => [
                'POST' => [
                    'controller' => $inventarioController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'inventario',
                'login' => true,
		        'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            
            'cajachica/ver' => [
                'GET' => [
                        'controller' =>$cajachicaController,
                        'action' => 'ver'],
                'ruta' => 'cajaChica',
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                           ],
            'cajachica/veri' => [
                'GET' => ['controller' =>$cajachicaController,
                           'action' => 'veri'],
                'ruta' => 'cajaChica',
                'ajax' =>true,
                'loging' => true,
                'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                           ],
            'cajachica/editari' => [
                'GET' => [
                    'controller' => $cajachicaController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $cajachicaController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'cajaChica',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'cajachica/addgasto' => [
                'POST' => [
                    'controller' => $cajachicaController,
                    'action' => 'addGasto'
                        ],
                'ruta' => 'cajachica',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'cajachica/delgasto' => [
                'POST' => [
                    'controller' => $cajachicaController,
                    'action' => 'delGasto'
                        ],
                'ruta' => 'cajachica',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'cajachica/nuevo' => [
                'GET' => [
                    'controller' => $cajachicaController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'cajachica',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            'cajachica/borrar' => [
                'POST' => [
                    'controller' => $cajachicaController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'cajachica',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_4
                ],
            
            'doc' => [
                'GET' => [
                    'controller' => $documentoController,
                    'action' => 'servir'
                        ],
                'login' => true,
                'ajax' => true
                ],
            'doc/cargar' => [
                'POST' => [
                    'controller' => $documentoController,
                    'action' => 'subir'
                        ],
                'login' => true,
                 'ajax' => true
                ],
            
            'peog/ver' => [
                'GET' => [
                    'controller' => $peogController,
                    'action' => 'ver'
                    ],
                'ruta' => 'peog',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'peog/veri' => [
                'GET' => [
                    'controller' => $peogController,
                    'action' => 'veri'
                ],
                'ruta' => 'peog',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
			'peog/editari' => [
                'GET' => [
                    'controller' => $peogController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $peogController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'peog',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'peog/adddoc' => [
                'POST' => [
                    'controller' => $peogController,
                    'action' => 'saveEditDoc'
                        ],
                'ruta' => 'peog',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'peog/deldoc' => [
                'POST' => [
                    'controller' => $peogController,
                    'action' => 'delDoc'
                        ],
                'ruta' => 'peog',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'peog/nuevo' => [
                'GET' => [
                    'controller' => $peogController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'peog',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'peog/borrar'  => [
                'POST' => [
                    'controller' => $peogController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'peog',
                                'login' => false,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            
            'mantto/ver' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'ver'
                ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'mantto/veri' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'veri'
                ],
                'ajax' => true,
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
			'mantto/editari' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $manttoController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'mantto',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2,
                ],
            'mantto/addunid' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditUnidad'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/delunidad' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delUnidad'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/delallunidad' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delAllUnidad'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/addpeog' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditPeog'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ], 
            'mantto/delpeog' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delPeog'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/addcalend' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'addNewCalend'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/addevent' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'addNewEvent'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/delcalend' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delCalend'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/adddoc' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditDoc'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/deldoc' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delDoc'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/nuevo' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'mantto',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/borrar'  => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'mantto',
                'login' => false,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/editcal' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'editCal'
                ],
                'POST'=> [
                    'controller' => $manttoController,
                    'action' => 'saveEditCalend'
                ],
                'ruta' => 'mantto',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/editevent' => [
                'GET' => [
                    'controller' => $manttoController,
                    'action' => 'editEvent'
                ],
                'POST'=> [
                    'controller' => $manttoController,
                    'action' => 'saveEditEvent'
                ],
                'ruta' => 'mantto',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/delevento' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delEvent'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/addeventdoc' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditEventDoc'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/deleventdoc' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'delEventDoc'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                    ],
            'mantto/addgrupounidad' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditGrupo'
                        ],
                'ruta' => 'mantto',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            'mantto/savemanttor' => [
                'POST' => [
                    'controller' => $manttoController,
                    'action' => 'saveEditR'
                        ],
                'ruta' => 'mantto',
                                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_2
                ],
            
            'unidad/ver' => [
                'GET' => [
                    'controller' => $unidadController,
                    'action' => 'ver'
                        ],
                'ruta' => 'unidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'unidad/veri' => [
                'GET' => [
                    'controller' => $unidadController,
                    'action' => 'veri'
                ],
                'ruta' => 'unidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'unidad/editari' => [
                'GET' => [
                    'controller' => $unidadController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $unidadController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'unidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/addpeog' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'saveEditPeog'
                        ],
                'ruta' => 'unidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/adddoc' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'saveEditDoc'
                        ],
                'ruta' => 'unidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/addgrupo' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'saveEditGrupo'
                        ],
                'ruta' => 'unidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/delpeog' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'delPeog'
                        ],
                'ruta' => 'unidad',
                 'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/deldoc' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'delDoc'
                        ],
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/delgrupo' => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'delGrupo'
                        ],
                'ruta' => 'unidad',
                                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/nuevo' => [
                'GET' => [
                    'controller' => $unidadController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'unidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'unidad/borrar'  => [
                'POST' => [
                    'controller' => $unidadController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'unidad',
                'login' => false,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
             ],
            
            'grupounidad/ver' => [
                'GET' => [
                    'controller' => $grupounidadController,
                    'action' => 'ver'
                        ],
                'ruta' => 'grupounidad',
                                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'grupounidad/veri' => [
                'GET' => [
                    'controller' => $grupounidadController,
                    'action' => 'veri'
                ],
                'ruta' => 'grupounidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_1
                ],
            'grupounidad/editari' => [
                'GET' => [
                    'controller' => $grupounidadController,
                    'action' => 'editari'
                ],
                'POST'=> [
                    'controller' => $grupounidadController,
                    'action' => 'saveEdit'
                ],
                'ruta' => 'grupounidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'grupounidad/addunidad' => [
                'POST' => [
                    'controller' => $grupounidadController,
                    'action' => 'addUnidad'
                        ],
                'ruta' => 'grupounidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
             ],
            'grupounidad/delunidad' => [
                'POST' => [
                    'controller' => $grupounidadController,
                    'action' => 'delUnidad'
                        ],
                'ruta' => 'grupounidad',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ],
            'grupounidad/borrar'  => [
                'POST' => [
                    'controller' => $grupounidadController,
                    'action' => 'borrar'
                        ],
                'ruta' => 'grupounidad',
                'login' => false,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
             ],
            'grupounidad/nuevo' => [
                'GET' => [
                    'controller' => $grupounidadController,
                    'action' => 'nuevo'
                        ],
                'ruta' => 'grupounidad',
                'ajax' => true,
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_3
                ], 
            
			'usuario/registrar' => [
				'GET' => [
					'controller' => $usuarioController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $usuarioController,
					'action' => 'registerUser'
				],
                'ruta' => 'usuario',
                'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_6
			    ],
			'usuario/success' => [
				'GET' => [
					'controller' => $usuarioController,
					'action' => 'success'
				],
                'ruta' => 'usuario'
			    ],
			'usuario/permisos' => [
				'GET' => [
					'controller' => $usuarioController,
					'action' => 'permissions'
				],
				'POST' => [
					'controller' => $usuarioController,
					'action' => 'savePermissions'
				],
                'ruta' => 'usuario',
				'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_6
			    ],
			'usuario/lista' => [
				'GET' => [
					'controller' => $usuarioController,
					'action' => 'list'
				],
                'ruta' => 'usuario',
				'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_6
			    ],
            'usuario/borar' => [
				'POST' => [
					'controller' => $usuarioController,
					'action' => 'deleteUser'
				],
                'ruta' => 'usuario',
				'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_6
			    ],
            'usuario/modificar' => [
				'GET' => [
					'controller' => $usuarioController,
					'action' => 'modform'
				],
                'ruta' => 'usuario',
				'login' => true,
				'permissions' => \Sismaed\Entity\Usuario::PERMISO_6
			    ],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			    ],
			'login/permissionserror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'permissionsError'
				]
			    ],
			'login/success' => [
				'GET' => [
					'controller' => $unidadController,
					'action' => 'ver'
				]
			    ],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
		    	],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				]
		    	],
            
			'' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'home'
				]
			    ]
		];

		return $routes;
	}

	public function getAuthentication(): \FrameWork\Authentication {
		return $this->authentication;
	}

	public function checkPermission($permission): bool {
		$user = $this->authentication->getUser();

		if ($user && $user->hasPermission($permission)) {
			return true;
		} else {
			return false;
		}
	}
    
    public function checkGroup($group): bool {
		$user = $this->authentication->getUser();

		if ($user && $user->hasGroup($group)) {
			return true;
		} else {
			return false;
		}
	}

}