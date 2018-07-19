<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/banco.php';
require_once '../../models/auditoria.php';

$instanciaBanco = new Banco();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

	$instanciaBanco->addBanco($descripcion);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un banco', 'bancos');
	header('Location: ../../pages/?bancos');
}