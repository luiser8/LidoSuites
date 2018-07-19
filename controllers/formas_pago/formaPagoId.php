<?php 

require_once '../../models/formaPago.php';
$formaPago = new FormaPago();

if(!empty($_GET['id'])){
	$formaPago = new Alicuota();
	$formasPagos = $formaPago->getFormaPagoId(base64_decode($_GET['id']));
}