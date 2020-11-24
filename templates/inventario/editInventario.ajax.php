
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

<?php if (empty($inventario->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_2)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/inventario/editari" method="post">
    <?php if(isset($inventario)):?> 
    <input type="hidden" name="aplic" value="1" >
    <?php endif;?>
	<input type="hidden" name="inventario[id]" value="<?=$inventario->id ?? ''?>">
    <label for="unidadname"><h3 class="th4"> <i class="fa fa-archive" aria-hidden="true"></i> Inventario: <?=$inventario->nombre ?? ''?>
		<input  type="submit" id="un_submit01" name="submit01" value="Save" class="ocultaBoton"/>
		<label for="un_submit01" class="fa fa-floppy-o buttonedit" ></label> <div class="clear"></div>
	</h3></label>
	
     
	<label>Nombre: </label>
	<input type="text"  name="inventario[nombre]" value="<?=$inventario->nombre ?? ''?>" style="width: 95%;">
 	<br>
	<label>Descripción: </label>
	<input type="text"  name="inventario[desc]" value="<?=$inventario->desc ?? ''?>" style="width: 95%;">
	<br>

    <label>Fecha Inicial: </label>
	<input type= "datetime-local"  name="inventario[fecha_ini]" value="<?=date("Y-m-d\TH:i:s",strtotime($inventario->fecha_ini ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Fecha Final: </label>
	<input type= "datetime-local"  name="inventario[fecha_fin]" value="<?=date("Y-m-d\TH:i:s",strtotime($inventario->fecha_fin ?? date("Y-m-d\TH:i:s")))?>">
	 <br><br>
    <label>Persona Responsable: </label>
		  <select name="inventario[peog_id]" required >
                <?php $peog = $peogTable->findById($inventario->peog_id) ?? '' ?>
                <option value="<?=$inventario->peog_id ?? ''?>"><?=($peog->nombre ?? '').' '.($peog->apellido ?? '')?></option>
			    <?php foreach ($peogTable->findAll() as $peog2): ?>    
				    <option value="<?=$peog2->id?>"><?=$peog2->nombre.' '.$peog2->apellido?></option>
			    <?php endforeach; ?>      
		  </select>
</form> 
	
<?php if(isset($inventario)):?>       
   <p><h3 class="th4"><i class="fa fa-money" aria-hidden="true"></i> Entrada(s):</h3> </p>  

     <?php foreach ($inventario->getEntradam() as $index=>$entradam): ?>
         <form  action="/inventario/delentradam" method="post">
         <p class="listaedit01"><strong><?=$index+1?> : </strong><?=$entradam->nombre?>
        
			    <strong>Cantidad: </strong><?=$entradam->cantidad?> 
                 <strong>Desc: </strong><?=$entradam->desc?> 
                 <strong>Fecha: </strong><?=$entradam->fecha?> 
                 <?php $obj=$entradam->getPeog() ?>
                 <strong>Resp: </strong><a href="/peog/ver?id=<?=$obj->id;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a> 
                <input type="hidden" name="entradam_id" value="<?=$entradam->id?>">
                <input type="hidden" name="inventario_id" value="<?=$inventario->id?>">
			    <input  type="submit" id="r_submit0<?=$index?>" name="submit0<?=$index?>" value="Borrar" class="ocultaBoton"/>
				<label for="r_submit0<?=$index?>" class="fa fa-trash-o buttondelete" ></label> <br>
             <?php foreach($entradam->getAllDoc() as $index2=>$obj): ?>
                <br><Strong>Documento<?=$index2+1?>:</Strong>  <a href="/doc?archivo=<?=$obj->nombre;?>&ruta=<?=$obj->getRuta();?>"><?=$obj->nombre;?></a>. (<?=$obj->fecha?>) <strong>Desc: </strong> <?=$obj->desc?>
            <?php endforeach;?>	
 
        </p>
        </form>

     <?php endforeach; ?>

 
<form action="/inventario/addentradam" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-money" aria-hidden="true"></i> Agregar Entrada(s)
	  <input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3>
    <div class="listaedit01">
      <label><input type="radio" name="nomOpt" value="0" checked>
      <strong> Item Existente</strong></label>
      <br>
      <label> Items: </label>
      <select name="entradam[nombre]" id="peog_id" >
        <?php foreach ($inventario->getListaEntr() as $item): ?>    
        <option value="<?=$item[0]?>"><?=$item[0]?></option>
        <?php endforeach; ?>      
        </select>
      <br>
    </div>
<div class="listaedit01">
    <br>
    <label><input type="radio" name="nomOpt" value="1"> <strong>Item Nuevo</strong> </label><br><br>
        
  <label>Nombre: </label>
          <input type="text" name="nombre2" >
          <br>
          <label>Descripción del Item: </label>
          <input type="text" name="entradam[desc]" >
          <br>
          <label>Unidad: (m, Kg, unidad) </label>
          <input type="text" id="unidaddesc" name="entradam[unidad]" >
          <br>
    </div>
    <br>

		<label><strong>Cantidad: </strong>  </label> <br>Negativo (-) si es Retiro de material (Ejmp: -3)
	<input type="number" id="unidaddesc" name="entradam[cantidad]" style="width: 95%;" required> <br>
		<br>
    
    <label><strong>Observación de la Entrada:</strong> </label>
	<input type="text" name="entradam[observ]" style="width: 95%;">
		<br>
    <label>Fecha: </label>
	<input type= "datetime-local" name="entradam[fecha]" value="<?=date("Y-m-d\TH:i:s")?>">
	 <br> <br>
	<label> Responsable: </label>
		  <select name="entradam[peog_id]" id="peog_id" required >
			  <?php foreach ($peogTable->findAll() as $peog): ?>    
				<option value="<?=$peog->id?>"><?=$peog->nombre.' '.$peog->apellido?></option>
			  <?php endforeach; ?>      
		  </select>
		 <br>
      Seleccione Documentos(s) a cargar:
    <input type="hidden" name="entradam[inventario_id]" value="<?=$inventario->id?>">
      <input type="hidden" name="entradam_doc[tipo_entidad]" value="entradam">
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
    
    <?php 
		$tiposDoc= ["escrito", "imag"];
		?>
    
    . Seleccione el tipo: 
      <select name="entradam_doc[tipo]" id="doc" required >
          <?php foreach ($tiposDoc as $category): ?>    
            <option value="<?=$category?>"><?=$category?></option>
          <?php endforeach; ?>      
      </select>	
            
      <br><br><strong>Descripción del anexo:</strong> <input type="text" name="entradam_doc[desc]" style="width: 95%;">	

	<br>

</form>
<?php endif; ?>	    

<?php else: ?>

<?php endif; ?>
</div>

