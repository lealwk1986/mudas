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


<style>



</style>


<?php if (empty($mantto->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/mantto/editari" method="post">
    <?php if(isset($mantto)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="mantto[id]" value="<?=$mantto->id ?? ''?>">
    <label ><h3 class="th4">Mantenimiento: <?=$mantto->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>

	 <label>Nombre: </label>
	<input type="text"  name="mantto[nombre]" value="<?=$mantto->nombre ?? ''?>">
 	<br>
	 <label>Descripción: </label>
	<input type="text"  name="mantto[desc]" value="<?=$mantto->desc ?? ''?>">
 	<br>
	 <label>Fecha: </label>
	<input type= datetime-local id="datetime-local" name="mantto[fecha]" value="<?=date("Y-m-d\TH:i:s",strtotime($mantto->fecha ?? date("Y-m-d H:i:s").'+3h'))?>">

    
 	<br>
	<label>Tipo: </label>
	<select name="mantto[tipo]" id="manttotipo" required >
			  <?php foreach ($mantto_categ as $category): ?>    
				<option value="<?=$category['texto']?>"
                        <?php if(isset($mantto)):?>
                                <?php if($mantto->tipo==$category['texto']):?>
                                    selected
                                <?php endif;?>
                        <?php endif;?>
                        ><?=$category['texto']?></option>
			  <?php endforeach; ?>      
		  </select>
 	<br>
	<label>Estado: </label>
	<select name="mantto[estado]" required >
			  <?php foreach ($mantto_estado as $category): ?>    
				<option value="<?=$category['texto']?>"><?=$category['texto']?></option>
			  <?php endforeach; ?>      
		  </select>
 	<br>
    
    <input type="hidden" name="mantto[grupo]" value="<?=$grupo?>">
</form> 
	
 <?php if(isset($mantto)):?>   
    <p>
    <form  action="/mantto/delallunidad" method="post">
    <h3 class="th4">
    Unida(des): 
    <input type="hidden" name="mantto_id" value="<?=$mantto->id?>">    
    <input  type="submit" id="submit101" name="submit01" value="Agregar" class="ocultaBoton"/>
    <label for="submit101" class="fa fa-trash-o  buttonedit" >
    <div class="clear"></label>
    </h3> 
    </form>
    
   </p>  

     <?php foreach ($mantto->getUnidad() as $index=>$obj): ?>
         <form  action="/mantto/delunidad" method="post">
         <p class="listaedit01">
            <?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?> (
            <?=htmlspecialchars($obj->getPadre()->nombre ?? 'Edificio', ENT_QUOTES, 'UTF-8')?> )
                <input type="hidden" name="unidad_mantto[mantto_id]" value="<?=$mantto->id?>">
                <input type="hidden" name="unidad_mantto[unidad_id]" value="<?=$obj->id?>">
			    <input  type="submit" id="uni_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="uni_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
        </p>
        </form>   
    <?php endforeach; ?>
  
    

<form action="/mantto/addunid"  method="post" >
<p><h3 class="th4">Agregar UNIDAD 
    <input  type="submit" id="submit000" name="submit01" value="Agregar" class="ocultaBoton"/>
    <label for="submit000" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>    
    <span style="font-size:30px;cursor:pointer" onclick="openNavM()">&#9776; </span>  
    <input type="hidden" name="unidad_mantto[unidad_id]" id="unidad_id" value="" required>
    <input type="hidden" name="unidad_mantto[mantto_id]" value="<?=$mantto->id?>">
    <input type="hidden" name="unidad_mantto[tipo_mantto]" value="<?=$mantto->tipo?>">
    <span >UNIDAD: </span><span id="selec_uni">SELECCIONAR</span>
</form> 

<br>


    <form action="/mantto/addgrupounidad"  method="post" id="agreUsuario">
		<p><h3 class="th4">Agregar Grupo de Unidades
        <input  type="submit" id="p2_submit01" name="submit01" value="Agregar" class="ocultaBoton"/>
		<label for="p2_submit01" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>
          <input type="hidden" name="mantto_id" value="<?=$mantto->id?>">
		  <label> Asignar como </label>
		  <select name="grupounidad_id"  required >
			  <?php foreach ($grupounidad->findAll() as $category): ?>    
				<option value="<?=$category->id?>"><?=$category->nombre?></option>
			  <?php endforeach; ?>      
		  </select>
		</p>
    </form>
    
 <br><br>   
    
    
    


   <p><h3 class="th4">PEOG(s):</h3> </p>  
 
     <?php foreach ($mantto->getPeog("aprobador") as $index=>$obj): ?>
         <form  action="/mantto/delpeog" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->apellido, ENT_QUOTES, 'UTF-8')?> (Aprobador)
                <input type="hidden" name="mantto_peog[mantto_id]" value="<?=$mantto->id?>">
                <input type="hidden" name="mantto_peog[peog_id]" value="<?=$obj->id?>">
                 <input type="hidden" name="mantto_peog[tipo_peog]" value="aprobador">
			    <input  type="submit" id="r1_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r1_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

         <?php foreach ($mantto->getPeog("solicitante") as $index=>$obj): ?>
         <form  action="/mantto/delpeog" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->apellido, ENT_QUOTES, 'UTF-8')?> (Solicitante)
                <input type="hidden" name="mantto_peog[mantto_id]" value="<?=$mantto->id?>">
                <input type="hidden" name="mantto_peog[peog_id]" value="<?=$obj->id?>">
             <input type="hidden" name="mantto_peog[tipo_peog]" value="solicitante">
			 <input  type="submit" id="u1_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="u1_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>
	 <?php endforeach; ?>
	<?php foreach ($mantto->getPeog("ejecutante") as $index=>$obj): ?>
         <form  action="/mantto/delpeog" method="post">
         <p class="listaedit01"><?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->apellido, ENT_QUOTES, 'UTF-8')?> (Ejecutante)
                <input type="hidden" name="mantto_peog[mantto_id]" value="<?=$mantto->id?>">
                <input type="hidden" name="mantto_peog[peog_id]" value="<?=$obj->id?>">
             <input type="hidden" name="mantto_peog[tipo_peog]" value="ejecutante">
			 <input  type="submit" id="e1_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="e1_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>

	<form action="/mantto/addpeog"  method="post" >
		<p><h3 class="th4">Agregar PEOG como <input  type="submit" id="man_submit01" name="submit01" value="Agregar"  class="ocultaBoton"/>
		<label for="man_submit01" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>
		  <input type="hidden" name="mantto_peog[mantto_id]" value="<?=$mantto->id?>">
		  <label> Asignar como </label>
		  <select name="mantto_peog[tipo_peog]" id="category_id" required >
			  <?php foreach ($peog_categ as $category): ?>    
				<option value="<?=$category['texto']?>"><?=$category['texto']?></option>
			  <?php endforeach; ?>      
		  </select>
		  <label for="peog_id">a </label>
		  <select name="mantto_peog[peog_id]" id="peog_id" required >
			  <?php foreach ($tablaPeogs as $peog): ?>    
				<option value="<?=$peog->id?>"><?=$peog->nombre.' '.$peog->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		</p>
    </form>
<br><br>

<form action="/mantto/savemanttor" method="post">
<label ><h3 class="th4">Mantenimiento <strong>RAPIDO</strong>
		<input  type="submit" id="un_submit01R" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01R" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
    <input type="hidden" name="mantto_calendario[mantto_id]" value="<?=$mantto->id?>">
    <input type="hidden" name="mantto[grupo]" value="<?=$grupo?>">
</form>


  <p><h3 class="th4">Calendario(s):</h3> </p>  
 
     <?php foreach ($mantto->getCalendario() as $index=>$obj2): ?>
         <form  action="/mantto/delcalend" method="post">
         <p class="listaedit01">
            <a href="#"><?=htmlspecialchars($obj2->nombre, ENT_QUOTES, 'UTF-8')?></a>
            <?=htmlspecialchars($obj2->desc, ENT_QUOTES, 'UTF-8')?> 
                <input type="hidden" name="mantto_calendario[mantto_id]" value="<?=$mantto->id?>">
                <input type="hidden" name="mantto_calendario[calendario_id]" value="<?=$obj2->id?>">
			    <input  type="submit" id="r3_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r3_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> 
			 
        </p>
        </form>

     <?php endforeach; ?>


	<form action="/mantto/addcalend"  method="post" >
		<p><h3 class="th4">Agregar CALENDARIO 
        <input  type="submit" id="submit03" name="submit01" value="Agregar"  class="ocultaBoton"/>
		<label for="submit03" class="fa fa-check-circle  buttonedit" ><div class="clear"></div></h3></label>
		  <input type="hidden" name="mantto_calendario[mantto_id]" value="<?=$mantto->id?>">
		  <label> Calendario: </label>
		  <select name="mantto_calendario[calendario_id]" required >
              <option value="0">Nuevo</option>
			  <?php foreach ($calendarios as $calendario): ?>    
				<option value="<?=$calendario->id?>"><?=$calendario->nombre?></option>
			  <?php endforeach; ?>      
		  </select>
		  <label for="peog_id"> </label>
		</p>
    </form>

<br><br>





<p><h2 class="th4">Documento (s):</h2> </p>  
   <p><h3>Documento(s) Escritos(s):</h3> </p> 

		<?php 
		$tiposDoc= ["escrito", "imag","video","audio"];
		?>
	<?php foreach ($tiposDoc as $index0=>$tipo): ?>
     <?php foreach ($mantto->getDoc($tipo) as $index=>$obj): ?>
         <form action="/mantto/deldoc" method="post">
         <p class="listaedit01">
			<?=htmlspecialchars($obj->nombre, ENT_QUOTES, 'UTF-8')?>
            <?=htmlspecialchars($obj->desc, ENT_QUOTES, 'UTF-8')?>
			 (<?=$tipo?>)
             <input type="hidden" name="doc_id" value="<?=$obj->id?>">  
             <input type="hidden" name="mantto_id" value="<?=$mantto->id?>"> 
			 <input  type="submit" id="rb_submit0<?=$index.$index0?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
		<label for="rb_submit0<?=$index.$index0?>" class="fa fa-trash-o buttondelete" ></label>  </p>  
      
        </form>
     <?php endforeach; ?>
	<?php endforeach; ?>
  
	<form action="/mantto/adddoc" method="post" enctype="multipart/form-data" >
	<h3 class="th4">Agregar Documento(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
      Seleccione documento(s) a cargar:
      <input type="hidden" name="mantto_doc[id_entidad]" value="<?=$mantto->id?>">
      <input type="hidden" name="mantto_doc[tipo_entidad]" value="mantto">

      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		. Seleccione el tipo: 
      <select name="mantto_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>		
		
      <br>Descripción: <input type="text" name="mantto_doc[desc]">
		
		
    </form>
<?php endif; ?>	   	
		
<?php else: ?>

<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="" method="post">
	<input type="hidden" name="mantto[id]" value="<?=$mantto->id ?? ''?>">
    <label ><h3 class="th4">Crear solicitud de Mantenimiento: 
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>

	 <label>Nombre: </label>
	<input type="text"  name="mantto[nombre]" >
 	<br>
	<label>Comentarios: </label>
	<input type="text" id="unidaddesc" name="mantto[desc]" >
 	<br>
	 <label>Fecha: </label>
	<input type= datetime-local id="datetime-local" name="mantto[fecha]" >
 	<br>

</form> 
	<form action="/doc/cargar" method="post" enctype="multipart/form-data" >
	<h3 class="th4">Documento asociado a la falla(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
      Seleccione documento(s) a cargar:
      <input type="hidden" name="entidad_id" value="<?=$mantto->id?>">
      <input type="hidden" name="tipo_entidad" value="unidad">
      <input type="hidden" name="tipo_doc" value="escrito"> 
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		
      <br>Descripción: <input type="text" >
     <!-- <input type="submit"  value="Subir Documento" name="submit">-->

    </form>
    

</div>

<?php endif; ?>

<script>
function Nav_03(arch,id_tag,fin){	
var xmlhttp2 = new XMLHttpRequest();
xmlhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
	  
	function Navegador(DEP,id){	

	var TT={0:0};
	DEP.forEach(
		function(value, index, array){
		TT[value[0]]= index+1;
		});
	MM0=[];
for(i = 0; i < DEP.length; i++){
	MM0[MM0.length]=[ TT[DEP[i][0]],TT[DEP[i][1]]];
}
	function imprimir(i, MM) {
		fl=MM[i];
		fl.forEach(
			function myFunction(value, index, array) {
  			txt_mp = txt_mp + '<li><span class="caret" id="item'+DEP[(value-1)][0] + '")>' + DEP[(value-1)][2] + "</span>"; 
			txt_mp = txt_mp + '<ul class="nested">';
			/*txt_mp = txt_mp + '<li><a href="#" onclick=ver("'+DEP[(value-1)][0] + '")>' + ' '+DEP[(value-1)][2] + ' </a></li>';*/
            txt_mp = txt_mp + '<li><form action="/mantto/addunidad">'; 
            txt_mp = txt_mp + '<input type="hidden" name="unidad_id" value="'+DEP[(value-1)][0] + '">';
            txt_mp = txt_mp + '<input type="hidden" name="mantto_id" value="'+<?=$mantto->id ?>+ '">';
            txt_mp = txt_mp + '<input type="submit" name="submit2" value="submit2" class="bottonTexto">';
             txt_mp = txt_mp + '</form></li>';    
				imprimir(value,MM)
			txt_mp = txt_mp + " </ul> </li>";	
			}
		);
	};	
	function Nav(MM){
		var PP=[[]];
		txt_mp="";
		MM.forEach(
			function f(value, index, array){
				PP.push([]);
			}
		);
		MM.forEach(
			function f(value, index, array){
				PP[value[1]].push(value[0]);
			}
		);
		 imprimir(0,PP);
			return txt_mp;
	};
	document.getElementById(id).innerHTML = Nav(MM0);
};	  
	Navegador(myObj,id_tag);
	  
	  if(fin == true){
	  var toggler2 = document.getElementsByClassName("caret");
	  var i;
	  for (i = 0; i < toggler2.length; i++) {
  		toggler2[i].addEventListener("click", function() {
    	this.parentElement.querySelector(".nested").classList.toggle("active");
    	this.classList.toggle("caret-down");
		});	
	  }
	  }

  }
};
xmlhttp2.open("GET", arch, true);
xmlhttp2.send();
};	 
    
Nav_03("/js/arbol.js.php","mySidenav_mant", true); 
 
    
</script>





