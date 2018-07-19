<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/notificacion.php';
require_once '../../models/auditoria.php';

$notificacion = new Notificacion();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$notificacion->editNotificacion($_POST['id_new_notificacion_pago'], 
									$_POST['forma_pago'], $_POST['apartamento'],
									$_POST['banco'], $_SESSION['idusuario'], 
									$_POST['new_total_notificacion'], 
									$_POST['new_referencia_notificacion'],
									$_POST['new_descripcion_notificacion'],
									$_POST['new_fecha_notificacion']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una notificacion', 'pagos');
	header('Location: ../../pages/?notificacion');
}