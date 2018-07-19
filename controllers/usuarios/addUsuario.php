<?php
require_once '../../controllers/usuarios/check.php';
require_once '../../models/usuario.php';
require_once '../../models/auditoria.php';

$instanciaUsuario = new Usuario();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
	$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
	$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';

	$instanciaUsuario->addUsuario($nombres, $apellidos, $correo, $contrasena, $telefono, $nivel);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un usuario', 'usuarios');
	header('Location: ../../pages/config?usuarios');
}