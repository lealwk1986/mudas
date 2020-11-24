
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

<?php if (empty($libroacta->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/libroacta/editari" method="post">
    <?php if(isset($libroacta)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="libroacta[id]" value="<?=$libroacta->id ?? ''?>">
    <label for="unidadname"><h3 class="th4"> <i class="fa fa-book" aria-hidden="true"></i> Libro acta: <?=$libroacta->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
     
	<label>Nombre: </label>
	<input type="text"  name="libroacta[nombre]" value="<?=$libroacta->nombre ?? ''?>" style="width: 95%">
 	<br>
	<label>Descripción: </label>
	<input type="text"  name="libroacta[desc]" value="<?=$libroacta->desc ?? ''?>" style="width: 95%">
	<br>
    
    <label>Fecha Inicial: </label>
	<input type= "datetime-local"  name="libroacta[fecha_ini]" value="<?=date("Y-m-d\TH:i:s",strtotime($libroacta->fecha_ini ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Fecha Final: </label>
	<input type= "datetime-local"  name="libroacta[fecha_fin]" value="<?=date("Y-m-d\TH:i:s",strtotime($libroacta->fecha_fin ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Persona Responsable: </label>
		  <select name="libroacta[peog_id]" required >
                <?php $peog = $peogTable->findById($libroacta->peog_id) ?? '' ?>
                <option value="<?=$libroacta->peog_id ?? ''?>"><?=($peog->nombre ?? '').' '.($peog->apellido ?? '')?></option>
			    <?php foreach ($peogTable->findAll() as $peog2): ?>    
				    <option value="<?=$peog2->id?>"><?=$peog2->nombre.' '.$peog2->apellido?></option>
			    <?php endforeach; ?>      
		  </select>
</form> 
	
<?php if(isset($libroacta)):?>       
   <p><h3 class="th4"><i class="fa fa-file-text-o" aria-hidden="true"></i> Registro(s):</h3> </p>  

     <?php foreach ($libroacta->getRegistro() as $index=>$registro): ?>
         <form  action="/libroacta/delregistro" method="post">
         <p class="listaedit01"><strong><?=$index+1?> : </strong><?=$registro->nombre?>
                <input type="hidden" name="registro_id" value="<?=$registro->id?>">
                <input type="hidden" name="libroacta_id" value="<?=$libroacta->id?>">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

 
<form action="/libroacta/addregistro" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Agregar registro(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
            <input type="hidden" name="registro[id]" value="<?=''?>">
		</label></h3> 
		<label><strong>Nombre:</strong> </label>
	<input type="text" name="registro[nombre]" style="width: 95%">
		<br>
    <label><strong>Descripción:</strong> </label>
	<input type="text" name="registro[desc]" style="width: 95%">
    <br>
    <label><strong>Contenido:</strong> </label> <br>
    <textarea name="registro[contenido]" rows="8" cols="140"></textarea>
    
		<br><br>
    <label><strong>Fecha:</strong> </label>
	<input type= "datetime-local" name="registro[fecha]" value="<?=date("Y-m-d\TH:i:s")?>">
	 <br>
    
		<label> <strong>Responsable del registro:</strong> </label>
		  <select name="registro[peog_id]" id="peog_id" required >
			  <?php foreach ($peogTable->findAll() as $peog): ?>    
				<option value="<?=$peog->id?>"><?=$peog->nombre.' '.$peog->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		 <br>
      <strong>Seleccione documento(s) a cargar:</strong>
     <input type="hidden" name="registro[libroacta_id]" value="<?=$libroacta->id?>">
      <input type="hidden" name="registro_doc[tipo_entidad]" value="registro">
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
    
    <?php 
		$tiposDoc= ["escrito", "imag","video","audio", "foto"];
		?>
    
    . Seleccione el tipo: 
      <select name="registro_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>	
            
      <br><br><strong>Descripción del Documento:</strong> <input type="text" name="registro_doc[desc]" style="width: 95%">	

	<br>

</form>
<?php endif; ?>	    

<?php else: ?>

<?php endif; ?>
</div>

