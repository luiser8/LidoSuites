<?php  
require_once '../../controllers/usuarios/check.php';
require_once '../../models/banco.php';
require_once '../../models/auditoria.php';

$banco = new Banco();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$banco->editBanco($_POST['id_banco'], $_POST['new_descripcion']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un banco', 'bancos');
	header('Location: ../../pages/?bancos');
	//var_dump($_POST);
}