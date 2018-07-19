<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/alicuota.php';
require_once '../../models/auditoria.php';

$alicuota = new Alicuota();
$auditoria = new Auditoria();
$alicuota->delAlicuota($_GET['id']);

$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar una alicuota', 'alicuotas');
header('Location: ../../pages/?alicuotas');