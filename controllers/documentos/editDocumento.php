<?php  
require_once '../../controllers/usuarios/check.php';
require_once '../../models/apartamento.php';
require_once '../../models/auditoria.php';

$apartamento = new Apartamento();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$apartamento->editApartamento($_POST['id_new_apartamento'], $_POST['new_alicuota_apartamento'], $_POST['new_nombre_apartamento'], $_POST['new_saldo_apartamento']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un apartamento', 'apartamentos');
	header('Location: ../../pages/?apartamentos');
	//var_dump($_POST);
}