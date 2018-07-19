<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/propietario.php';
require_once '../../models/auditoria.php';

$propietario = new Propietario();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$propietario->editPropietario($_POST['id_new_propietario'], $_POST['new_cedula_propietario'], 
								$_POST['new_nombres_propietario'], $_POST['new_apellidos_propietario'],
								$_POST['new_telefono_propietario'], $_POST['new_correo_propietario'], 
								$_POST['new_notas_propietario']);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Editar un propietario', 'propietarios');
	header('Location: ../../pages/config?propietarios');
}