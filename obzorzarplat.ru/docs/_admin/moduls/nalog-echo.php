<?
//���� ������
$year_now=date("Y");
$sal=$_POST['sal'];
$education=$_POST['education']; // �� ���� ��������
$education_baby=$_POST['education_baby']; // �� ����������� �����
$treatment=$_POST['treatment']; // �� �������
$treatment_dear=$_POST['treatment_dear']; //�� ������� �������
$welfair=$_POST['welfair']; //���������
$house=$_POST['house']; //�� �������������
$house_sale=$_POST['house_sale']; //������� ���������

$sal=$sal/0.87; // �������� � ����
$sal_year = $sal*12; //�������� �� ���
$education_max=50000;
$education_baby_max=50000;
$treatment_max=50000;
$house_max=1000000;
$house_sale3_max=1000000; //������������ ����� �� ������� �����, ������� �� �������� ����� 3 ���

//�������� ���������
if($education>$education_max) {$education=$education_max;}
if($education_baby>$education_baby_max){$education_baby=$education_baby_max;}
if($treatment>$treatment_max)
{$treatment=$treatment_max;}
if($house>$house_max) {$house=$house_max;}
if($welfair>0.25*$sal_year) {$welfair=0.25*$sal_year;}

//------------�������-------------------//
$tax = $sal_year*0.13; //����

//------������� ���������� �������

//��������
$deduction_education=$education*0.13;
if($deduction_education>$tax) {$deduction_education=$tax;}
$deduction_education_baby=$education_baby*0.13;
if($deduction_education_baby>$tax) {$deduction_education_baby=$tax;}

//�������
$deduction_treatment=$treatment*0.13;
if($deduction_treatment>$tax) {$deduction_treatment = $tax;}

$deduction_treatment_dear=$treatment_dear*0.13;
if($deduction_treatment_dear>$tax) {$deduction_treatment_dear = $tax;}

//�������������������
$deduction_welfair=$welfair*0.13;

//������ ��� ������������� ���� ���������� ��������� �������
$deduction_social = $deduction_education + 
					$deduction_education_baby + 
					$deduction_treatment + 
					$deduction_treatment_dear + 
					$deduction_welfair;
					
if($deduction_social>$tax) {$deduction_social=$tax;}

//------������� ������������� �������

//������� �� ������������� � ������������ �����
$deduction_house=$house*0.13;
$years=ceil($deduction_house/$tax);//���������� ���, ����� ������������� ��������.�����
//������ �� ������� ��������
$deduction_house_sale=$house_sale*0.13;// ����� ��� ������� ��. �� ������ �������� �� 3 ���
$house_sale3=$house_sale;
if($house_sale3>$house_sale3_max) {$house_sale3=$house_sale3_max;}
$deduction_house_sale3=$house_sale3*0.13;// ����� ��� ������� ��. �� ������ �������� ����� 3 ���


//------������ ����������� ��������� �������
$standard=400;
$standard_baby=600;

$sal4standard=20000;
$sal4standard_baby=40000;

$month=floor($sal4standard/$sal);
if($month>12) {$month=12;}

$month_baby=floor($sal4standard_baby/$sal);
if($month_baby>12) {$month_baby=12;}

$deduction_stand=$month*$standard*0.13;
if($deduction_stand>$tax) {$deduction_stand=$tax;}

$deduction_stand_baby=$month_baby*$standard_baby*0.13;
if($deduction_stand_baby>$tax) {$deduction_stand_baby=$tax;}

//�����
?>
<input type="button" value="<< �����" class="but" onClick="self.location.href='/servis/nalog/';">
<br><br>
<? include($folder.'_admin/moduls/nalog-text.php');?>
<br><br>
<input type="button" value="<< �����" class="but" onClick="self.location.href='/servis/nalog/';">

