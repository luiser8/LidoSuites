<?php  

require_once '../../controllers/usuarios/check.php';
require_once '../../models/usuario.php';
require_once '../../models/auditoria.php';

$auditoria = new Auditoria();
$usuario = new Usuario();

if(!empty($_POST)){
	$usuario->editUsuario($_POST['id_new_usuario'], $_POST['new_nombres'], $_POST['new_apellidos'], $_POST['new_correo'], $_POST['new_contrasena'], $_POST['new_telefono'], $_POST['new_nivel']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un usuario', 'usuarios');
	header('Location: ../../pages/config?usuarios');
	//var_dump($_POST);
}