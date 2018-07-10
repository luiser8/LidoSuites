<?php 
require_once '../../models/ut.php';

$ut = new Ut();

if(!empty($_GET['id'])){
	$uts = $ut->getUtId(base64_decode($_GET['id']));
}