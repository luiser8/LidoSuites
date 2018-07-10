<?php 

require_once '../../models/mensualidad.php';

$mensualidad = new Mensualidad();

if(!empty($_GET['id'])){
	$mensualidad->getMensualidadId(base64_decode($_GET['id']));
}