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
      <form action="/libroacta/borrar" method="post">
        <input  type="submit" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>
        <input type="hidden" name="id" value="<?=$libroacta->id ?? ''?>" >
    </form>
    <p id="id_item" style="visibility: hidden;"><?=$libroacta->id;?></p>
</div>

<div class="conten_ajax">
<p ><h2 class="th4">Nombre</h2> <?=$libroacta->nombre?></p>

<p ><h2 class="th4">Descripcion</h2> <?=$libroacta->desc?></p>


<div style="float: left; margin-left: 10px;">

<h2 class="th5"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha Inicial</h2> <?=$libroacta->fecha_ini?>

</div>

<div style="float: left; margin-left: 10px;">

<h2 class="th5"> <i class="fa fa-calendar" aria-hidden="true"></i> Fecha Final</h2> <?=$libroacta->fecha_fin?>

</div>

<div class="clear"></div>

<p ><h2 class="th4"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Responsable</h2></p>
<p>
<?php $obj=$libroacta->getPeog() ?>
<a href="/peog/ver?id=<?=$obj->id;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a>
     
</p>

<p ><h2 class="th4">Registro</h2></p>

 <?php foreach($libroacta->getRegistro() as $index=>$registro) :?>
        <p class="listaedit01">
            <strong><?=$index+1;?>:</strong>    
            <?=$registro->nombre?>. (<?=$registro->fecha?>) <strong> Desc: </strong><?=$registro->desc?>. <strong>Resp:</strong>
            <?php $obj=$registro->getPeog() ?>
            <a href="/peog/ver?id=<?=$obj->id;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a>
            <?php foreach($registro->getAllDoc() as $index2=>$obj): ?>
                <br><Strong>Documento<?=$index2+1?>:</Strong>  <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>"><?=$obj->nombre;?></a>. (<?=$obj->fecha?>) <strong>Desc: </strong> <?=$obj->desc?>
            <?php endforeach;?>	
            
            <label onClick=editarR(<?=$registro->id?>,<?=$libroacta->id?>) class="fa fa-pencil buttondelete" style="float: right"></label> 

            
        </p>
<?php endforeach;?>














</div>
	