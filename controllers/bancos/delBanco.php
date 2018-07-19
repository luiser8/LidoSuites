<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/banco.php';
require_once '../../models/auditoria.php';

$banco = new Banco();
$auditoria = new Auditoria();

$banco->delBanco($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un banco', 'bancos');
header('Location: ../../pages/?bancos');