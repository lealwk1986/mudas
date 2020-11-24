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

                       

<?php if((  $user->id == ($reporte->usuario_id ?? '')|| $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6)
                        )):?>

<?php if (empty($reporte->id)  || $user->id == $reporte->usuario_id || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/reporte/editari" method="post">
    <?php if(isset($reporte)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="reporte[id]" value="<?=$reporte->id ?? ''?>">
    <label for="unidadname"><h3 class="th4"> <i class="fa fa-book" aria-hidden="true"></i> Reporte: <?=$reporte->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
     
	<label>Nombre: </label>
	<input type="text"  name="reporte[nombre]" value="<?=$reporte->nombre ?? ''?>" style="width: 95%">
 	<br>
	<label>Descripción: </label>
	<input type="text"  name="reporte[desc]" value="<?=$reporte->desc ?? ''?>" style="width: 95%">
	<br>
    
    <label>Fecha: </label>
	<input type= "datetime-local"  name="reporte[fecha]" value="<?=date("Y-m-d\TH:i:s",strtotime($reporte->fecha ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>

    <label>Persona Responsable: </label>
		  <select name="reporte[peog_id]" required >
                <?php $peog = $peogTable->findById($reporte->peog_id) ?? '' ?>
                <option value="<?=$reporte->peog_id ?? ''?>"><?=($peog->nombre ?? '').' '.($peog->apellido ?? '')?></option>
			    <?php foreach ($peogTable->findAll() as $peog2): ?>    
				    <option value="<?=$peog2->id?>"><?=$peog2->nombre.' '.$peog2->apellido?></option>
			    <?php endforeach; ?>      
		  </select>
    
    <label>Plantilla Base: </label>
		  <select name="reporte[plantilla_id]" required >
                <?php $plantilla = $plantillaTable->findById($reporte->plantilla_id) ?? '' ?>
                <option value="<?=$reporte->plantilla_id ?? ''?>"><?=($plantilla->nombre ?? '')?></option>
			    <?php foreach ($plantillaTable->findAll() as $plantilla2): ?>    
				    <option value="<?=$plantilla2->id?>"><?=$plantilla2->nombre?></option>
			    <?php endforeach; ?>      
		  </select>    
    
    <input type="hidden" name="reporte[grupo]" value="<?=$grupo?>">
    
    <input type="hidden" name="reporte[usuario_id]" value="<?=$user->id?>">
</form> 
	
<?php if(isset($reporte)):?>       
   <p><h3 class="th4"><i class="fa fa-file-text-o" aria-hidden="true"></i> Datoreporte(s):</h3> </p>  

     <?php foreach ($reporte->getDatoreporte() as $index=>$datoreporte): ?>
         <form  action="/reporte/deldatoreporte" method="post">
         <p class="listaedit01"><strong><?=$index+1?> : </strong><?=$datoreporte->nombre?>
                <input type="hidden" name="datoreporte_id" value="<?=$datoreporte->id?>">
                <input type="hidden" name="reporte_id" value="<?=$reporte->id?>">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

 
<form action="/reporte/adddatoreporte" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Agregar DatoReportes(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
            <input type="hidden" name="datoreporte[id]" value="<?=''?>">
		</label></h3> 
		<label><strong>Nombre:</strong> </label>
	<input type="text" name="datoreporte[nombre]" style="width: 95%">
		<br>
    
    <label><strong>Contenido:</strong> </label> <br>
    <textarea name="datoreporte[valor2]" rows="8" cols="140"></textarea>
    <input type="hidden" name="datoreporte[valor1]" value="N/R"></textarea>
    <input type="hidden" name="datoreporte[reporte_id]" value="<?=$reporte->id?>"></textarea>
    
    <br>
<br>
      <strong>Seleccione documento(s) a cargar:</strong>
     <input type="hidden" name="datoreporte[reporte_id]" value="<?=$reporte->id?>">
      <input type="hidden" name="datoreporte_doc[tipo_entidad]" value="datoreporte">
      <input type="file" name="fileToUpload[]" id="fileToUpload" capture="camera" multiple>
    
    <?php 
		$tiposDoc= ["imag","video","audio"];
		?>
    
    . Seleccione el tipo: 
      <select name="datoreporte_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>	
            
      <br><br><strong>Descripción del Documento:</strong> <input type="text" name="datoreporte_doc[desc]" style="width: 95%">	

	<br>

</form>

   <p><h3 class="th4"><i class="" aria-hidden="true"></i> Evento(s):</h3> </p>  

     <?php foreach ($reporte->getEvento() as $index=>$evento): ?>
         <form  action="/reporte/delevento" method="post">
         <p class="listaedit01"><?=$index+1?> : <?=$evento->fecha?>
        
			 <?=$index?> : <?=$evento->nombre."(".$evento->fecha.")"?> 
                <input type="hidden" name="evento_id" value="<?=$evento->id?>">
                 <input type="hidden" name="reporte_id" value="<?=$reporte->id?>">
			    <input  type="submit" id="be_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="be_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>



      <form action="/reporte/addevento" method="post">
        <h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Agregar Evento. Desde <?=$date1?> hasta <?=$date2?>
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01ev"/>
		<label for="arc_submit01ev" class="fa fa-upload  buttonedit" ><div class="clear"></div>
            <input type="hidden" name="reporte_evento[reporte_id]" value="<?=$reporte->id?>">
		</label></h3> 
        <select name="reporte_evento[evento_id]"  value="" required >
          <?php foreach ($eventos as $category): ?>    
            <option value="<?=$category->id?>" ><?=$category->nombre.' '.$category->fecha?></option>
          <?php endforeach; ?>      
          </select>

    </form>	    
    <br>

<br>


<?php endif; ?>	    

<?php else: ?>

<?php endif; ?>
</div>

<?php else: ?>

<h2 class="th4">No tiene permiso para editar este reporte</h2>

<?php endif; ?>