<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/cxc.php';
require_once '../../models/auditoria.php';

$cxc = new CXC();
$auditoria = new Auditoria();

if(!empty($_GET['id'])){
	$cxc->editCxc($_GET['id']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'cancelar mensualidad', 'cxc');
	header('Location: ../../pages/?cuenta');
}