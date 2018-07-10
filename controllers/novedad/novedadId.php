<?php 

require_once '../../models/novedad.php';

$novedad = new Novedad();

if(!empty($_GET['id'])){
	$novedades = $novedad->getNovedadId(base64_decode($_GET['id']));
}