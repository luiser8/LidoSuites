<?php 

require_once '../models/alicuota.php';

if(!empty($_GET['id'])){
	$alicuota = new Alicuota();
	$alicuotas = $alicuota->getAlicuotaId(base64_decode($_GET['id']));
}