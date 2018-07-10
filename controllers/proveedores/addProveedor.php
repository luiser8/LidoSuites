<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/proveedor.php';
require_once '../../models/auditoria.php';

$proveedor = new Proveedor();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
	$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
	$notas = isset($_POST['notas']) ? $_POST['notas'] : '';

	$proveedor->addProveedor($nombres, $apellidos, $correo, $telefono, $notas);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un proveedor', 'proveedores');
	header('Location: ../../pages/?proveedores');
}