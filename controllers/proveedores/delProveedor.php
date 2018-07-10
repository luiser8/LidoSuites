<?php

require_once '../../controllers/usuarios/check.php';
require_once '../../models/proveedor.php';
require_once '../../models/auditoria.php';

$proveedor = new Proveedor();
$auditoria = new Auditoria();

$proveedor->delProveedor($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un proveedor', 'proveedores');
header('Location: ../../pages/proveedores?get');