<?php require_once '../controllers/usuarios/check.php'; ?>
<?php require_once '../controllers/usuarios/isAdmin.php'; ?>
<!-- Modelos -->
<?php require_once '../models/usuario.php'; ?>
<?php require_once '../models/alicuota.php'; ?>
<?php require_once '../models/banco.php'; ?>
<?php require_once '../models/formaPago.php'; ?>
<?php require_once '../models/novedad.php'; ?>
<?php require_once '../models/propietario.php'; ?>
<?php require_once '../models/ut.php'; ?>
<?php require_once '../models/auditoria.php'; ?>
<?php require_once '../models/nivel.php'; ?>

<?php require_once 'layout/head.inc'; ?>
<?php require_once 'layout/navbar.inc'; ?>
<!-- Formularios Usuarios-->
<?php require_once '../views/config/usuarios/nuevo.phtml'; ?>
<?php require_once '../views/config/usuarios/editar.phtml'; ?>
<!-- Formularios Alicuotas-->
<?php require_once '../views/config/alicuotas/nuevo.phtml'; ?>
<?php require_once '../views/config/alicuotas/editar.phtml'; ?>
<!-- Formularios Bancos-->
<?php require_once '../views/config/bancos/nuevo.phtml'; ?>
<?php require_once '../views/config/bancos/editar.phtml'; ?>
<!-- Formularios formas pagos-->
<?php require_once '../views/config/formas_pago/nuevo.phtml'; ?>
<?php require_once '../views/config/formas_pago/editar.phtml'; ?>
<!-- Formularios novedades -->
<?php require_once '../views/config/novedad/nuevo.phtml'; ?>
<?php require_once '../views/config/novedad/editar.phtml'; ?>
<!-- Formularios propietarios -->
<?php require_once '../views/config/propietarios/nuevo.phtml'; ?>
<?php require_once '../views/config/propietarios/editar.phtml'; ?>
<!-- Formularios unidad tributaria -->
<?php require_once '../views/config/ut/nuevo.phtml'; ?>
<?php require_once '../views/config/ut/editar.phtml'; ?>
<!-- <span ng-include="'views/usuarios/nuevo.phtml'"></span>
<span ng-include="'views/usuarios/editar.phtml'"></span>

<span ng-include="'views/config/ut/nuevo.phtml'"></span>
<span ng-include="'views/config/ut/editar.phtml'"></span>

<span ng-include="'views/config/alicuotas/nuevo.phtml'"></span>
<span ng-include="'views/config/alicuotas/editar.phtml'"></span>

<span ng-include="'views/config/bancos/nuevo.phtml'"></span>
<span ng-include="'views/config/bancos/editar.phtml'"></span>

<span ng-include="'views/config/formas_pago/nuevo.phtml'"></span>
<span ng-include="'views/config/formas_pago/editar.phtml'"></span>

<span ng-include="'views/config/auditoria/editar.phtml'"></span> -->

<div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<ul class="nav nav-pills nav-stacked nav-pills-stacked-example panel-config">
			<li role="presentation" class="active">
				<a href="#">Configuraciones</a>
			</li>
			<li role="presentation">
				<a href="./config?alicuotas">Alicuotas</a>
			</li>
			<li role="presentation">
				<a href="./config?auditoria">Auditorias</a>
			</li>
			<li role="presentation">
				<a href="./config?bancos">Entidades bancarias</a>
			</li>
			<li role="presentation">
				<a href="./config?formas">Formas de pago</a>
			</li>
			<li role="presentation">
				<a href="./config?novedades">Novedades</a>
			</li>
			<li role="presentation">
				<a href="./config?propietarios">Propietarios</a>
			</li>
			<li role="presentation">
				<a href="./config?usuarios">Usuarios</a>
			</li>
			<li role="presentation">
				<a href="./config?ut">Unidad tributaria</a>
			</li>
		</ul>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<?php 
		//var_dump($_GET['auditoria']);
			if(isset($_GET['alicuotas'])){
				$instanciaAlicuota = new Alicuota();
				$alicuotas = $instanciaAlicuota->getAlicuota();
				require_once '../views/config/alicuotas/detalle.phtml';
			}else if(isset($_GET['auditoria'])){
				$auditoria = new Auditoria();
				$auditorias = $auditoria->getAuditoria();
				require_once '../views/config/auditoria/detalle.phtml';
			}else if(isset($_GET['bancos'])){
				$instanciaBanco = new Banco();
				$bancos = $instanciaBanco->getBancos();
				require_once '../views/config/bancos/detalle.phtml';
			}else if(isset($_GET['formas'])){
				$formaPago = new FormaPago();
				$formasPagos = $formaPago->getFormaPago();
				require_once '../views/config/formas_pago/detalle.phtml';
			}else if(isset($_GET['novedades'])){
				$novedad = new Novedad();
				$novedades = $novedad->getNovedad();
				require_once '../views/config/novedad/detalle.phtml';
			}else if(isset($_GET['propietarios'])){
				$propietario = new Propietario();
				$propietarios = $propietario->getPropietarios();
				require_once '../views/config/propietarios/detalle.phtml';
			}else if(isset($_GET['usuarios'])){
				$instanciaUsuario = new Usuario();
				$usuarios = $instanciaUsuario->getUsuarios();
				require_once '../views/config/usuarios/detalle.phtml';
			}else if(isset($_GET['ut'])){
				$ut = new Ut();
				$uts = $ut->getUt();
				require_once '../views/config/ut/detalle.phtml';
			}
		?>
	</div>
</div>
<?php require_once 'layout/footer.inc';?>