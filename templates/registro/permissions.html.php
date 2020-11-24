<h2>Editar los permisos de <?=$usuario->name?></h2>

<form action="" method="post">
	
	<?php foreach ($permissions as $name => $value): ?>
	<div>
		<input name="permissions[]" type="checkbox" value="<?=$value?>" <?php if ($usuario->hasPermission($value)) echo 'checked'; ?> />
		<label><?=ucwords(strtolower(str_replace('_', ' ', $name)))?>
	</div>
	<?php endforeach; ?>
      <br>
	<input style="background-color: white; border-color: white; border: 1px; text-decoration: underline; cursor: pointer;" type="submit" value="Salvar" />
</form>