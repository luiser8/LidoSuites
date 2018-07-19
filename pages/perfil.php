<?php require_once '../controllers/usuarios/check.php'; ?>
<?php require_once 'layout/head.inc'; ?>
<?php require_once 'layout/navbar.inc'; ?>
<?php require_once '../controllers/usuarios/usuarioId.php';?>
<!-- Formularios perfil-->
<?php require_once '../views/perfil/editar.phtml'; ?>

<div class="container">
<table class="table table-striped" id="tablaPerfil">
	<tr>
		<th>Id</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Opciones</th>
	</tr>
	<?php for($i=0; $i<count($usuarios); $i++){ $rs = $usuarios[$i]; ?>
	<tr>
		<td><?php echo $rs['id_usuario']; ?></td>
		<td><?php echo $rs['nombres']; ?></td>
		<td><?php echo $rs['apellidos']; ?></td>
		<td><?php echo $rs['correo']; ?></td>
		<td><?php echo $rs['telefono']; ?></td>
		<td>
			<a href="#" onclick="editPerfil(this);" ><i class="glyphicon glyphicon-edit"></i></a>
		</td>
	</tr> <?php } ?>
</table>
</div>
<?php require_once 'layout/footer.inc'; ?>