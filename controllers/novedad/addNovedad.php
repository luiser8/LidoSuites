<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/novedad.php';
require_once '../../models/auditoria.php';

$novedad = new Novedad();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$usuario = $_SESSION['idusuario'];//isset($_POST['id_usuario_novedad']) ? $_POST['id_usuario_novedad'] : '';
	$descripcion = isset($_POST['descripcion_novedad']) ? $_POST['descripcion_novedad'] : '';

	$novedad->addNovedad($usuario, $descripcion);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una novedad', 'novedades');
	header('Location: ../../pages/?novedades');
}