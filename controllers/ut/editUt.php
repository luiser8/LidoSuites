<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/ut.php';
require_once '../../models/auditoria.php';

$utinstancia = new Ut();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$utinstancia->editUt($_POST['id_new_ut'], $_POST['new_ut'], $_POST['new_anio_ut']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una unidad tributaria', 'ut');
	header('Location: ../../pages/?ut');
}