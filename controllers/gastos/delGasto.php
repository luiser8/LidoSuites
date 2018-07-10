<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/gasto.php';
require_once '../../models/auditoria.php';

$gasto = new Gasto();
$auditoria = new Auditoria();

$gasto->delGasto($_GET['id']);
header('Location: ../../pages/?gastos');
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un gasto', 'gastos');