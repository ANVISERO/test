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

$pdf->Write(8,'gvcrycvyuvc ������������ ����� �� ���������� ����� �� ������� ��������� ���������� ��������������.');
$pdf->Ln();$pdf->Ln();
$pdf->SetTextColor(255,0,0);
$pdf->Write(8,'������ ����� �������������� ���������� �����.');
$pdf->Ln();$pdf->Ln();

$pdf->SetFontSize(10);  $pdf->SetTextColor(0,0,0);
$pdf->Write(8,'��������� ���� ���������: ��������� �������������'); $pdf->Ln();
$pdf->Write(8,'����� ������������ ��������: ������� ����������'); $pdf->Ln();

//$pdf->Output($filedir.$filename,false);
$pdf->Output();
?>