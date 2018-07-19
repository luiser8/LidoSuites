<?php 
require_once '../../controllers/usuarios/check.php';
require_once '../../models/cxc.php';
require_once '../../models/apartamento.php';
require_once '../../models/mensualidad.php';
require_once '../../models/auditoria.php';

$cxc = new CXC();
$auditoria = new Auditoria();

if(!empty($_POST)){
	$id_mensualidad = isset($_POST['id_mensualidad']) ? $_POST['id_mensualidad'] : '';
	$cancelado = isset($_POST['cancelado']) ? $_POST['cancelado'] : '';
	
	$total = isset($_POST['total']) ? $_POST['total'] : '';
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

	//Obtener los datos de alicuotas de los apartamentos
	$apartamento = new Apartamento();
	$apartamentos = $apartamento->getApartamentos();
	
	$mensualidad = new Mensualidad();
	$mensualidad->procesarMensualidad($id_mensualidad);

    $monto = 0;
    $j = 0;

    foreach($apartamentos as $value=>$item){  //$i=0; $i<count($notificaciones); $i++
    	//$value = $notificaciones[$i];
    	//$valor = $item['monto'] += $total;
    	$id_apartamento = $item['id_apartamento'];
    	$id_alicuota = $item['id_alicuota'];
    	$totalCal = ($total * $item['monto']) / 100;
    	$monto = $total + $totalCal;
    	
    	$cxc->addCxc($id_apartamento, $id_alicuota, $id_mensualidad, number_format($monto, 2, '.', ''), $cancelado, $fecha);
		$auditoria->addAuditoria($_SESSION['idusuario'], 'Agregar una cuenta por cobrar', 'cxc');
		header('Location: ../../pages/?mensualidad');
    }

	//Guarda la mensualdiad generada cxc

}