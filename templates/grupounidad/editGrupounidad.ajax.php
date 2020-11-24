 <style>
	 .icon-bar {
  width: 100px;
  background-color: #555;
		 
		
}

.icon-bar {
	width: 100px;
  background-color: #555;
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
	 .th4{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 30px;
		
	 }
	 
	 #unidadname{
		 
		 width: 300px;
		
	 }
	  #unidaddesc{
		 
		 width: 600px;
		
	 }

.conten_ajax {
	overflow-y: scroll;
	height: 800px;
	padding-left: 20px;
	 }	
	 
	  .ab {

  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color:#363636;
  font-size: 36px;
 

}
  .ocultaBoton {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}	
	 
	 .buttonedit {
		
  text-align: center;
  padding: 8px;
  transition: all 0.3s ease;
  color:white;
  font-size: 30px;
  float: right;
  vertical-align:top
		 
		 
	 }
	 
	 .buttonedit:hover{
		 
		 background-color:#ABABAB;
		 cursor:pointer;
		 
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
	 
.listaedit01{
    width: 95%;
    border-bottom: thin solid gray;
    padding-bottom: 5px;

	 }
	 
	  #manttotipo{
		  width: 200px;
    margin: 10px; 
		 
	 }
	 
	 
</style> 


<?php if (empty($grupounidad->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/grupounidad/editari" method="post">
    <?php if(isset($grupounidad)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="grupounidad[id]" value="<?=$grupounidad->id ?? ''?>">
    <label ><h3 class="th4">Grupo Unidad: <?=$grupounidad->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>

	 <label>Nombre: </label>
	<input type="text" id="unidaddesc" name="grupounidad[nombre]" value="<?=$grupounidad->nombre ?? ''?>">
 	<br>
	 <label>Descripción: </label>
	<input type="text" id="unidaddesc" name="grupounidad[desc]" value="<?=$grupounidad->desc ?? ''?>">
 	<br>
</form> 
	
 <?php if(isset($grupounidad)):?>   
    <p><h3 class="th4">Unida(des):</h3> </p>  

     <?php foreach ($grupounidad->getUnidad() as $index=>$obj): ?>
         <form  action="/grupounidad/delunidad" method="post">
         <p class="listaedit01">
            <?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?> (
            <?=htmlspecialchars($obj->getPadre()->nombre ?? 'Edificio', ENT_QUOTES, 'UTF-8')?> )
                <input type="hidden" name="grupounidad_id" value="<?=$grupounidad->id?>">
                <input type="hidden" name="unidad_id" value="<?=$obj->id?>">
			    <input  type="submit" id="uni_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="uni_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
        </p>
        </form>   
    <?php endforeach; ?>
  
    

<form action="/grupounidad/addunidad"  method="post" >
<p><h3 class="th4">Agregar UNIDAD 
    <input  type="submit" id="submit000" name="submit01" value="Agregar" class="ocultaBoton"/>
    <label for="submit000" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>    
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>  
    <input type="hidden" name="unidad_grupounidad[unidad_id]" id="unidad_id" value="" required>
    <input type="hidden" name="unidad_grupounidad[grupounidad_id]" value="<?=$grupounidad->id?>">
    <span >UNIDAD: </span><span id="selec_uni">SELECCIONAR</span>
</form> 

<br><br>


<?php endif; ?>	   	
		
<?php else: ?>

<?php endif; ?>

<script>
 

</script>





