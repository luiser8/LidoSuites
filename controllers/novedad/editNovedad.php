<?php  

require_once '../../controllers/usuarios/check.php';
require_once '../../models/novedad.php';
require_once '../../models/auditoria.php';

$novedad = new Novedad();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$novedad->editNovedad($_POST['id_new_novedad'], $_SESSION['idusuario'], $_POST['new_descripcion_novedad']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una novedad', 'novedades');
	header('Location: ../../pages/?novedades');
}