<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/ut.php';
require_once '../../models/auditoria.php';

$utinstancia = new Ut();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$ut = isset($_POST['ut']) ? $_POST['ut'] : '';
	$anio = isset($_POST['anio']) ? $_POST['anio'] : '';

	$utinstancia->addUt($ut, $anio);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una unidad tributaria', 'ut');
	header('Location: ../../pages/?ut');
}