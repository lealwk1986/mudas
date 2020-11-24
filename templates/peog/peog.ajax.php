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
	background-color: white;
	clear: none;
	border-color: #FFFFFF;
	padding-left: 10px;
	padding-right: 10px;
		 padding-top: 10px;
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
	
</style> 

<div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
    <form action="/peog/borrar" method="post">
    
        <input  type="submit" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$peog->id ?? ''?>" >
    </form>
    
    
  <p id="id_item" style="visibility: hidden;"><?=$peog->id;?></p>
  <p id_dep="id_dep" style="visibility: hidden;"><?=$peog->id_dep;?></p>
</div>

<div class="conten_ajax">

<?php if($peog->getDoc('foto')):?>    
    
<img class="usuarios_peog" src="/doc?archivo=<?=$peog->getDoc('foto')[0]->nombre;?>&ruta=<?=$peog->getDoc('foto')[0]->getRuta();?>" style="width: 300px; float: left;" alt="">

<?php endif;?>    
    
<div>
  <h2 class="th2"> Nombre</h2>
  <p> <?=$peog->nombre;?></p>
  
  <h2 class="th2">Apellido</h2>
  <p> <?=$peog->apellido;?></p>
    
    
    <h2 class="th2">Numero de documento</h2>
<p><?=$peog->tipo.': '.$peog->n_documento;?></p>
  
  <h2 class="th2">Email</h2>
    <a href="mailto:<?=$peog->email;?>"><?=$peog->email;?></a>

</div>
<div class="clear">
</div>
<h2 class="th2">Descripcion</h2>
<p> <?=$peog->desc;?></p>
    
<h2 class="th2">Telefono</h2>
 <a href="tel:<?=$peog->telefono1;?>"><?=$peog->telefono1;?></a>  
    
<h2 class="th2"> Contacto</h2>
  <p> <?=$peog->contacto;?></p>    
    
<h2 class="th2">Telefono2</h2>
  <a href="tel:<?=$peog->telefono2;?>"><?=$peog->telefono2;?></a> 
	

    
<h2 class="th2">Dirección</h2>
<p><?=$peog->direc;?></p>    
	
<h2 class="th2">Organización / Supervisor</h2>
<p> <?=$peog->getDep()->nombre.' '.$peog->getDep()->apellido;?></p>
    
    
<h2 class="th2">Organización / Supervisor</h2>
<p> <?=$peog->getDep2()->nombre.' '.$peog->getDep2()->apellido;?></p>   
	

	

 <h2 class="th2">Documento(s) </h2>
<?php foreach($peog->getDoc("escrito") as $index=>$obj): ?>
<p> <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>">Documento <?=$index+1;?>: <?=$obj->nombre;?></a><br><?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>

<h2 class="th2">Imagen(es)</h2>
	<?php foreach($peog->getDoc("imag") as $index=>$obj): ?>
	<p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;"></img>
    <br>
    <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
    </p>
	<?php endforeach; ?>
  <div class="clear">
  </div>

<h2 class="th2">Video(s)</h2>
       
		<?php foreach($peog->getDoc("video") as $index=>$obj): ?>
		<p style="width: 300px; float: left; margin: 10px;"> <video class="video_mysql" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;" controls></video>
		<br> <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
</p>
		<?php endforeach; ?>
<div class="clear">
</div>

<h2 class="th2">Audio(s)</h2>
<?php foreach($peog->getDoc("audio") as $index=>$obj): ?>
<p> <audio src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" controls></audio><?=$obj->nombre.'. Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>   
    
    
    
	
<?php /*?><h2 class="th2">Dependencia</h2>
 <h3>Padre</h3><a href="/unidad/ver?id=<?=$unidad->id_dep ?? 1;?>"> <?=$unidad->getPadre()->nombre ?? "Torre";?></a>
 	<h3>Hijo(s)</h3><?php foreach($unidad->getHijos() as $index=>$hijo): ?>
	<p> Hijo <?=$index+1;?>: <a href="/unidad/ver?id=<?=$hijo->id ?? 1;?>"><?=$hijo->nombre;?></a></p>
	<?php endforeach; ?>

<h2 class="th2">Responsable(s)</h2>
<?php foreach($unidad->getPeog("responsable") as $index=>$obj): ?>
<p> Persona <?=$index+1;?>: <?=$obj->nombre;?></p>
<img src="/doc?archivo=<?=$obj->getDoc('foto')[0]->nombre;?>&ruta=<?=$obj->getDoc('foto')[0]->getRuta();?>" style="width: 300px; margin: 10px;" alt="">
<?php endforeach; ?>

	<h2 class="th2">Usuario(s)</h2>
   
	<?php foreach($unidad->getPeog("usuario") as $index=>$obj): ?>
	<div class="usuarios_conten">
	<p> Persona <?=$index+1;?>: <?=$obj->nombre;?></p>
	<img class="usuarios_peog" src="/doc?archivo=<?=$obj->getDoc('foto')[0]->nombre;?>&ruta=<?=$obj->getDoc('foto')[0]->getRuta();?>" style="width: 300px;" alt="">
	</div>
	<?php endforeach; ?>
	
	 <div class="clear">
  </div>

<h2 class="th2">Documento(s) </h2>
<?php foreach($unidad->getDoc("escrito") as $index=>$obj): ?>
<p> <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>">Documento <?=$index+1;?>: <?=$obj->nombre;?></a></p>
<?php endforeach; ?>

<h2 class="th2">Imagen(es)</h2>
	<?php foreach($unidad->getDoc("imag") as $index=>$obj): ?>
	<p> <img class="imag" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;"></img></p>
	<?php endforeach; ?>
  <div class="clear">
  </div>

<h2 class="th2">Video(s)</h2>
      
		<?php foreach($unidad->getDoc("video") as $index=>$obj): ?>
		<p> <video class="video_mysql" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;" controls></video></p>
		<?php endforeach; ?>
<div class="clear">
</div>

<h2 class="th2">Audio(s)</h2>
<?php foreach($unidad->getDoc("audio") as $index=>$obj): ?>
<p> <audio src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" controls></audio><?=$obj->nombre?></p>
<endforeach; ?>

<h2 class="th2"> Mantenimientos Programados : </h2>
<?php foreach($manttoUnidad as $index=>$hijo): ?>
<p> Mantto <?=$index+1;?>: <?=$hijo->nombre;?></p>
<?php endforeach; ?>

<h2 class="th2"> Mantenimientos No Programados : </h2>
<?php foreach($manttoUnidadNP as $index=>$hijo): ?>
<p> Mantto <?=$index+1;?>: <?=$hijo->nombre;?></p>
<?php endforeach; ?>
	

	</body>
<?php */?>
</div>