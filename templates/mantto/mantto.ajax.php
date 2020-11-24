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
	
.conten_ajax{
		 overflow-y: scroll;
		 height: 800px;
			margin-left: 35px;
	padding-left: 20px;
	 }	
	 
	 
	 .imag {
		 float: left;
		 margin: 10px;}
		 
		  .video_mysql {
		 float: left;
		 margin: 10px;
	 }
	 
   .th2{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 22px;
	 }
     
     .listaedit01{
    width: 95%;
    border-bottom: thin solid gray;
    padding-bottom: 5px;

	 }
	 
	  #manttotipo{
		  width: 200px;
    margin: 10px; 
		 
	 }
	 
	.buttondelete{
    text-align: center;
    transition: all 0.3s ease;
    color: black;
    background-color: #FFFFFF;
    float: right;
    font-size: 30px;
    margin-bottom: 5px;
    vertical-align: top;
	 }	
	 
	  .buttondelete:hover{
		 
		 background-color:#ABABAB;
		 cursor:pointer;
		 
	 }
	  
</style> 

<div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
      <form action="/mantto/borrar" method="post">
    
        <input  type="submit" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$mantto->id ?? ''?>" >
          
    </form>
    <p id="id_item" style="visibility: hidden;"><?=$mantto->id;?></p>
</div>

<div class="conten_ajax">
<h2 class="th2">Nombre Mantenimiento</h2>
<?php /*?><p> ID de Unidad : <?=$unidad->id;?></p>
<p> ID de Padre : <?=$unidad->getPadre()->id ?? "Torre";?></p><?php */?>

<p> <?=$mantto->nombre;?>_<?=$mantto->id;?> </p>
	
	
<h2 class="th2">Descripción</h2>

<p> <?=$mantto->desc;?></p>
	
<h2 class="th2">Fecha</h2>

<p> <?=$mantto->fecha;?></p>
	
<h2 class="th2">Tipo</h2>

<p> <?=$mantto->tipo;?></p>
	
<h2 class="th2">Asignado a</h2>

<?php foreach($mantto->getUnidad() as $index=>$obj): ?>
<p> <strong>Unidad <?=$index+1;?>:</strong> <a href="/unidad/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?></a></p>
<?php endforeach; ?>
	
	
<h2 class="th2">PEOGs</h2>
    
<?php if(count($mantto->getPeog("solicitante"))>0):?>
        <strong >Solicitante(s):</strong> <br>
    <?php endif;?>    
    
    

<?php foreach($mantto->getPeog("solicitante") as $index=>$obj): ?>
<p class="listaedit01"> <strong><?=$index+1;?>:</strong> <a href="/peog/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a></p>
<?php endforeach; ?>


<?php if(count($mantto->getPeog("aprobador"))>0):?>
        <strong >Aprobador(s):</strong> <br>
<?php endif;?>      
    


<?php foreach($mantto->getPeog("aprobador") as $index=>$obj): ?>
<p class="listaedit01"> <strong><?=$index+1;?>:</strong> <a href="/peog/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a></p>
<?php endforeach; ?>
	

<?php if(count($mantto->getPeog("ejecutante"))>0):?>
        <strong >Ejecutante(s):</strong> <br>
<?php endif;?>    

<?php foreach($mantto->getPeog("ejecutante") as $index=>$obj): ?>
<p class="listaedit01"> <strong><?=$index+1;?>:</strong> <a href="/peog/ver?id=<?=$obj->id ?? 1;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a></p>
<?php endforeach; ?>
    <br>
    
<h2 class="th2">Documento(s) </h2>
    
    <?php if(count($mantto->getDoc("escrito"))>0):?>
        <h2 class="th2">Escrito(s)</h2>
    <?php endif;?>
<?php foreach($mantto->getDoc("escrito") as $index=>$obj): ?>
<p> <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>">Documento <?=$index+1;?>: <?=$obj->nombre;?></a><br><?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>	

 <br>   

<?php if(count($mantto->getDoc("imag"))>0):?>
        <h2 class="th2">Escrito(s)</h2>
    <?php endif;?>
<?php foreach($mantto->getDoc("imag") as $index=>$obj): ?>
<p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;"></img>
  <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
</p>
<?php endforeach; ?>

<div class="clear">
</div>


 <br>

<?php if(count($mantto->getDoc("video"))>0):?>
        <h2 class="th2">Escrito(s)</h2>
    <?php endif;?>
		<?php foreach($mantto->getDoc("video") as $index=>$obj): ?>
		<p style="width: 300px; float: left; margin: 10px;"> <video class="video_mysql" src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" style="width: 300px;" controls></video>
            <?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?>
        </p>
		<?php endforeach; ?>
<div class="clear">
</div>

 <br>

<?php if(count($mantto->getDoc("audio"))>0):?>
        <h2 class="th2">Escrito(s)</h2>
    <?php endif;?>
<?php foreach($mantto->getDoc("audio") as $index=>$obj): ?>
<p> <audio src="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>" controls></audio><?=$obj->nombre?><?=' Fecha: '.$obj->fecha.'. Desc: '.$obj->desc?></p>
<?php endforeach; ?>

<div class="clear">
</div>

 <br><br>    
    
    
    
    
    
    
<h2 class="th2"><strong>Calendario(s)</strong> </h2>
<?php foreach($mantto->getCalendario() as $index=>$obj): ?>
<h2 class="th2">Calendario: <?=$obj->nombre?>
<label onClick=editCalend(<?=$obj->id?>,<?=$mantto->id?>) class="fa fa-pencil buttondelete" style="float: right"></label>
</h2>
<p> <strong>Descripción: </strong><?=$obj->desc;?></p>
    <p ><strong>Eventos(s):</strong> </p>
    <?php foreach($obj->getEvento() as $index2=>$obj2): ?>
    <p class="listaedit01"><strong><?=($index2+1).': '?></strong>
        <?=$obj2->nombre."(".$obj2->fecha.")"?>. 
        <strong>Responsable: </strong> <?=$peogs->findById($obj2->peog_id)->nombre?>.
        . <strong>Estado: </strong> 
        
        <?=$obj2->estado?>
        
<label onClick=editEvent(<?=$obj2->id?>,<?=$mantto->id?>) class="fa fa-pencil buttondelete" style="float: right"></label>
            

</p>
    <?php endforeach; ?> 
<?php endforeach; ?>  
    
    <br>
    

<h2 class="th2">Evento(s) de Calendario(s):</h2>
<?php foreach($mantto->getCalendario() as $index=>$obj): ?>
<h2 class="th2">Calendario <?=$index+1?>: <?=$obj->nombre?></h2>
    <?php foreach($obj->getEvento() as $index2=>$obj2): ?>
    <div class="listaedit01">
    <h3 ><strong>Evento <?=$index2+1?>: <?=$obj2->nombre?> (<?=$obj2->fecha?>)</strong></h3>
        <p> <strong>Descripción:</strong> <?=$obj2->desc?></p>
        <p> <strong>Reporte:</strong> </p>
        <textarea name="text"  readonly cols="140" rows="10"><?=$obj2->reporte?></textarea>
        
        <?php if(count($obj2->getDoc("escrito"))>0):?>
        <h3>Documentos(es)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("escrito") as $index3=>$obj3): ?>
<p> <a href="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>">Documento <?=$index+1;?>: <?=$obj3->nombre;?></a><br><?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?></p>
        <?php endforeach; ?>
<div class="clear">
</div>

        <?php if(count($obj2->getDoc("imag"))>0):?>
        <h3>Imagen(es)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("imag") as $index3=>$obj3): ?>
<p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;"></img>
  <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
</p>
        <?php endforeach; ?>

<div class="clear">
</div>


        <?php if(count($obj2->getDoc("video"))>0):?>
        <h3 >Video(s)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("video") as $index3=>$obj3): ?>
<p style="width: 300px; float: left; margin: 10px;"> <video class="video_mysql" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;" controls></video>
            <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
        </p>
        <?php endforeach; ?>

<div class="clear">
</div>
        <?php if(count($obj2->getDoc("audio"))>0):?>
        <h3 >Audio(s)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("audio") as $index3=>$obj3): ?>
<p> <audio src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" controls></audio><?=$obj3->nombre?><?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?></p>
        <?php endforeach; ?>
    </div>
<br>
    <?php endforeach; ?> 
<br>
<?php endforeach; ?>   

	</div>

	</body>




