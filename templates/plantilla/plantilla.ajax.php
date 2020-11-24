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
     
     .listaedit01{
    width: 95%;
    border-bottom: thin solid gray;
    padding-bottom: 5px;

	 }
</style> 

<div class="icon-bar">
      <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
      <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
      <form action="/plantilla/borrar" method="post">
        <input  type="submit" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$plantilla->id ?? ''?>" >
    </form>
    <p id="id_item" style="visibility: hidden;"><?=$plantilla->id;?></p>
</div>

<div class="conten_ajax">
<p ><h2 class="th4">Nombre</h2> <?=$plantilla->nombre?></p>

<p ><h2 class="th4">Descripcion</h2> <?=$plantilla->desc?></p>


<div style="float: left; margin-left: 10px;">

<h2 class="th5"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</h2> <?=$plantilla->fecha?>

</div>


<div class="clear"></div>


<p ><h2 class="th4">Dato Plantilla</h2></p>

 <?php foreach($plantilla->getDatoplantilla() as $index=>$datoplantilla) :?>
        <p class="listaedit01">
            <strong><?=$index+1;?>:</strong>    
            <?=$datoplantilla->nombre?>. 
            <label onClick=editarR(<?=$datoplantilla->id?>,<?=$plantilla->id?>) class="fa fa-eye buttondelete" style="float: right"></label>
            <label onClick=editarR(<?=$datoplantilla->id?>,<?=$plantilla->id?>) class="fa fa-pencil buttondelete" style="float: right"></label> 

            
        </p>
<?php endforeach;?>



</div>
	