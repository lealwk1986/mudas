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
	 .agre_archivo {
		 margin: 10px;
	 }
	 
	 
</style> 

<?php if (empty($registro->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::EDIT_USER_ACCESS)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/libroacta/saveregistro" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar registro(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
		<label><strong>Nombre:</strong> </label>
    <input type="hidden" name="registro[id]" value="<?=$registro->id?>">
    <input type="hidden" name="registro[libroacta_id]" value="<?=$registro->libroacta_id?>">
	<input type="text" name="registro[nombre]" style="width: 95%" value="<?=$registro->nombre?>">
		<br>
    <label><strong>Descripción:</strong> </label>
	<input type="text" name="registro[desc]" style="width: 95%" value="<?=$registro->desc?>">
    <br>
    <label><strong>Contenido:</strong> </label>
	<textarea name="registro[contenido]" style="width: 95%; height: 200px"  rows="16" cols="140"><?=$registro->contenido?></textarea>
    
		<br><br>
    <label><strong>Fecha:</strong> </label>
	<input type= "datetime-local" name="registro[fecha]" value="<?=date("Y-m-d\TH:i:s",strtotime($registro->fecha ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    
		<label> <strong>Responsable del registro:</strong> </label>
		  <select name="registro[peog_id]" id="peog_id" required >
              <option value="<?=$registro->peog_id?>"><?=$peogTable->findById($registro->peog_id)->nombre.' '.$peogTable->findById($registro->peog_id)->apellido?></option>
			  <?php foreach ($peogTable->findAll() as $peog): ?>    
				<option value="<?=$peog->id?>"><?=$peog->nombre.' '.$peog->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		 <br>
    </form>
    <p><h2 class="th4">Documento (s):</h2> </p>  
   <p><h3>Documento(s) Escritos(s):</h3> </p> 

	<?php 
		$tiposDoc= ["escrito", "imag","video","audio", "foto"];
		?>
	<?php foreach ($tiposDoc as $tipo): ?>
     <?php foreach ($registro->getDoc($tipo) as $index=>$obj): ?>
         <form action="/libroacta/delregistrodoc" method="post">
         <p class="listaedit01">
			<?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->desc, ENT_QUOTES, 'UTF-8')?>
			 (<?=$tipo?>)
             <input type="hidden" name="doc_id" value="<?=$obj->id?>">  
             <input type="hidden" name="registro_id" value="<?=$registro->id?>"> 
             <input type="hidden" name="libroacta_id" value="<?=$libroacta->id ?? ''?>">
			 <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label>  </p>  
      
        </form>
     <?php endforeach; ?>
	<?php endforeach; ?>
    
    
    <br>
    
    
    
 <form action="/libroacta/addregistrodoc" method="post"  enctype="multipart/form-data">
     <h3 class="th4"> <i class="fa fa-folder-o" aria-hidden="true"></i> Agregar Documento(s)
		<input  type="submit"  name="submit" value="submit" class="ocultaBoton" id="arc2_submit01"/>
		<label for="arc2_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
     
     
      <strong>Seleccione documento(s) a cargar:</strong>
      <input type="hidden" name="libroacta_id" value="<?=$registro->libroacta_id?>">
      <input type="hidden" name="registro_doc[id_entidad]" value="<?=$registro->id?>">
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
</div>









