<?php if (!empty($errors)): ?>
	<div class="errors">
		<p>Your account could not be created, please check the following:</p>
		<ul>
		<?php foreach ($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; 	?>
		</ul>
	</div>
<?php endif; ?>

<?php
if(isset($usuarioO)){
    $usuario['id']=$usuarioO->id;
    $usuario['name']=$usuarioO->name;
    $usuario['email']=$usuarioO->email;
    $usuario['password']='1234';
    $modificar= true;
}

?>

<form action="/usuario/registrar" method="post">
    <label for="email">Correo Electronico</label>
    <input name="usuario[email]" id="email" type="text" value="<?=$usuario['email'] ?? ''?>">
    
    <label for="name">Nombre y Apellido</label>
    <input name="usuario[name]" id="name" type="text" value="<?=$usuario['name'] ?? ''?>">

    <label for="password">Password</label>
    <input name="usuario[password]" id="password" type="password" value="<?=$usuario['password'] ?? ''?>">
     <input type="hidden" name="usuario[id]" value="<?=$usuario['id'] ?? ''?>">
     
     <?php if(isset($usuarioO)):?>
     <input type="hidden" name="modificar" value="true">
     <?php endif;?>
   
    <input type="submit" name="submit" value="Modidfar/Agregar">
    
    
</form>