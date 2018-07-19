<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/contrato.php';
require_once '../../models/apartamento.php';
require_once '../../models/propietario.php';
require_once '../../models/auditoria.php';

$contrato = new Contrato();
$auditoria = new Auditoria();
$apartamento = new Apartamento();
$propietario = new Propietario();

if(!empty($_POST)){
	$id_propietario = isset($_POST['id_propietario']) ? $_POST['id_propietario'] : '';
	$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
	$fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : '';
	$fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : '';
	$Apto = isset($_POST['Apto']) ? $_POST['Apto'] : '';

			foreach ($Apto as $value=>$item) {
				$idApto = $item['idApto'];
				$contrato->addContrato($idApto, $id_propietario, $fechaInicio, $fechaFin);
				$apartamento->contratadoApartamento($idApto);
				$propietario->contratoPropietario($cedula);
			}

		$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar un contrato', 'contrato');
		header('Location: ../../pages/?propietarios');
	}