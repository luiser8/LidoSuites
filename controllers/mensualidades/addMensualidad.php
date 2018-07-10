<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/mensualidad.php';
require_once '../../models/detalle_mensualidad.php';
require_once '../../models/auditoria.php';

$mensualidad = new Mensualidad();
$detalle = new Detalle();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
	$total = isset($_POST['total']) ? $_POST['total'] : '';
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
	$gasto = isset($_POST['gastos']) ? $_POST['gastos'] : '';
	// $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

	$mensualidad->addMensualidad($descripcion, $total, $fecha);
	$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una mensualidad', 'mensualidad');

	//Guardar los detalles 
	if($mensualidad->getMensualidadesOk()[0]['id_mensualidad'] != ''){
			$id_mensualidad = $mensualidad->getMensualidadesOk()[0]['id_mensualidad'];
				foreach ($gasto as $value=>$item) {
					$id_gasto = $item['idGasto'];
					$cantidad = $item['Cantidad'];
					$detalle->addDetalle($id_mensualidad, $id_gasto, $cantidad, $fecha);
				}
		}

	header('Location: ../../pages/?mensualidad');
}