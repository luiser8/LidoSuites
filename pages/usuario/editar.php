<?php require_once '../../controllers/usuarios/check.php'; ?>
<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
<?php // require_once '../../controllers/usuarios/usuarioId.php';?>
<?php require_once '../../models/usuario.php'; ?>

<?php
	if(!empty($_GET['id'])){
		$usuario = new Usuario();
		$usuarios = $usuario->getUsuarioId(base64_decode($_GET['id']));
	}
	for($i=0; $i<count($usuarios); $i++){ $rs = $usuarios[$i]; }
?>
<div class="jumbotron"></div>
<div class="container">
	<div class="list-group">
	  <a href="#" class="list-group-item active">
	    <h4 class="list-group-item-heading"> Editando mi perfil </h4>
	  </a>
</div>
</div>
<br>
<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
	<div class="form-group" id="formLogin">
		<form class="form-group" action="../../controllers/usuarios/editPerfil.php" method="post">
			<input type="hidden" name="id_usuario" value="<?php echo base64_decode($_GET['id']); ?>">
			<input type="hidden" name="clave" value="<?php echo $rs['contrasena']; ?>">
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $rs['nombres']; ?>" required name="nombres">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $rs['apellidos']; ?>" required name="apellidos">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" value="<?php echo $rs['correo']; ?>" required name="correo">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo $rs['telefono']; ?>" required name="telefono">
			</div>
			<input type="submit" class="btn btn-primary" value="Salvar">
			<a class="btn btn-warning" href="../perfil?id=<?php echo $_GET['id']; ?>">Volver al perfil</a>
		</form>
	</div>
</div>
<script src="../../public/js/jquery-2.2.4.min.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>