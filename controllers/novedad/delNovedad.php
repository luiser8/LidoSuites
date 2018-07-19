<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/novedad.php';
require_once '../../models/auditoria.php';

$novedad = new Novedad();
$auditoria = new Auditoria();

$novedad->delNovedad($_GET['id']);
header('Location: ../../pages/config?novedades');
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar una novedad', 'novedades');