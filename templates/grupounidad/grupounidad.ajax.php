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
	 
	 
</style> 

<div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
      <form action="/grupounidad/borrar" method="post">
    
        <input  type="submit" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$grupounidad->id ?? ''?>" >
    </form>
    <p id="id_item" style="visibility: hidden;"><?=$grupounidad->id ?? ''?></p>
</div>

<div class="conten_ajax">
<h2 class="th2">Nombre Grupo Unidad</h2>
<p> <?=$grupounidad->nombre;?></p>
	
	
<h2 class="th2">Descripción</h2>
<p> <?=$grupounidad->desc;?></p>

	
<h2 class="th2">Asignado a</h2>

<?php foreach($grupounidad->getUnidad() as $index=>$obj): ?>
    <strong><?=$index+1?>: </strong><a href="/unidad/ver?id=<?=$obj->id?>"><?=$obj->nombre?></a><br>
<?php endforeach; ?>
	


</div>






