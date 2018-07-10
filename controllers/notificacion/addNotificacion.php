<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/notificacion.php';
require_once '../../models/cxc.php';
require_once '../../models/auditoria.php';

$notificacion = new Notificacion();
$cxc = new CXC();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$mensualidad = isset($_POST['mensualidad']) ? $_POST['mensualidad'] : '';
	$id_forma_pago = isset($_POST['forma_pago']) ? $_POST['forma_pago'] : '';
	$id_apartamento = isset($_POST['apartamento']) ? $_POST['apartamento'] : '';
	$id_banco = isset($_POST['banco']) ? $_POST['banco'] : '';
	$monto = isset($_POST['monto']) ? $_POST['monto'] : '';
	$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
	$aprobado = 0;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

	$notificacion->addNotificacion($id_forma_pago, $id_apartamento, $id_banco, $_SESSION['idusuario'], $monto, $referencia, $aprobado, $descripcion, $fecha);
	$cxc->editCxc($mensualidad);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una notificacion de pago', 'pagos');
	header('Location: ../../pages/?notificacion');
}