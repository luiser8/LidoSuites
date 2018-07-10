<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/pago.php';
require_once '../../models/auditoria.php';

$pago = new Pago();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$id_forma_pago = isset($_POST['forma_pago']) ? $_POST['forma_pago'] : '';
	$id_apartamento = isset($_POST['apto']) ? $_POST['apto'] : '';
	$id_banco = isset($_POST['banco']) ? $_POST['banco'] : '';
	$monto = isset($_POST['monto']) ? $_POST['monto'] : '';
	$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
	$aprobado = 0;
	
	$pago->addPago($id_forma_pago, $id_apartamento, $id_banco, $_SESSION['idusuario'], $monto, $referencia, $aprobado, $descripcion, $fecha);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una notificacion de pago', 'pagos');
	//header('Location: ../../pages/?cuenta');
}