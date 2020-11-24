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

<?php if (empty($evento->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/mantto/editevent" method="post">
    <?php if(isset($evento)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?> 
	<input type="hidden" name="evento[id]" value="<?=$evento->id ?? ''?>">
    <input type="hidden" name="mantto_id"  value="<?=$mantto->id?>">
    <label ><h3 class="th4">Evento: <?=$evento->nombre ?? ''?>
		<input  type="submit" id="eve_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="eve_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>

    <label>Nombre</label> <br>
	<input type="text"  style="width: 95%" name="evento[nombre]" value="<?=$evento->nombre ?? ''?>">
	<br>
	 <label>Descripción </label> <br>
	<input type="text" style="width: 95%"  name="evento[desc]" value="<?=$evento->desc ?? ''?>">
	<br>
	 <label>Fecha: </label>
    <input type= datetime-local id="datetime-local" name="evento[fecha]" value="<?=date("Y-m-d\TH:i:s",strtotime($evento->fecha ?? date("Y-m-d H:i:s").'+3h'))?>">
	
    <?php 
		$tiposIdent= ["Creada", "Ejecutada","Diferida","Cancelada"];
		?>
    
    <label>Estado</label>
      <select name="evento[estado]"  value="<?=$evento->estado?>" required >
          <?php foreach ($tiposIdent as $category): ?>    
            <option value="<?=$category?>"  
                    <?php if($category==($evento->estado ?? null)):?> selected="selected"
                    <?php endif;?>
                     ><?=$category?></option>
          <?php endforeach; ?>      
      </select>
    

    <label>Reporteado por:</label>
      <select name="evento[peog_id]"  value="<?=$evento->peog_id ?? 4?>" required >
          <?php foreach ($tablaPeogs as $category): ?>    
            <option value="<?=$category->id?>"  
                    <?php if($category->id==($evento->peog_id ?? null)):?> selected="selected"
                    
                    <?php else:?>
                        <?php if($category->id==($user->peog_id ?? null)):?> selected="selected"
                        <?php endif;?>
                    <?php endif;?>
                     ><?=$category->nombre.' '.$category->apellido?></option>
          <?php endforeach; ?>      
      </select>	    
    <br><br>
    
     <label><strong>Reporte:</strong> </label>
	<textarea name="evento[reporte]" style="width: 95%; height: 200px"  rows="16" cols="140"><?=$evento->reporte?></textarea>

</form> 

  <?php if(isset($evento)):?>  
    
<p><h2 class="th4">Documento (s):</h2> </p>  
   <p><h3>Documento(s) Escritos(s):</h3> </p> 

	<?php 
		$tiposDoc= ["escrito", "imag","video","audio", "foto"];
		?>
	<?php foreach ($tiposDoc as $tipo): ?>
     <?php foreach ($evento->getDoc($tipo) as $index=>$obj): ?>
         <form action="/mantto/deleventdoc" method="post">
         <p class="listaedit01">
			<?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->desc, ENT_QUOTES, 'UTF-8')?>
			 (<?=$tipo?>)
             <input type="hidden" name="doc_id" value="<?=$obj->id?>">  
             <input type="hidden" name="evento_id" value="<?=$evento->id?>"> 
             <input type="hidden" name="mantto_id" value="<?=$mantto->id ?? ''?>">
			 <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label>  </p>  
      
        </form>
     <?php endforeach; ?>
	<?php endforeach; ?>
  
	<form action="/mantto/addeventdoc" method="post" enctype="multipart/form-data" >
	<h3 class="th4">Agregar Documento(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
      Seleccione documento(s) a cargar:
      <input type="hidden" name="evento_doc[id_entidad]" value="<?=$evento->id?>">
      <input type="hidden" name="evento_doc[tipo_entidad]" value="evento">
      <input type="hidden" name="evento_id" value="<?=$evento->id?>"> 
      <input type="hidden" name="mantto_id" value="<?=$mantto->id ?? ''?>">
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		. Seleccione el tipo: 
      <select name="evento_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>		
		
      <br>Descripción: <input type="text" id="unidaddesc" name="evento_doc[desc]">
     <!-- <input type="submit"  value="Subir Documento" name="submit">-->
		
    </form>    
    
    
  <?php endif;?>  
    
<?php ?>

<?php endif; ?>
</div>









