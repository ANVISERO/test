<?
//define('FPDF_FONTPATH',$_SERVER['DOCUMENT_ROOT'].'/_admin/classes/fpdf153/font/');
//require($_SERVER['DOCUMENT_ROOT'].'/_admin/classes/fpdf153/fpdf.php');

define('FPDF_FONTPATH','../../_admin/classes/fpdf153/font/');
require '../../_admin/classes/fpdf153/fpdf.php';                    // Require the lib. 

$folder="../../";

$pdf=new FPDF();
$pdf->AddPage();
$pdf->AddFont('a-AvanteRough-Light','','avarl.php');
$pdf->SetFont('a-AvanteRough-Light','',14);

$pdf->Write(8,'gvcrycvyuvc Персональный отчет по заработной плате на примере должности системного администратора.');
$pdf->Ln();$pdf->Ln();
$pdf->SetTextColor(255,0,0);
$pdf->Write(8,'Оценка Вашей предполагаемой заработной платы.');
$pdf->Ln();$pdf->Ln();

$pdf->SetFontSize(10);  $pdf->SetTextColor(0,0,0);
$pdf->Write(8,'Выбранная Вами должность: системный администратор'); $pdf->Ln();
$pdf->Write(8,'Сфера деятельности компании: высокие технологии'); $pdf->Ln();

//$pdf->Output($filedir.$filename,false);
$pdf->Output();
?>