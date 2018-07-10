<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/propietario.php';
require_once '../../models/usuario.php';
require_once '../../models/auditoria.php';

$propietario = new Propietario();
$instanciaUsuario = new Usuario();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
	$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
	$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
	$notas = isset($_POST['notas']) ? $_POST['notas'] : '';
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

	$propietario->addPropietario($cedula, $nombres, $apellidos, $telefono, $correo, $notas);
	$instanciaUsuario->addUsuario($nombres, $apellidos, $correo, $contrasena, $telefono, 3);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un propietario', 'propietarios');
	header('Location: ../../pages/?propietarios');
}