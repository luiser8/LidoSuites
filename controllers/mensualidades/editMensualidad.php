<?php  

require_once '../../controllers/usuarios/check.php';
require_once '../../models/mensualidad.php';
require_once '../../models/auditoria.php';

$mensualidad = new Mensualidad();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$mensualidad->editMensualidad($_POST['id_new_mensualidad'], $_POST['new_mensualidad_descripcion']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar una mensualidad', 'mensualidad');
	header('Location: ../../pages/?mensualidad');
}