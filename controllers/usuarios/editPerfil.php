<?php  

require_once '../../controllers/usuarios/check.php';
require_once '../../models/usuario.php';
require_once '../../models/auditoria.php';

$auditoria = new Auditoria();
$usuario = new Usuario();

if(!empty($_POST)){
	$usuario->editPerfil($_POST['id_usuario'], $_POST['new_nombre'], $_POST['new_apellido'], $_POST['new_email'], $_POST['new_telefono'], $_POST['new_contrasena']);
	$usuario->getSession($_POST['new_correo'], $_POST['new_clave']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar perfil', 'usuarios');
	header("Location: ../../pages/perfil?id=".base64_encode($_POST['id_usuario']));
	//var_dump($_POST);
}