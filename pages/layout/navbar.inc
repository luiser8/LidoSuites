<?php 
	require_once '../models/pago.php';
 	$pago = new Pago();
	$pagos = $pago->getPagos();
	$sinAprobar = $pago->getPagosNotificacion();
	$sinAprobarId = $pago->getPagosNotificacionId(isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : '');

	for($i=0; $i<count($sinAprobar); $i++){ $rs1 = $sinAprobar[$i]; }
	for($i=0; $i<count($sinAprobarId); $i++){ $rs2 = $sinAprobarId[$i]; }
	$notificacion = $rs1['sinAprobar'] ? $rs1['sinAprobar'] : '0';
	$notificacionId = $rs2['sinAprobar'] ? $rs2['sinAprobar'] : '0';
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./">Condominio Lido Suites</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- Perfil -->
			<ul class="nav navbar-nav navbar-right" id="navegacion">
				 <?php if(isset($_SESSION['login'])){ ?>
				<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php if($_SESSION['nivel'] == 2){ ?>
						<i class="badge" title="Tienes <?php echo $notificacion; ?> pagos por verificar"><?php echo $notificacion; ?></i>
					<?php }else if($_SESSION['nivel'] == 3){?>
						<i class="badge" title="Tienes <?php echo $notificacionId; ?> pagos por aprobar"><?php echo $notificacionId; ?></i>
					<?php }?>
					Bienvenido | <b><?php echo $_SESSION['login']; ?></b><span class="caret"></span></a>
					<ul class="dropdown-menu">
           			
           				<li><a href="./perfil?id=<?php echo base64_encode($_SESSION['idusuario']); ?>"><b>Perfil</b></a></li>
						<li role="separator" class="divider"></li>

						<li><a href="./logout" onclick="logout();"> Salir</a></li>
           			 <?php }else{ ?>
						<!-- <li><a href="#" onclick="loginmodal();"> Iniciar sesion</a></li> -->
           			 <?php } ?>
          </ul></li>
			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
</div>
