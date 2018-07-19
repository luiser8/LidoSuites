<?php

require_once '../../controllers/usuarios/check.php';
require_once '../../models/cxc.php';
require_once '../../lib/fpdf.php';
require_once '../../models/auditoria.php';

date_default_timezone_set('America/Caracas');
setlocale(LC_ALL, "esp");

$id = isset($_GET['cxc']) ? $_GET['cxc'] : '';
$cxc = new CXC();

$result = $cxc->getCxcIdImpresion($id);
for($i=0; $i<count($result); $i++){ $rs = $result[$i]; }

$headingOk = array('Monto', 'Referencia', utf8_decode('Descripción'));
$pagos = array('Apartamento: ' . $rs['apto'], 'Monto: ' . $rs['montoGasto'].' Bs', utf8_decode('Por concepto de: ') . utf8_decode($rs['mes']));

$pdf = new FPDF();
$pdf->Ln(20);
$pdf->AddPage();
$pdf->SetTitle("Recibo");
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(30,10, "Lido Suites");
$pdf->SetXY( 120, 15);
$pdf->SetFont('Arial','B', 12);
$pdf->Cell( 69, 5, "Recibo: N {$rs['id_cxc']}", 0, 0, 'R');
$pdf->Ln();
$pdf->Cell( 190, 8, "Fecha: {$rs['fecha']}", 0, 0, 'R');
$pdf->Ln(12);
$pdf->SetFont('times','', 12);
$pdf->Cell(63, 7, utf8_decode("Condominio: Residencias Lido Suites"), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(39, 7, utf8_decode("Propietario: {$_SESSION['nomape']}"), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(42, 7, utf8_decode("Inmueble: {$rs['apto']}"), 0, 0, 'C');
$pdf->Ln();
//CABECERA 
$pdf->SetFont('times','', 12);
$pdf->Cell( 13, 8, "Cant", 1,'j','C');
$pdf->Cell( 116, 8,utf8_decode('Descripción'), 1,'j','C');
$pdf->Cell( 30, 8, "Precio u.", 1,'j','C');
$pdf->Cell( 30, 8, "Monto", 1,'j','C');

//IMPRESION DE DATOS DE REPUESTOS
	while($row = $result){
		$pdf->SetFont('times','', 12);
		$baseImponible=0;
		for($k=0;$k<count($row);$k++){
	 		$pdf->Ln();
	 		$pdf->Cell(13,10,$row[$k]['cantidad'],1);
			$pdf->Cell(116,10,$row[$k]['descripcionGasto'],1);

			$montoGasto = number_format($row[$k]['montoGasto'], 2, '.', '');

			$pdf->Cell(30,10,$montoGasto,1,0,'C');
			$monto=$row[$k]['cantidad']*$row[$k]['montoGasto'];
			$montoOk = number_format($monto, 2, '.', '');

			$pdf->Cell(30,10,$montoOk,1,0,'C');
			$baseImponible=$baseImponible+$monto;
			$total = $row[$k]['monto'];
			$montoAlicuota = $row[$k]['montoAlicouta'];
			$apto = $row[$k]['apto'];

		}
		$pdf->Ln();
		$pdf->Cell(159,10,"Total gastos del mes",1,0,'R');
		$baseImponibleOk = number_format($baseImponible, 2, '.', '');
		$pdf->Cell(30,10,$baseImponibleOk,1,0,'C');
		
		$pdf->Ln();
		$montoAlicuotaOk = number_format($montoAlicuota, 2, '.', '');
		$pdf->Cell(159,10,"Total a pagar {$apto} %({$montoAlicuotaOk})",1,0,'R');
		$pdf->Cell(30,10, $total,1,0,'C');
		$pdf->Ln();
	break;
	}
	$pdf->SetXY(5, 235);
	$pdf->Cell(50, 10, utf8_decode("Recibo de pago"), 0, 0, 'C');
	$pdf->Ln();
	$pdf->Cell(66, 10, utf8_decode("Mensualidad {$rs['mes']} {$rs['fecha']}"), 0, 0, 'C');

$pdf->Ln();
$pdf->Output();