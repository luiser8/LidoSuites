<?php 

require_once '../../controllers/usuarios/check.php';
require_once '../../models/usuario.php';
require_once '../../models/auditoria.php';

$auditoria = new Auditoria();
$usuario = new Usuario();

$usuario->deleteUsuario($_GET['id']);
$auditoria->addAuditoria($_SESSION['idusuario'], 'Eliminar un usuario', 'usuarios');
header('Location: ../../pages/config?usuarios');