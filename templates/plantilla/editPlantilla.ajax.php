
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
	 
	 #datetime-local{
    width: 200px;
    margin: 10px;
		 
		 
	 }
	 #peog_id{
		  width: 200px;
    margin: 10px; 
		 
	 }
	 
	 
	 
 </style> 

<?php if (empty($plantilla->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/plantilla/editari" method="post">
    <?php if(isset($plantilla)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="plantilla[id]" value="<?=$plantilla->id ?? ''?>">
    <label for="unidadname"><h3 class="th4"> <i class="fa fa-book" aria-hidden="true"></i> Plantilla: <?=$plantilla->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
     
	<label>Nombre: </label>
	<input type="text"  name="plantilla[nombre]" value="<?=$plantilla->nombre ?? ''?>" style="width: 95%">
 	<br>
	<label>Descripción: </label>
	<input type="text"  name="plantilla[desc]" value="<?=$plantilla->desc ?? ''?>" style="width: 95%">
	<br>
    
    <label>Fecha: </label>
	<input type= "datetime-local"  name="plantilla[fecha]" value="<?=date("Y-m-d\TH:i:s",strtotime($plantilla->fecha ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    
</form> 
	
<?php if(isset($plantilla)):?>       
   <p><h3 class="th4"><i class="fa fa-file-text-o" aria-hidden="true"></i> Dato Plantilla(s):</h3> </p>  

     <?php foreach ($plantilla->getDatoplantilla() as $index=>$datoplantilla): ?>
         <form  action="/plantilla/deldatoplantilla" method="post">
         <p class="listaedit01"><strong><?=$index+1?> : </strong><?=$datoplantilla->nombre?>
                <input type="hidden" name="datoplantilla_id" value="<?=$datoplantilla->id?>">
                <input type="hidden" name="plantilla_id" value="<?=$plantilla->id?>">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

 
<form action="/plantilla/adddatoplantilla" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Agregar datoplantilla(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
            <input type="hidden" name="datoplantilla[id]" value="<?=''?>">
            <input type="hidden" name="datoplantilla[plantilla_id]" value="<?=$plantilla->id?>">
		</label></h3> 
		<label><strong>Nombre:</strong> </label>
	<input type="text" name="datoplantilla[nombre]" style="width: 95%">
		<br>
    <label><strong>Descripción:</strong> </label>
	<input type="text" name="datoplantilla[desc]" style="width: 95%">
    <br>
    
		<br><br>

</form>
<?php endif; ?>	    

<?php else: ?>

<?php endif; ?>
</div>

