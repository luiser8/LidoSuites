<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/formaPago.php';
require_once '../../models/auditoria.php';

$formaPago = new FormaPago();
$auditoria = new Auditoria();
$formaPago->delFormaPago($_GET['id']);

$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar una forma de pago', 'formas_pagos');
header('Location: ../../pages/?formas');