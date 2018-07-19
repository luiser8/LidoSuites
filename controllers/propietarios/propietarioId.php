<?php 

require_once '../../models/propietario.php';

$propietario = new Propietario();

if(!empty($_GET['id'])){
	$propietarios = $propietario->getPropietarioId(base64_decode($_GET['id']));
}