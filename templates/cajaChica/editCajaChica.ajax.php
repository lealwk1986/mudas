
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

<?php if (empty($cajachica->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::EDIT_USER_ACCESS)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/cajachica/editari" method="post">
    <?php if(isset($cajachica)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="cajachica[id]" value="<?=$cajachica->id ?? ''?>">
    <label for="unidadname"><h3 class="th4"> <i class="fa fa-archive" aria-hidden="true"></i> Caja chica: <?=$cajachica->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
     
	<label>Nombre: </label>
	<input type="text"  name="cajachica[nombre]" value="<?=$cajachica->nombre ?? ''?>">
 	<br>
	<label>Descripción: </label>
	<input type="text"  name="cajachica[desc]" value="<?=$cajachica->desc ?? ''?>">
	<br>
    <label>Monto Inicial: </label>
	<input type="text"  name="cajachica[monto]" value="<?=$cajachica->monto ?? ''?>">
	<br>
    
    <label>Fecha Inicial: </label>
	<input type= "datetime-local"  name="cajachica[fecha_ini]" value="<?=date("Y-m-d\TH:i:s",strtotime($cajachica->fecha_ini ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Fecha Final: </label>
	<input type= "datetime-local"  name="cajachica[fecha_fin]" value="<?=date("Y-m-d\TH:i:s",strtotime($cajachica->fecha_fin ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Persona Responsable: </label>
		  <select name="cajachica[peog_id]" required >
                <?php $peog = $peogTable->findById($cajachica->peog_id) ?? '' ?>
                <option value="<?=$cajachica->peog_id ?? ''?>"><?=($peog->nombre ?? '').' '.($peog->apellido ?? '')?></option>
			    <?php foreach ($peogTable->findAll() as $peog2): ?>    
				    <option value="<?=$peog2->id?>"><?=$peog2->nombre.' '.$peog2->apellido?></option>
			    <?php endforeach; ?>      
		  </select>
</form> 
	
<?php if(isset($cajachica)):?>       
   <p><h3 class="th4"><i class="fa fa-money" aria-hidden="true"></i> Gasto(s):</h3> </p>  

     <?php foreach ($cajachica->getGasto() as $index=>$gasto): ?>
         <form  action="/cajachica/delgasto" method="post">
         <p class="listaedit01"><strong><?=$index+1?> : </strong><?=$gasto->nombre?>
        
			    <strong>Monto: </strong><?=$gasto->monto?> 
                <input type="hidden" name="gasto_id" value="<?=$gasto->id?>">
                <input type="hidden" name="cajachica_id" value="<?=$cajachica->id?>">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

 
<form action="/cajachica/addgasto" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-money" aria-hidden="true"></i> Agregar gasto(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
		<label>Nombre: </label>
	<input type="text" name="gasto[nombre]" >
		<br>
    <label>Descripción: </label>
	<input type="text" name="gasto[desc]" >
		<br>
    <label>Fecha: </label>
	<input type= "datetime-local" name="gasto[fecha]" value="<?=date("Y-m-d\TH:i:s")?>">
	 <br>
		<label>Monto: </label>
	<input type="text" id="unidaddesc" name="gasto[monto]" >
		<br>
		<label> Responsable del gasto: </label>
		  <select name="gasto[peog_id]" id="peog_id" required >
			  <?php foreach ($peogTable->findAll() as $peog): ?>    
				<option value="<?=$peog->id?>"><?=$peog->nombre.' '.$peog->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		 <br>
      Seleccione factura(s) a cargar:
     <input type="hidden" name="gasto[cajachica_id]" value="<?=$cajachica->id?>">
      <input type="hidden" name="gasto_doc[tipo_entidad]" value="gasto">
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
    
    <?php 
		$tiposDoc= ["escrito", "imag"];
		?>
    
    . Seleccione el tipo: 
      <select name="gasto_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>	
            
      <br>Descripción: <input type="text" name="gasto_doc[desc]">	

	<br>

</form>
<?php endif; ?>	    

<?php else: ?>

<?php endif; ?>
</div>

