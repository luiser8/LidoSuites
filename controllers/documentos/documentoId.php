<?php 

require_once '../../models/apartamento.php';

$apartamento = new Apartamento();


if(!empty($_GET['id'])){
	$apartamento = new Apartamento();
	$apartamentos = $apartamento->getApartamentoId(base64_decode($_GET['id']));
}