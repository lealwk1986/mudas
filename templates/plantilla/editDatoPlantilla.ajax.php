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

<?php if (empty($datoplantilla->id)  || $user->hasPermission(\Sismaed\Entity\Usuario::EDIT_USER_ACCESS)): ?>


<div class="icon-bar">
	
  <a class="aa" href="#" onClick="question()"><i class="fa  fa-question"></i></a> 

</div>

<div class="conten_ajax">
<form action="/plantilla/savedatoplantilla" method="post" enctype="multipart/form-data" >
	<h3 class="th4"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Dato Plantilla(s)
		<input  type="submit"  name="submit" value="Subir" class="ocultaBoton" id="arc_submit01"/>
		<label for="arc_submit01" class="fa fa-upload  buttonedit" ><div class="clear"></div>
		</label></h3> 
		<label><strong>Nombre:</strong> </label>
    <input type="hidden" name="datoplantilla[id]" value="<?=$datoplantilla->id?>">
    <input type="hidden" name="datoplantilla[plantilla_id]" value="<?=$datoplantilla->plantilla_id?>">
	<input type="text" name="datoplantilla[nombre]" style="width: 95%" value="<?=$datoplantilla->nombre?>">
		<br>
    <label><strong>Descripción:</strong> </label>
	<input type="text" name="datoplantilla[desc]" style="width: 95%" value="<?=$datoplantilla->desc?>">
    <br>

    </form>

    
    <br>

<?php endif; ?>
</div>









