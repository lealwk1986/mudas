
 
 <style>
	 .icon-bar {
  width: 100px;
  background-color: #555;
		 
		
}

.icon-bar {
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
	 .th2{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 22px;
	 }
	  .th4{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width: 95%;
		 font-size: 30px;
		
	 }
	  .th5{
	color: #FFFFFF;
	background-color: #555555;
	text-indent: 3px;
	padding: 5px;
		 width:250px;
		 font-size: 30px;
		
	 }
	 .archi:hover {
		 cursor: pointer;
		 color: brown;
	 }
     
     .listaedit01{
    width: 95%;
    border-bottom: thin solid gray;
    padding-bottom: 5px;

	 }
</style> 


<style media="print">
        #sidebar, header, .navbar, .row, .icon-bar, .footer {
            display: none;
        }
        .main, .conten_ajax {
            display:block;
            width: 100%;
            overflow-y: visible;
        }
</style>



<div class="icon-bar">
      <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
      
<?php if(($user->id == $reporte->usuario_id || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6)
                        )):?>      
      
      <a class="aa" href="#" onClick="editar()"><i class="fa fa-pencil-square-o "></i></a> 
      
      <form action="/reporte/borrar" method="post">

<input  type="submit" onclick="return confirm('ALERTA: Estás Seguro de Borrar este REPORTE. Ésta acción NO se puede deshacer.')" id="borrar_submit" name="borrar" value="Delete" class="ocultaBoton"/>
		<label for="borrar_submit" class="fa fa-trash aa" ></label> <div class="clear"></div>

        <input type="hidden" name="id" value="<?=$reporte->id ?? ''?>" >
    </form>
    
<?php endif; ?>    
    
    <a class="aa" href="#" onClick="javascript:window.print();"><i class="fa fa-print"></i></a>
    
    <p id="id_item" style="visibility: hidden;"><?=$reporte->id;?></p>
</div>

<div class="conten_ajax" id="conten_ajax">
<p ><h2 class="th4">Nombre</h2> <?=$reporte->nombre?></p>

<p ><h2 class="th4">Descripcion</h2> <?=$reporte->desc?></p>


<div style="float: left; margin-left: 10px;">

<h2 class="th5"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha </h2> <?=$reporte->fecha?>

</div>

<div class="clear"></div>

<p ><h2 class="th4"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Responsable</h2></p>
<p>
<?php $obj=$reporte->getPeog() ?>
<a href="/peog/ver?id=<?=$obj->id;?>"><?=$obj->nombre;?> <?=$obj->apellido;?></a>
     
</p>



<form action="/reporte/someterreporte" method="post" name="reporte" >
 
   
   
    <h3 class="th4">Subir Reporte
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
         <?php foreach($reporte->getDatoreporte() as $index=>$datoreporte) :?>

            <div class="listaedit01">
            <p style="margin: 4px;">
                
                <strong><?=$index+1;?>:</strong>    
                <?=$datoreporte->nombre?> 
                
                <label for="ckeckbox_<?=$index?>" ><strong>Revisado</strong></label>
                <input type="checkbox" id="ckeckbox_<?=$index?>" name="datosreporte[<?=$index?>][valor1]" value="R" 
                       <?php if($datoreporte->valor1 == 'R'):?>
                       checked
                       <?php endif;?>
                       <?php if(!($user->id == $reporte->usuario_id || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6)
                        )):?>
                       disabled
                       <?php endif;?>
                       >
                <br>
                <strong>Valor</strong>
                
                <input type="text" name="datosreporte[<?=$index?>][valor2]" value="<?=$datoreporte->valor2 ?>" style=" height: 8px; width: 80%"
                <?php if(!($user->id == $reporte->usuario_id || $user->hasPermission(\Sismaed\Entity\Usuario::PERMISO_6)
                        )):?>
                       disabled
                <?php endif;?>
                
                >
                

                <input type="hidden" name="datosreporte[<?=$index?>][id]" value="<?=$datoreporte->id ?>">
                <input type="hidden" name="datosreporte[<?=$index?>][reporte_id]" value="<?=$reporte->id ?>">  
                <input type="hidden" name="datosreporte[<?=$index?>][nombre]" value="<?=$datoreporte->nombre ?>"> 
                
                
            </p>
                
                
                 <?php if(count($datoreporte->getDoc("escrito"))>0):?>
                 <h2 >Documentos(es)</h2>
                 <?php endif;?>
                 <?php foreach($datoreporte->getDoc("escrito") as $index3=>$obj3): ?>
                 <p> <a href="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>">Documento
                   <?=$index+1;?>
                   :
                   <?=$obj3->nombre;?>
                   </a><br>
                <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
              </p>
                 <?php endforeach; ?>
                 <div class="clear"> </div>
                 <?php if(count($datoreporte->getDoc("imag"))>0):?>
                 <h2 style="margin: 0px">Imagen(es)</h2>
                 <?php endif;?>
                 <?php foreach($datoreporte->getDoc("imag") as $index3=>$obj3): ?>
                 <p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;" ></img>
                <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
              </p>
                 <?php endforeach; ?>
                 <div class="clear"> </div>
                 <?php if(count($datoreporte->getDoc("video"))>0):?>
                 <h2 >Video(s)</h2>
                 <?php endif;?>
                 <?php foreach($datoreporte->getDoc("video") as $index3=>$obj3): ?>
                 <p style="width: 300px; float: left; margin: 10px;">
                               <video class="video_mysql" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;" controls></video>
                 <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
                 </p>
                 <?php endforeach; ?>
                 <div class="clear"> </div>
                 <?php if(count($datoreporte->getDoc("audio"))>0):?>
                 <h2 >Audio(s)</h2>
                 <?php endif;?>
                 <?php foreach($datoreporte->getDoc("audio") as $index3=>$obj3): ?>
                 <p>
                               <audio src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" controls></audio>
                 <?=$obj3->nombre?>
                 <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
                 </p>
                 <?php endforeach; ?>



        
 
                
                
<?php /*?>                
                
                <label onClick=editarR(<?=$datoreporte->id?>,<?=$reporte->id?>) class="fa fa-eye buttondelete" style="float: right"></label>
                <label onClick=editarR(<?=$datoreporte->id?>,<?=$reporte->id?>) class="fa fa-pencil buttondelete" style="float: right"></label> <?php */?>
            
    </div>
        <?php endforeach;?>

</form>


<?php foreach($reporte->getEvento() as $index2=>$obj2): ?>
    <div class="listaedit01">
    <h3 ><strong>Evento <?=$index2+1?>: <?=$obj2->nombre?> (<?=$obj2->fecha?>)</strong></h3>
        <p> <strong>Descripción:</strong> <?=$obj2->desc?></p>
        <p> <strong>Reporte:</strong> </p>
        <textarea name="text"  readonly cols="140" rows="10"><?=$obj2->reporte?></textarea>
        
        <?php if(count($obj2->getDoc("escrito"))>0):?>
        <h3>Documentos(es)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("escrito") as $index3=>$obj3): ?>
<p> <a href="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>">Documento <?=$index+1;?>: <?=$obj3->nombre;?></a><br><?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?></p>
        <?php endforeach; ?>
<div class="clear">
</div>

        <?php if(count($obj2->getDoc("imag"))>0):?>
        <h3>Imagen(es)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("imag") as $index3=>$obj3): ?>
<p style="width: 300px; float: left; margin: 10px;"> <img class="imag" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;" referrerpolicy="origin" ></img>
  <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
</p>
        <?php endforeach; ?>

<div class="clear">
</div>


        <?php if(count($obj2->getDoc("video"))>0):?>
        <h3 >Video(s)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("video") as $index3=>$obj3): ?>
<p style="width: 300px; float: left; margin: 10px;"> <video class="video_mysql" src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" style="width: 300px;" controls></video>
            <?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?>
        </p>
        <?php endforeach; ?>

<div class="clear">
</div>
        <?php if(count($obj2->getDoc("audio"))>0):?>
        <h3 >Audio(s)</h3>
        <?php endif;?>
        <?php foreach($obj2->getDoc("audio") as $index3=>$obj3): ?>
<p> <audio src="/doc?archivo=<?=$obj3->nombre;?>&ruta=<?=$obj3->getRuta();?>" controls></audio><?=$obj3->nombre?><?=' Fecha: '.$obj3->fecha.'. Desc: '.$obj3->desc?></p>
        <?php endforeach; ?>
    </div>
<br>
    <?php endforeach; ?> 


</div>




	