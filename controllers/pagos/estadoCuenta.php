<?php

require_once '../../controllers/usuarios/check.php';
require_once '../../models/pago.php';
require_once '../../lib/fpdf.php';
require_once '../../models/auditoria.php';

$cuenta = new Pago();

$result = $cuenta->getEstadoCuenta($_SESSION['idusuario']);
$soloCuenta = $cuenta->estadoDeCuenta($_SESSION['idusuario']);

for($i=0; $i<count($result); $i++){ $rs = $result[$i]; }
for($i=0; $i<count($soloCuenta); $i++){ $rs2 = $soloCuenta[$i]; }

$headingOk = array('Fecha', utf8_decode('Descripción'), 'Monto', 'Cuenta');
$pagos = array($rs['fecha'], utf8_decode($rs['descripcion']), $rs['monto'], $rs['monto']);

$pdf = new FPDF();
$pdf->Ln(20);
$pdf->AddPage();
$pdf->SetTitle("Estado de cuenta");
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(50,10, "Lido Suites");
$pdf->SetXY(120, 15);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(51, 8, "Estado de cuenta", 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(162,8, utf8_decode("Sr/Sra. {$rs['nombres']} {$rs['apellidos']}"), 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(163, 8, "Fecha: {$rs['fecha']}", 0, 0, 'R');
$pdf->Ln(20);

/*foreach ($headingOk as $heading){*/
	foreach($headingOk as $column_heading)
	{
		$pdf->Cell(54,7,$column_heading,1);
	}
/*}*/

foreach ($soloCuenta as $row){
	$pdf->SetFont('Arial','B', 10);
    $pdf->Ln();
    foreach ($row as $column){
        $pdf->Cell(54,7,$column,0);
    }
}
$pdf->Output();