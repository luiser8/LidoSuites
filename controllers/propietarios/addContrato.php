<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/contrato.php';
require_once '../../models/apartamento.php';
require_once '../../models/auditoria.php';

$contrato = new Contrato();
$auditoria = new Auditoria();
$apartamento = new Apartamento();

if(!empty($_POST)){
	$id_propietario = isset($_POST['id_propietario']) ? $_POST['id_propietario'] : '';
	$fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : '';
	$fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : '';
	$Apto = isset($_POST['Apto']) ? $_POST['Apto'] : '';

			foreach ($Apto as $value=>$item) {
				$idApto = $item['idApto'];
				$Nombre = $item['Nombre'];
				$contrato->addContrato($idApto, $id_propietario, $fechaInicio, $fechaFin);
				$apartamento->contratadoApartamento($idApto);
			}
		
		$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un contrato', 'contrato');
		header('Location: ../../pages/?propietarios');
	}