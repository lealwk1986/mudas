

<style>
	 .icon-bar {
  width: 70%;
  background-color: #555;
		 
		
}

.icon-bar {
  background-color: #555;
  display: block;
  text-align: center;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  height: 60px;
	float: top;
	 }	 
	 
	 
 .aa {
  display: block;
  text-align: center;
  padding: 2px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  float: left;
 
  
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
	 
	 
	 
</style> 

<?php if (empty($unidad->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div><div class="clear"></div>

<div class="conten_ajax">
<form action="/unidad/editari" method="post">
    <?php if(isset($id_dep)):?>
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="unidad[id]" value="<?=$unidad->id ?? ''?>" >
    <input type="hidden" name="unidad[id_dep]" value="<?=$unidad->id_dep ?? $id_dep?>">
    <label for="unidadname"><h3 class="th4"><i class="fa fa-building" aria-hidden="true"></i> Unidad: <?=$unidad->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
    <label>Nombre: </label>
	<input type="text" id="unidadname" name="unidad[nombre]" value="<?=$unidad->nombre ?? ''?>" required>
	<br>
    <label>Descripción: </label>
	<input type="text" id="unidaddesc" name="unidad[desc]" value="<?=$unidad->desc ?? ''?>" required>
 
	 
</form> 
	<?php if(!isset($id_dep)):?>
    
   <p><h3 class="th4">Usuario(s):</h3> </p>  

     <?php foreach ($unidad->getPeog("responsable") as $index=>$obj): ?>
         <form  action="/unidad/delpeog" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->apellido, ENT_QUOTES, 'UTF-8')?> (responsable)
                <input type="hidden" name="unidad_peog[unidad_id]" value="<?=$unidad->id?>">
                <input type="hidden" name="unidad_peog[peog_id]" value="<?=$obj->id?>">
                 <input type="hidden" name="unidad_peog[tipo_peog]" value="responsable">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

<?php foreach ($unidad->getPeog("usuario") as $index=>$obj): ?>
         <form  action="/unidad/delpeog" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->apellido, ENT_QUOTES, 'UTF-8')?> (usuario)
                <input type="hidden" name="unidad_peog[unidad_id]" value="<?=$unidad->id?>">
                <input type="hidden" name="unidad_peog[peog_id]" value="<?=$obj->id?>">
                <input type="hidden" name="unidad_peog[tipo_peog]" value="usuario">
			 <input  type="submit" id="u_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="u_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

<?php endforeach; ?>


    <form action="/unidad/addpeog"  method="post" id="agreUsuario">
		<p><h3 class="th4">Agregar PEOG como 
        <input  type="submit" id="p_submit01" name="submit01" value="Agregar" class="ocultaBoton"/>
		<label for="p_submit01" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>
            <input type="hidden" name="unidad_peog[unidad_id]" value="<?=$unidad->id?>">
		  <label> Asignar como </label>
		  <select name="unidad_peog[tipo_peog]" id="category_id" required >
			  <?php foreach ($peog_categ as $category): ?>    
				<option value="<?=$category['texto']?>"><?=$category['texto']?></option>
			  <?php endforeach; ?>      
		  </select>
		  <label for="peog_id">a </label>
		  <select name="unidad_peog[peog_id]" id="peog_id" required >
			  <?php foreach ($tablaPeogs as $peogt): ?>    
				<option value="<?=$peogt->id?>"><?=$peogt->nombre.' '.$peogt->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		</p>
    </form>
    
<br>








   <p><h3 class="th4">Grupo(s):</h3> </p>  

     <?php foreach ($unidad->getGrupo() as $index=>$obj): ?>
         <form  action="/unidad/delgrupo" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
                <input type="hidden" name="unidad_grupounidad[unidad_id]" value="<?=$unidad->id?>">
                <input type="hidden" name="unidad_grupounidad[grupounidad_id]" value="<?=$obj->id?>">
			    <input  type="submit" id="r2_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r2_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
        </p>
        </form>

     <?php endforeach; ?>

    <form action="/unidad/addgrupo"  method="post" id="agreUsuario">
		<p><h3 class="th4">Agregar grupo
        <input  type="submit" id="p2_submit01" name="submit01" value="Agregar" class="ocultaBoton"/>
		<label for="p2_submit01" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>
            <input type="hidden" name="unidad_grupounidad[unidad_id]" value="<?=$unidad->id?>">
		  <label> Asignar como </label>
		  <select name="unidad_grupounidad[grupounidad_id]" id="category_id" required >
			  <?php foreach ($grupounidad->findAll() as $category): ?>    
				<option value="<?=$category->id?>"><?=$category->nombre?></option>
			  <?php endforeach; ?>      
		  </select>
		</p>
    </form>















<p><h2 class="th4">Documento (s):</h2> </p>  
   <p><h3>Documento(s) Escritos(s):</h3> </p> 

	<?php 
		$tiposDoc= ["escrito", "imag","video","audio"];
		?>
	<?php foreach ($tiposDoc as $tipo): ?>
     <?php foreach ($unidad->getDoc($tipo) as $index=>$obj): ?>
         <form action="/unidad/deldoc" method="post">
         <p class="listaedit01">
			<?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->desc, ENT_QUOTES, 'UTF-8')?>
			 (<?=$tipo?>)
            <input type="hidden" name="doc_id" value="<?=$obj->id?>">  
             <input type="hidden" name="unidad_id" value="<?=$unidad->id?>"> 
			 <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label>  </p>  
      
        </form>
     <?php endforeach; ?>
	<?php endforeach; ?>
  
	<form action="/unidad/adddoc" method="post" enctype="multipart/form-data" >
	<h3 class="th4">Agregar Documento(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
      Seleccione documento(s) a cargar:
      <input type="hidden" name="unidad_doc[id_entidad]" value="<?=$unidad->id?>">
      <input type="hidden" name="unidad_doc[tipo_entidad]" value="unidad">

      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		. Seleccione el tipo: 
      <select name="unidad_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>		
		
      <br>Descripción: <input type="text" id="unidaddesc" name="unidad_doc[desc]">
     <!-- <input type="submit"  value="Subir Documento" name="submit">-->
		
    </form>

<?php else: ?>
<h3 class="th4">Padre</h3 ><a href="/unidad/ver?id=<?=$padre->id_dep ?? 1;?>"> <?=$padre->nombre ?? "Torre";?></a>
    
<?php endif;?>
<?php else: ?>

<?php endif; ?>
</div>








