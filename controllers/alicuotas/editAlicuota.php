<?php  
require_once '../../controllers/usuarios/check.php';
require_once '../../models/alicuota.php';
require_once '../../models/auditoria.php';

$alicuota = new Alicuota();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$alicuota->editAlicuota($_POST['alicuota'], $_POST['new_alicuota'], $_POST['new_monto']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una alicuota', 'alicuotas');
	header('Location: ../../pages/?alicuotas');
	//var_dump($_POST);
}