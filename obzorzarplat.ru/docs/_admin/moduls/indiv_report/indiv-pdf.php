<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
</head>

<body>
<?
define('FPDF_FONTPATH',$_SERVER['DOCUMENT_ROOT'].'/_admin/classes/fpdf153/font/');
require($_SERVER['DOCUMENT_ROOT'].'/_admin/classes/fpdf153/fpdf.php');

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

</body>
</html>
