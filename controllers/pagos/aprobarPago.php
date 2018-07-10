<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/pago.php';
require_once '../../models/auditoria.php';

$pago = new Pago();
$auditoria = new Auditoria();

if(!empty($_GET)){
	$pago->aprobarPago($_GET['id'], 1);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Aprobar pago', 'pagos');
	header('Location: ../../pages/?pagos');
}