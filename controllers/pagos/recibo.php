<?php

require_once '../../controllers/usuarios/check.php';
require_once '../../models/pago.php';
require_once '../../lib/fpdf.php';
require_once '../../models/auditoria.php';


$id = isset($_GET['pago']) ? $_GET['pago'] : '';
$pago = new Pago();

$result = $pago->getPagosId($id);
for($i=0; $i<count($result); $i++){ $rs = $result[$i]; }

$headingOk = array('Monto', 'Referencia', utf8_decode('Descripción'));
$pagos = array('Apartamento: ' . $rs['apartamento'], 'Monto: ' . $rs['monto'].' Bs', 'Referencia: ' . $rs['referencia'], utf8_decode('Por concepto de: ') . utf8_decode($rs['descripcion']));

$pdf = new FPDF();
$pdf->Ln(20);
$pdf->AddPage();
$pdf->SetTitle("Recibo");
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(30,10, "Lido Suites");
$pdf->SetXY( 120, 15);
$pdf->SetFont('Arial','B', 12);
$pdf->Cell( 67, 5, "Recibo: N {$rs['id_pago']}", 0, 0, 'R');
$pdf->Ln();
$pdf->Cell( 190, 8, "Fecha: {$rs['fecha']}", 0, 0, 'R');
$pdf->Ln();
/*foreach ($headingOk as $heading){*/
	// foreach($headingOk as $column_heading)
	// {
	// 	$pdf->Cell(40,12,$column_heading,1);
	// }
/*}*/

foreach ($result as $row){
	$pdf->SetFont('Arial','B', 12);
    $pdf->Ln();
    foreach ($pagos as $column){
        $pdf->Cell(40,8,$column,0);$pdf->Ln();
    }
}
$pdf->Ln(20);
$pdf->Cell(30,10, utf8_decode("Recibí conforme"));
$pdf->Ln();
$pdf->Cell(30,10, "___________________");
$pdf->Ln();
$pdf->Cell(50,10, utf8_decode("Sr/Sra. {$rs['nombres']} {$rs['apellidos']}"));
$pdf->Output();