<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/ut.php';
require_once '../../models/auditoria.php';

$utinstancia = new Ut();
$auditoria = new Auditoria();

$utinstancia->delUt($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar una unidad tributaria', 'ut');
header('Location: ../../pages/config?ut');