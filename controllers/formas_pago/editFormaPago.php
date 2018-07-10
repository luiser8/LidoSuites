<?php  

require_once '../../controllers/usuarios/check.php';
require_once '../../models/formaPago.php';
require_once '../../models/auditoria.php';

$formaPago = new FormaPago();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$formaPago->editFormaPago($_POST['id_forma_pago'], $_POST['new_descripcion_forma_pago']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una forma de pago', 'formas_pagos');
	header('Location: ../../pages/?formas');
}