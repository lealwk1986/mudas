 <style>
	 .icon-bar {
  width: 70%;
  background-color: #555;
		 
		
}
	
.icon-bar {
  display: block;
  text-align: center;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  height: 60px;
	float: top;
	 }	 
	 
	 
 .aa {
  display: block;
  text-align: center;
  padding: 2px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  float: left;
  width: 33%;
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
     
    .ocultaBoton {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}	
      .aa {
  display: block;
  text-align: center;
  padding: 2px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
 
  
}

.icon-bar .aa:hover {
  background-color: #000;
    cursor:pointer;
	}

</style> 

<div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a>
    
    <form action="/unidad/borrar" method="post">
    
        <input  type="submit" onclick="return confirm('ALERTA: Estás Seguro de Borrar la Unidad <?=strtoupper($unidad->nombre)?>, todos sus Hijos e Información asociada?. Ésta acción NO se puede deshacer.')" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$unidad->id ?? ''?>" >
    </form>
    
    
  <p id="id_item" style="visibility: hidden;"><?=$unidad->id;?></p>
  <p id_dep="id_dep" style="visibility: hidden;"><?=$unidad->id_dep;?></p>
</div><div class="clear"></div>

<div class="conten_ajax">
<h2 class="th2"> Nombre</h2>
<?php /*?><p> ID de Unidad : <?=$unidad->id;?></p>
<p> ID de Padre : <?=$unidad->getPadre()->id ?? "Torre";?></p><?php */?>

<p> <?=$unidad->nombre;?></p>

<h2 class="th2">Descripcion</h2>
<p> <?=$unidad->desc ?? "Torre";?></p>
<h2 class="th2">Dependencia</h2>
 <h3><strong>Padre</strong></h3><a href="/unidad/ver?id=<?=$unidad->id_dep ?? 1;?>"> <?=$unidad->getPadre()->nombre ?? "Torre";?></a>
 	<h3><strong>Hijo(s)</strong></h3>
    <?php foreach($unidad->getHijos() as $index=>$hijo): ?>
	<p> Hijo <?=$index+1;?>: <a href="/unidad/ver?id=<?=$hijo->id ?? 1;?>"><?=$hijo->nombre;?></a></p>
	<?php endforeach; ?>
    
    <h3><strong>Grupo(s)</strong></h3>
    <?php foreach($unidad->getGrupo() as $index=>$hijo): ?>
	<p> <strong>Grupo<?=$index+1;?>: </strong>  <a href="/grupounidad/ver?id=<?=$hijo->id ?? 1;?>"><?=$hijo->nombre;?></a></p>
	<?php endforeach; ?>

<h2 class="th2">Responsable(s)</h2>
<?php foreach($unidad->getPeog("responsable") as $index=>$obj): ?>
<p> <strong>Persona <?=$index+1;?>:</strong> <a href="/peog/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a></p>
<img src="/doc?archivo=<?=$obj->getDoc('foto')[0]->nombre;?>&ruta=<?=$obj->getDoc('foto')[0]->getRuta();?>" style="width: 300px; margin: 10px;" alt="">
<?php endforeach; ?>

	<h2 class="th2">Usuario(s)</h2>
   
	<?php foreach($unidad->getPeog("usuario") as $index=>$obj): ?>
	<div class="usuarios_conten">
	<p> <strong>Persona <?=$index+1;?>:</strong> <a href="/peog/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a></p></p>
	<img class="usuarios_peog" src="/doc?archivo=<?=$obj->getDoc('foto')[0]->nombre;?>&ruta=<?=$obj->getDoc('foto')[0]->getRuta();?>" style="width: 300px;" alt="">
	</div>
	<?php endforeach; ?>
	
	 <div class="clear">
  </div>

<h2 class="th2">Documento(s) </h2>
<?php foreach($unidad->getDoc("escrito") as $index=>$obj): ?>
<p> <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>">Documento <?=$index+1;?>: <?=$obj->nombre;?></a><br><?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>

<h2 class="th2">Imagen(es)</h2>
	<?php foreach($unidad->getDoc("imag") as $index=>$obj): ?>
	<p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;"></img>
    <br>
    <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
    </p>
	<?php endforeach; ?>
  <div class="clear">
  </div>

<h2 class="th2">Video(s)</h2>
       
		<?php foreach($unidad->getDoc("video") as $index=>$obj): ?>
		<p style="width: 300px; float: left; margin: 10px;"> <video class="video_mysql" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;" controls></video>
		<br> <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
</p>
		<?php endforeach; ?>
<div class="clear">
</div>

<h2 class="th2">Audio(s)</h2>
<?php foreach($unidad->getDoc("audio") as $index=>$obj): ?>
<p> <audio src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" controls></audio><?=$obj->nombre.'. Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>

<h2 class="th2"> Mantenimientos Programados : </h2>
<?php foreach($unidad->getMantto("programado") as $index=>$obj): ?>
<p> <strong>Mantto <?=$index+1;?>:</strong><br> 
<a href="/mantto/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></a>
</p>
<?php endforeach; ?>

<h2 class="th2"> Mantenimientos No Programados : </h2>
<?php foreach($unidad->getMantto("no_programado") as $index=>$obj): ?>
<p> <strong>Mantto <?=$index+1;?>:</strong><br> 
<a href="/mantto/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></a>
</p>    
<?php endforeach; ?>
	
	
	</div>
