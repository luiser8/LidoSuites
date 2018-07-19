<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/formaPago.php';
require_once '../../models/auditoria.php';

$formaPago = new FormaPago();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$descripcion = isset($_POST['descripcion_forma_pago']) ? $_POST['descripcion_forma_pago'] : '';

	$formaPago->addFormaPago($descripcion);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una forma de pago', 'formas_pagos');
	header('Location: ../../pages/?formas');
}