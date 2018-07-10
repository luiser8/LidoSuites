<?php 

require_once '../../models/banco.php';

$banco = new Banco();

if(!empty($_GET['id'])){
	$banco = new Alicuota();
	$bancos = $banco->getBancoId(base64_decode($_GET['id']));
}