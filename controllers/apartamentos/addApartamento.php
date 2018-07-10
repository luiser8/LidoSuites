<?php
require_once '../../controllers/usuarios/check.php';
require_once '../../models/apartamento.php';
require_once '../../models/auditoria.php';

$instanciaApartamento = new Apartamento();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$alicuota = isset($_POST['alicuota']) ? $_POST['alicuota'] : '';
	$nombre = isset($_POST['nombreApartamento']) ? $_POST['nombreApartamento'] : '';
	$saldo = isset($_POST['saldoApartamento']) ? $_POST['saldoApartamento'] : '';

	$instanciaApartamento->addApartamento($alicuota, $nombre, $saldo);

	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un apartamento', 'apartamentos');
	header('Location: ../../pages/?apartamentos');
}