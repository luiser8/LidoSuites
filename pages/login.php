<?php require_once 'layout/head.inc'; ?>
<?php require_once 'layout/navbar.inc'; 

if (isset($_SESSION['login'])) {
    header('Location: pages/?mensualidad');
    die();
}
?>
<div id="form_container">
	<div class="col col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6">
		<div class="jumbotron">
			<div class="text-center">
				<img id="userLogo" src="../public/images/user.png">
			</div>
			<div class="container">
				<form class="form-group" action="../controllers/usuarios/login" method="post">
				    <div class="form-group">
				        <input class="form-control input-lg" type="email" name="usuario" id="usuario" autofocus placeholder="Usuario@email.com" autocomplete="off">
				    </div>
				    <div class="form-group">
				        <input class="form-control input-lg" type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off">
				    </div>
				    <input class="btn btn-primary btn-block input-lg" type="submit" value="Iniciar sesion">
				</form>
			</div>
		</div>
	</div>
</div>
<?php require_once 'layout/footer.inc'; ?>