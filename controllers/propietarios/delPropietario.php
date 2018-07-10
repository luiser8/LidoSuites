<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/propietario.php';
require_once '../../models/auditoria.php';

$propietario = new Propietario();
$auditoria = new Auditoria();

$propietario->delPropietario($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un propietario', 'propietarios');
header('Location: ../../pages/config?propietarios');