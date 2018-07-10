<?php require_once '../controllers/usuarios/check.php'; ?>
<?php /*require_once '../controllers/usuarios/isAdmin.php';*/?>
<!-- Modelos -->
<?php require_once '../models/usuario.php'; ?>
<?php require_once '../models/alicuota.php'; ?>
<?php require_once '../models/apartamento.php'; ?>
<?php require_once '../models/banco.php'; ?>
<?php require_once '../models/formaPago.php'; ?>
<?php require_once '../models/novedad.php'; ?>
<?php require_once '../models/propietario.php'; ?>
<?php require_once '../models/ut.php'; ?>
<?php require_once '../models/auditoria.php'; ?>
<?php require_once '../models/nivel.php'; ?>
<?php require_once '../models/proveedor.php'; ?>
<?php require_once '../models/mensualidad.php'; ?>
<?php require_once '../models/documento.php'; ?>
<?php require_once '../models/notificacion.php'; ?>
<?php require_once '../models/pago.php'; ?>
<?php require_once '../models/gasto.php'; ?>
<?php require_once '../models/cxc.php'; ?>

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
<?php require_once '../views/config/propietarios/apartamentos.php'; ?>
<!-- Formularios unidad tributaria -->
<?php require_once '../views/config/ut/nuevo.phtml'; ?>
<?php require_once '../views/config/ut/editar.phtml'; ?>
<!-- Formularios apartamentos -->
<?php require_once '../views/config/apartamentos/nuevo.phtml'; ?>
<?php require_once '../views/config/apartamentos/editar.phtml'; ?>
<!-- Formularios proveedores -->
<?php require_once '../views/proveedores/nuevo.phtml'; ?>
<?php require_once '../views/proveedores/editar.phtml'; ?>
<!-- Formularios mensualidades -->
<?php require_once '../views/mensualidades/nuevo.phtml'; ?>
<?php require_once '../views/mensualidades/editar.phtml'; ?>
<?php require_once '../views/mensualidades/gastos.php'; ?>
<?php //require_once '../views/mensualidades/generar.php'; ?>
<!-- Formularios gastos -->
<?php require_once '../views/gastos/nuevo.phtml'; ?>
<?php require_once '../views/gastos/editar.phtml'; ?>
<!-- Formularios documentos -->
<?php require_once '../views/documentos/nuevo.phtml'; ?>
<?php require_once '../views/documentos/editar.phtml'; ?>
<!-- Formularios notificacion de pagos -->
<?php require_once '../views/notificacion/nuevo.phtml'; ?>
<?php require_once '../views/notificacion/editar.phtml'; ?>
<?php require_once '../views/pagos/editar.phtml'; ?>

<?php require_once '../views/cuenta/pagar.phtml'; ?>
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
				<a href="#">Opciones</a>
			</li>
			<!-- Nivel administrador del sistema -->
			<?php if($_SESSION['nivel'] == 1){ ?>
			<li role="presentation">
				<a href="./?usuarios">Gestionar cuentas de usuarios</a>
			</li>	
			<?php } ?>	
			
			<!-- Nivel administrador del condominio -->
			<?php if($_SESSION['nivel'] == 2){ ?>
			<li role="presentation">
				<a href="./?mensualidad">Gestionar mensualidades</a>
			</li>	
			<?php } ?>

			<?php if($_SESSION['nivel'] == 2){ ?>
			<li role="presentation">
				<a href="./?gastos">Gestionar gastos</a>
			</li>	
			<?php } ?>		

			<?php if($_SESSION['nivel'] == 2){ ?>
			<li role="presentation">
				<a href="./?pagos">Gestionar pagos</a>
			</li>	
			<?php } ?>	

			<?php if($_SESSION['nivel'] == 2){ ?>
			<li role="presentation">
				<a href="./?propietarios">Gestionar directorios de propietarios</a>
			</li>	
			<?php } ?>	

			<?php if($_SESSION['nivel'] == 2){ ?>
			<li role="presentation">
				<a href="./?proveedores">Gestionar directorio de proveedores</a>
			</li>	
			<?php } ?>	

			<?php if($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ ?>
			<li role="presentation">
				<a href="./?novedades">Gestionar registro de novedades</a>
			</li>	
			<?php } ?>

			<?php if($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3){ ?>
			<li role="presentation">
				<a href="./?documentos">Gestionar repertorio de documentos</a>
			</li>	
			<?php } ?>

			<!-- Nivel administrador del sistema -->
			<?php if($_SESSION['nivel'] == 1){ ?>
			<li role="presentation">
				<a href="./?auditoria">Visualizar historial del sistema</a>
			</li>	
			<?php } ?>	
			
			<!-- Nivel propietario -->
			<?php if($_SESSION['nivel'] == 3){ ?>
			<li role="presentation">
				<a href="./?cuenta">Visualizar estado de cuenta</a>
			</li>	
			<?php } ?>

			<?php if($_SESSION['nivel'] == 3){ ?>
			<li role="presentation">
				<a href="./?notificacion">Emitir notificación de pagos</a>
			</li>	
			<?php } ?>	

			<!-- Nivel administrador del sistema -->
			<?php if($_SESSION['nivel'] == 1){ ?>
			<li class="presentation">
				<a data-toggle="collapse" href="#collapse1">Gestionar valores del sistema</a>
			</li>
				<div id="collapse1" class="collapse">
					<ul class="nav nav-pills nav-stacked nav-pills-stacked-example panel-config">
						<li role="presentation">
							<a href="./?alicuotas">Alicuotas</a>
						</li>
						<li role="presentation">
							<a href="./?apartamentos">Apartamentos</a>
						</li>
						<li role="presentation">
							<a href="./?bancos">Entidades bancarias</a>
						</li>
						<li role="presentation">
							<a href="./?formas">Formas de pago</a>
						</li>
						<li class="presentation">
							<a href="./?ut">Unidad tributaria</a>
						</li>
					</ul>
			</div>
			<?php } ?>
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
			}else if(isset($_GET['apartamentos'])){
				$apartamento = new Apartamento();
				$apartamentos = $apartamento->getApartamentos();
				require_once '../views/config/apartamentos/detalle.phtml';
			}
			else if(isset($_GET['bancos'])){
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
			}else if(isset($_GET['proveedores'])){
				$instanciaProveedor = new Proveedor();
				$proveedores = $instanciaProveedor->getProveedor();
				require_once '../views/proveedores/detalle.phtml';
			}else if(isset($_GET['usuarios'])){
				$instanciaUsuario = new Usuario();
				$usuarios = $instanciaUsuario->getUsuarios();
				require_once '../views/config/usuarios/detalle.phtml';
			}else if(isset($_GET['mensualidad'])){
				$propietario = new Propietario();
				$propietarios = $propietario->getPropietarios();
				$mensualidad = new Mensualidad();
				$mensualidades = $mensualidad->getMensualidades();

				require_once '../views/mensualidades/detalle.phtml';
			}else if(isset($_GET['documentos'])){
				$documento = new Documento();
				$documentos = $documento->getDocumento();
				require_once '../views/documentos/detalle.phtml';
			}else if(isset($_GET['notificacion'])){
				$notificacion = new Notificacion();
				$notificaciones = $notificacion->getNotificacion($_SESSION['idusuario']);
				require_once '../views/notificacion/detalle.phtml';
			}else if(isset($_GET['pagos'])){
				$pago = new Pago();
				$pagos = $pago->getPagos();
				require_once '../views/pagos/detalle.phtml';
			}else if(isset($_GET['cuenta'])){
				$cuenta = new Pago();
				$cuentas = $cuenta->getEstadoCuenta($_SESSION['idusuario']);

				$notificacion = new Notificacion();
				$notificaciones = $notificacion->getNotificacion($_SESSION['idusuario']);

				$cxc = new CXC();
				$cxcAll = $cxc->getCxc();
				require_once '../views/cuenta/detalle.phtml';
			}else if(isset($_GET['ut'])){
				$ut = new Ut();
				$uts = $ut->getUt();
				require_once '../views/config/ut/detalle.phtml';
			}else if(isset($_GET['gastos'])){
				$gasto = new Gasto();
				$gastos = $gasto->getGastos();
				require_once '../views/gastos/detalle.phtml';
			}
		?>
	</div>
</div>
<?php require_once 'layout/footer.inc';?>