<?php 

require_once '../controllers/usuarios/check.php';
require_once '../controllers/usuarios/logout.php';

$usuario = new Usuario();
$usuario->delSession();