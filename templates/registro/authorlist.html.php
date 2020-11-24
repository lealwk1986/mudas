
<h2>Lista de Usuarios </h2>

<table>
	<thead>
		<th>Nombre</th>
		<th>Email</th>
		<th>Permisos</th>
        <th>Borrar</th>
        <th>Modificar</th>
        
	</thead>

	<tbody>
		<?php foreach ($usuarios as $usuario): ?>
		<tr>
			<td><?=$usuario->name;?></td>		
			<td><?=$usuario->email;?></td>
			<td><a href="/usuario/permisos?id=<?=$usuario->id;?>">Editar Permisos</a></td>
            <td>
            <?php if ($user): ?>
              <?php if ( $user->hasPermission(\Sismaed\Entity\usuario::PERMISO_6)): ?>
              <form action="/usuario/borar" method="post">
                <input type="hidden" name="id" value="<?=$usuario->id?>">
                <input style="background-color: white; border-color: white; border: 1px; text-decoration: underline; cursor: pointer" type="submit" value="Borrar">
              </form>
              <?php endif; ?>
            <?php endif; ?>
            </td>
            <td><a href="/usuario/modificar?id=<?=$usuario->id;?>">Modificar</a></td>
		</tr>
		<?php endforeach; ?>
        
	</tbody>
</table>
<p></p>
<a href="/usuario/registrar">Agregar Usuario</a>

