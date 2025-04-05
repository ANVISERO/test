<?php
//���� ������
$year_now=date("Y");
$sal=intval($_POST['sal']);
$sal_val=$_POST['sal_val'];
if($sal_val=="mnth"){$sal_year=12*$sal;}
elseif($sal_val=="year"){$sal_year=$sal;}
$tax = $sal_year*0.13; //����

$deduction_social=0;
$deduction_social_lim=0;

if($sal==0){echo('�� �� ������� ���������� ����� ��� ��������');}
else{

$education=intval($_POST['education']); // �� ���� ��������
$education_baby=intval($_POST['education_baby']); // �� ����������� �����
$treatment=intval($_POST['treatment']); // �� �������
$treatment_dear=intval($_POST['treatment_dear']); //�� ������� �������
$welfair=intval($_POST['welfair']); //���������
$pension=intval($_POST['pension']); //���������� ������
$insurance=intval($_POST['insurance']); //��������� ������

$education_max=120000;
$education_baby_max=50000;
$treatment_max=120000;
$pension_max=120000;
$insurance_max=120000;
$deduction_social_lim_max=120000;//����������� �� ������������ ���������� �������

//�������� ���������
if($education>$education_max){$education=$education_max;}
if($education_baby>$education_baby_max){$education_baby=$education_baby_max;}
if($treatment>$treatment_max){$treatment=$treatment_max;}
if($pension>$pension_max) {$pension=$pension_max;}
if($insurance>$insurance_max) {$insurance=$insurance_max;}
if($welfair>0.25*$sal_year) {$welfair=0.25*$sal_year;}

//------------�������-------------------//
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

//���������� ������
$deduction_pension=$pension*0.13;
if($deduction_pension>$tax) {$deduction_pension = $tax;}

//��������� ������
$deduction_insurance=$insurance*0.13;
if($deduction_insurance>$tax) {$deduction_insurance = $tax;}

$deduction_social_lim=$deduction_education+$deduction_treatment +$deduction_welfair+$deduction_insurance+$deduction_pension;
if($deduction_social_lim>$deduction_social_lim_max*0.13) {$deduction_social_lim=$deduction_social_lim_max*0.13;}
//������ ��� ������������� ���� ���������� ��������� �������
$deduction_social = $deduction_social_lim +$deduction_education_baby +$deduction_treatment_dear;
if($deduction_social>$tax) {$deduction_social=$tax;}

?>
<p align="center">����, ���������� � <?php echo($year_now);?> ���� ���������� <b><?php echo(number_format($tax,0,',',' '));?> ���.</b></p>
<p>����� �������, D� ������� ��������� ���������������� ���� � ������� �� ������� ��������� �����</p>
  <?php
  if($deduction_social!=='0' AND $deduction_social!==''){
      echo('<h3>���������� ��������� ������:</h3><ul>');

    if($education!==0 AND $education!==''){echo('<li><b>'.number_format($deduction_education,0,',',' ').' ���.</b> � �� ���� ��������;</li>');}
    if($education_baby!==0 AND $education_baby!==''){echo('<li><b>'.number_format($deduction_education_baby,0,',',' ').' ���.</b> � �� �������� ������ �������, �������� �� ����������� ��� 24 ���;</li>');}
    if($treatment!==0 AND $treatment!==''){echo('<li><b>'.number_format($deduction_treatment,0,',',' ').' ���.</b> � �� ������� � ���� ����;</li>');}
    if($treatment_dear!==0 AND $treatment_dear!==''){echo('<li><b>'.number_format($deduction_treatment_dear,0,',',' ').' ���.</b> � �� ������������� ������� � ���� ����;</li>');}
    if($welfair!==0 AND $welfair!==''){echo('<li><b>'.number_format($deduction_welfair,0,',',' ').' ���.</b> - ��� ������������ ����� �� ����������������� ����;</li>');}
    if($pension!==0 AND $pension!==''){echo('<li><b>'.number_format($deduction_pension,0,',',' ').' ���.</b> - ��� ������������ ����� �� ���������� ������;</li>');}
    if($insurance!==0 AND $insurance!==''){echo('<li><b>'.number_format($deduction_insurance,0,',',' ').' ���.</b> - ��� ������������ ����� �� ��������� ������;</li>');}

echo('</ul>
<p>���� �� ������������ ��� ��������� ���� ���������� ��������� �������, ����� �����, ������� ����� ��� ��������� �� �������
�������� <b>'.round($deduction_social).' ���.</b></p>');
  }//end if, ���������� ������


//������������� ������
$house=intval($_POST['house']); //�� �������������
$house_sale=intval($_POST['house_sale']); //������� ���������

$house_max=2000000;
$house_sale3_max=1000000; //������������ ����� �� ������� �����, ������� �� �������� ����� 3 ���

if($house>$house_max) {$house=$house_max;}

//������� �� ������������� � ������������ �����
$deduction_house=$house*0.13;
$years=ceil($deduction_house/$tax);//���������� ���, ����� ������������� ��������.�����
//������ �� ������� ��������
$deduction_house_sale=$house_sale*0.13;// ����� ��� ������� ��. �� ������ �������� �� 3 ���
$house_sale3=$house_sale;
if($house_sale3>$house_sale3_max) {$house_sale3=$house_sale3_max;}
$deduction_house_sale3=$house_sale3*0.13;// ����� ��� ������� ��. �� ������ �������� ����� 3 ���

  if($deduction_house!=='0' AND $deduction_house!==''){
      echo('<h3>������������� ��������� ������:</h3><ul>');
      echo('<p>����� ������ �������������� ���������� ������, �� ����� ��������� <b>2 000 000 ���.</b> ���� ����� ����� ���� �������
          ������ ���� ���. ���� � ��������� ������� (���� ���) �� �� ����� ���� ����������� ���������, �� ������� ����� ������ �����������
          �� ����������� ������� �� ������� �� �������������.
<ul>');
if($house!==0 AND $house!==''){echo('<li><b>'.number_format($deduction_house,0,',',' ').' ���.</b> � �����, ������� �� ������ ������� �� ������� ��� ������� ���������.</li>
<li><b>'.round($years).'</b> � ���������� ���, �� ������� ��� ����� ��������� ��� �����.</li>');}
      echo('</ul>');
      if($house_sale!==0 AND $house_sale!==''){
echo('<p>������������� ��������� ����� ��� ��������� ������ �� <em>�������</em> ���������.</p>
');
echo('<ul>');
echo('<li><b>'.number_format($deduction_house_sale,0,',',' ').' ���.</b> � �����, ������� �� ������ ������� �� �������
        ��� ������� ���������, ������� �� ������� <em>����� 3-� ���.</em></li>
<li><b>'.number_format($deduction_house_sale3,0,',',' ').' ���.</b> � �����, ������� �� ������ ������� �� ������� ��� ������� ���������, ������� �� �������
              <em>����� 3-� ���.</em></li>
</ul>');
}
  }//end if, ������������� ������

}//end else ?>