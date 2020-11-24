<?php
namespace Sismaed\Controllers;


class Dummy {

    
	public function __construct( ) {

	}
    
    public function ver_CajaChica(){
        $title = 'Ver Caja Chica';
        return [
            'template' => 'cajaChica.html.php',
            'title' => $title,
            'variables' => [
                ]
        ];
    }
    
	public function veri_CajaChica() {
        
        $gastosB=[
['id'=>1,'nombre'=>'gasto 01','desc'=>'mes julio','monto'=>'5000','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>2,'nombre'=>'gasto 02','desc'=>'mes julio','monto'=>'5001','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>3,'nombre'=>'gasto 03','desc'=>'mes julio','monto'=>'5002','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>4,'nombre'=>'gasto 04','desc'=>'mes julio','monto'=>'5003','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>2,'factura'=>'85357257'],
['id'=>5,'nombre'=>'gasto 05','desc'=>'mes julio','monto'=>'5004','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>2,'factura'=>'85357257'],
['id'=>6,'nombre'=>'gasto 06','desc'=>'mes julio','monto'=>'5005','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>7,'nombre'=>'gasto 07','desc'=>'mes julio','monto'=>'5006','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>5,'factura'=>'85357257'],
['id'=>8,'nombre'=>'gasto 08','desc'=>'mes julio','monto'=>'5007','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>3,'factura'=>'85357257'],
['id'=>9,'nombre'=>'gasto 09','desc'=>'mes julio','monto'=>'5008','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>10,'nombre'=>'gasto 10','desc'=>'mes julio','monto'=>'5009','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>11,'nombre'=>'gasto 11','desc'=>'mes julio','monto'=>'5010','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257']
];
        
        $cajaChica = ['id'=>1,'nombre'=>'caja01','peog_id'=>1,'fecha_ini'=>"04/25/2019 15:00:23",'fecha_fin'=>"04/25/2019 15:00:23",'monto'=>5000,'desc'=>'Caja01bhjhbhj'];

        $gastos = [];
        
        foreach($gastosB as $gasto){
            if($gasto['cajachica_id']==$cajaChica['id'])
            { 
                $gastos[]=$gasto;
        }
        }
        

        
		$title = 'Ver CajaChica';

		return ['template' => 'cajaChica.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'cajaChica' => $cajaChica ,
                        'gastos' =>  $gastos
					]
				];
	}
    
    public function editari_CajaChica() {
        
        $gastosB=[
['id'=>1,'nombre'=>'gasto 01','desc'=>'mes julio','monto'=>'5000','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>2,'nombre'=>'gasto 02','desc'=>'mes julio','monto'=>'5001','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>3,'nombre'=>'gasto 03','desc'=>'mes julio','monto'=>'5002','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>4,'nombre'=>'gasto 04','desc'=>'mes julio','monto'=>'5003','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>2,'factura'=>'85357257'],
['id'=>5,'nombre'=>'gasto 05','desc'=>'mes julio','monto'=>'5004','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>2,'factura'=>'85357257'],
['id'=>6,'nombre'=>'gasto 06','desc'=>'mes julio','monto'=>'5005','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>7,'nombre'=>'gasto 07','desc'=>'mes julio','monto'=>'5006','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>5,'factura'=>'85357257'],
['id'=>8,'nombre'=>'gasto 08','desc'=>'mes julio','monto'=>'5007','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>3,'factura'=>'85357257'],
['id'=>9,'nombre'=>'gasto 09','desc'=>'mes julio','monto'=>'5008','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>10,'nombre'=>'gasto 10','desc'=>'mes julio','monto'=>'5009','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257'],
['id'=>11,'nombre'=>'gasto 11','desc'=>'mes julio','monto'=>'5010','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','cajachica_id'=>1,'factura'=>'85357257']
];
        
        $cajaChica = ['id'=>1,'nombre'=>'caja01','peog_id'=>1,'fecha_ini'=>"04/25/2019 15:00:23",'fecha_fin'=>"04/25/2019 15:00:23",'monto'=>5000,'desc'=>'Caja01bhjhbhj'];

        $gastos = [];
        
        foreach($gastosB as $gasto){
            if($gasto['cajachica_id']==$cajaChica['id'])
            { 
                $gastos[]=$gasto;
        }
        }
        

        
		$title = 'Editar CajaChica';

		return ['template' => 'editCajaChica.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'cajaChica' => $cajaChica ,
                        'gastos' =>  $gastos
					]
				];
	}
    
    public function ver_inventario(){
        $title = 'Ver Inventario';
        return [
            'template' => 'inventario.html.php',
            'title' => $title,
            'variables' => [
                ]
        ];
    }
    
    public function veri_inventario() {
        
        $entradasVer=[
            ['id'=>1,'nombre'=>'florero 1','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>2,'nombre'=>'florero 2','desc'=>'mes julio','cant'=>'-3','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>3,'nombre'=>'florero 3','desc'=>'mes julio','cant'=>'-8','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>4,'nombre'=>'florero 4','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>2,'rejistro'=>'85357257'],
['id'=>5,'nombre'=>'florero 5','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>2,'rejistro'=>'85357257'],
['id'=>6,'nombre'=>'florero 6','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>7,'nombre'=>'florero 7','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>5,'rejistro'=>'85357257'],
['id'=>8,'nombre'=>'florero 8','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>3,'rejistro'=>'85357257'],
['id'=>9,'nombre'=>'florero 9','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>10,'nombre'=>'florero 10','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>11,'nombre'=>'florero 11','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257']

];
        
        $inventario = ['id'=>1,'nombre'=>'caja01','peog_id'=>1,'fecha_ini'=>"04/25/2019 15:00:23",'fecha_fin'=>"04/25/2019 15:00:23",'desc'=>'inventario01bhjhbhj'];

        $entradas = [];
        
        foreach($entradasVer as $entrada){
            if($entrada['inventario_id']==$inventario['id'])
            { 
                $entradas[]=$entrada;
        }
        }
        

        
		$title = 'Ver Inventario';

		return ['template' => 'inventario.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'entradas' => $entradas ,
                        'inventario' =>  $inventario
					]
				];
	}
    
    public function editari_inventario() {
        
        $entradasVer=[
            ['id'=>1,'nombre'=>'florero 1','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>2,'nombre'=>'florero 2','desc'=>'mes julio','cant'=>'-3','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>3,'nombre'=>'florero 3','desc'=>'mes julio','cant'=>'-8','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>4,'nombre'=>'florero 4','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>2,'rejistro'=>'85357257'],
['id'=>5,'nombre'=>'florero 5','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>2,'rejistro'=>'85357257'],
['id'=>6,'nombre'=>'florero 6','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>7,'nombre'=>'florero 7','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>5,'rejistro'=>'85357257'],
['id'=>8,'nombre'=>'florero 8','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>3,'rejistro'=>'85357257'],
['id'=>9,'nombre'=>'florero 9','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>10,'nombre'=>'florero 10','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257'],
['id'=>11,'nombre'=>'florero 11','desc'=>'mes julio','cant'=>'1','fecha'=>'"04/25/2019 15:00:23"','doc_id'=>'34','peog_id'=>'12','inventario_id'=>1,'rejistro'=>'85357257']

];
        
        $inventario = ['id'=>1,'nombre'=>'caja01','peog_id'=>1,'fecha_ini'=>"04/25/2019 15:00:23",'fecha_fin'=>"04/25/2019 15:00:23",'desc'=>'inventario01bhjhbhj'];

        $entradas = [];
        
        foreach($entradasVer as $entrada){
            if($entrada['inventario_id']==$inventario['id'])
            { 
                $entradas[]=$entrada;
        }
        }
        

        
		$title = 'Editar Inventario';

		return ['template' => 'editInventario.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'entradas' => $entradas ,
                        'inventario' =>  $inventario
					]
				];
	}
	
	 public function ver_Calendario(){
        $title = 'Ver Calendario';
        return [
            'template' => 'calendario.html.php',
            'title' => $title,
            'variables' => [
                ]
        ];
    }
    
	public function veri_Calendario() {
        
        $eventoVer=[ ['id'=>1,'nombre'=>'nombre01','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa1','BB'=>bb1,'dd'=>'bb1'],
['id'=>2,'nombre'=>'nombre02','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa2','BB'=>'bb2','dd'=>'bb2'],
['id'=>3,'nombre'=>'nombre03','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa3','BB'=>'bb3','dd'=>'bb3'],
['id'=>4,'nombre'=>'nombre04','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'2','AA'=>'aa4','BB'=>'bb4','dd'=>'bb4'],
['id'=>5,'nombre'=>'nombre05','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'2','AA'=>'aa5','BB'=>'bb5','dd'=>'bb5'],
['id'=>6,'nombre'=>'nombre06','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa6','BB'=>'bb6','dd'=>'bb6'],
['id'=>7,'nombre'=>'nombre07','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'5','AA'=>'aa7','BB'=>'bb7','dd'=>'bb7'],
['id'=>8,'nombre'=>'nombre08','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'3','AA'=>'aa8','BB'=>'bb8','dd'=>'bb8'],
['id'=>9,'nombre'=>'nombre09','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa9','BB'=>'bb9','dd'=>'bb9'],
['id'=>10,'nombre'=>'nombre10','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa10','BB'=>'bb10','dd'=>'bb10'],
['id'=>11,'nombre'=>'nombre11','desc'=>'mes julio','fecha'=>'"04/25/2019 15:00:23"','calendario_id'=>'1','AA'=>'aa11','BB'=>'bb11','dd'=>'bb11']
];
						

        
        $calendario= ['id'=>11,'nombre'=>'nombre11','desc'=>'mes julio','ab'=>'ab11','id_dueño'=>'1','AA'=>'aa11','BB'=>'bb11','dd'=>'bb11'];
;

        $eventos = [];
        
        foreach($eventoVer as $evento){
            if($evento['calendario_id']==$calendario['id'])
            { 
                $eventos[]=$evento;
        }
        }
        

        
		$title = 'Ver Calendario';

		return ['template' => 'calendario.ajax.php', 
				'title' => $title, 
				'variables' => [
                        'calendario' => $calendario ,
                        'eventos' =>  $evento
					]
				];
	}
}
    
    
