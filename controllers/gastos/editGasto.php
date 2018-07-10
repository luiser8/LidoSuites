<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/gasto.php';
require_once '../../models/auditoria.php';

$gasto = new Gasto();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$id_ut = isset($_POST['new_id_utGasto']) ? $_POST['new_id_utGasto'] : 'NULL';
	$numeroUts = isset($_POST['new_numeroUts']) ? $_POST['new_numeroUts'] : 'NULL';
	$gasto->editGasto($_POST['new_id_gasto'], $id_ut, $_POST['new_descripcion_gasto'], $_POST['new_montoGasto'], $_POST['new_tipoGasto'],$numeroUts);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un gasto', 'gastos');
	header('Location: ../../pages/?gastos');
}