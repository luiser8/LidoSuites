<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/apartamento.php';
require_once '../../models/auditoria.php';

$apartamento = new Apartamento();
$auditoria = new Auditoria();
$apartamento->delApartamento($_GET['id']);

$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un apartamento', 'apartamentos');
header('Location: ../../pages/?apartamentos');