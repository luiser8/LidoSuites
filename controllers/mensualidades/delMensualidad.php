<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/mensualidad.php';
require_once '../../models/auditoria.php';

$mensualidad = new Mensualidad();
$auditoria = new Auditoria();

$mensualidad->delMensualidad($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar una mensualidad', 'mensualidad');
header('Location: ../../pages/?mensualidad');