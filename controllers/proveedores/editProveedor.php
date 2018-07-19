<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/proveedor.php';
require_once '../../models/auditoria.php';

$proveedor = new Proveedor();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$proveedor->editProveedor($_POST['id_new_proveedor'], $_POST['new_nombres'], 
								$_POST['new_apellidos'], $_POST['new_correo'],
								$_POST['new_telefono'], $_POST['new_notas']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un propietario', 'propietarios');
	header('Location: ../../pages/?proveedores');
}