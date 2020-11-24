 <style>
	 .icon-bar {
  width: 100px;
  background-color: #555;
		 
		
}

.icon-bar {
  display: block;
  text-align: center;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  height: 800px;
	float: left;
	 }	 
	 
	 
 .aa {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
 
  
}

.icon-bar .aa:hover {
  background-color: #000;
	}

.active_icon {
  background-color: #555;
}
	
.conten_ajax {
	overflow-y: scroll;
	height: 800px;
	padding-left: 20px;
	 }	
	 .imag {
		 float: left;
		 margin: 10px;
	 }
	 .video_mysql {
		 float: left;
		 margin: 10px;
	 }
	 .usuarios_peog {
		 margin: 10px;
		 clear: none;
	 }
	 .usuarios_conten {
	   float: left;

	 }
	 .th2{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 22px;
	 }
	  .th4{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 30px;
		
	 }
	  .th5{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width:250px;
		 font-size: 30px;
		
	 }
	 .archi:hover {
		 cursor: pointer;
		 color: brown;
	 }
</style> 

<div class="icon-bar">
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
  <a class="aa" href="#"><i class="fa fa-trash "></i></a> 
  <p id="id_editar" style="visibility: hidden;"></p>
</div>

<div class="conten_ajax">

<p><h2 class="th4">Nombre</h2> <?=$eventos['nombre']?></p>

<p><h2 class="th4">Descripcion</h2> <?=$eventos['desc']?></p>

<p><h2 class="th4">Id de eventos</h2> <?=$eventos['peog_id']?></p>

<p><h2 class="th4">Fecha</h2> <?=$eventos['fecha']?></p>

<p><h2 class="th4">Eventos</h2><br> 
<?php foreach($eventoVer as $index=>$evento) :?>
 <br><?=$evento['nombre'].' Fecha  :'.$evento['fecha'].' Desc :'.$evento['desc']?>
<?php endforeach ?>
</p>

</div>
	