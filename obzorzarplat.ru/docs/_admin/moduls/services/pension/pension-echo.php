<style type="text/css">
<!--
.style1 {
	color: #cc0000;
	font-weight: bold;
}
-->
</style>

<?php
//���� ������
$year_today=date("Y"); //������� ���

//��� ��������
if(isset($_POST['birthday'])){
  $birthday=$_POST['birthday'];
}else{
  $birthday=0; 
  }

//����� ��������� ����������
if(isset($_POST['sum_pens'])){
  $sum_pens=$_POST['sum_pens'];
}else{
  $sum_pens=0;
}

//��������
if(isset($_POST['sal'])){
  $sal=$_POST['sal'];
}else{
  $sal=0;
}

//��������� ����
if(isset($_POST['seniority'])){
  $seniority_now=$_POST['seniority'];
  if($seniority_now>($year_today-$birthday-18)){$seniority_now=$year_today-$birthday-18;}
}else{
  $seniority_now=0;
}
 
//���
if(isset($_POST['sex'])){
  $male=$_POST['sex'];
}else{
  $male=1;
}
 
if($male==1){$male_name="�������";}else{$male_name="�������";}

//������� ������������� �����
if(isset($_POST['percent_capital'])){
  $percent_capital = $_POST['percent_capital']/100; 
  if($percent_capital>1){$percent_capital=1;}
}else{
  $percent_capital=0;
}

//��������� ���������������� ���������������� ������
$gos_finance=intval($_POST["gos_finance"]);


//�������
$eho=1;

$pension=0;
$pens_base=2562; //������� ����� ������ � 01.01.2010

if($male==1)
{
$seniority_min=25;
$age_max=60;
}
else{
$seniority_min=20;
$age_max=55;
}
$seniority_max=$age_max-18;

$pension_year=$birthday+$age_max;

if ($pension_year<=$year_today)
{$eho=0;}

switch($pension_year)
     {
          case 2008: $t=180; break;
          case 2009: $t=186; break;
          case 2010: $t=192; break;
          case 2011: $t=204; break;
          case 2012: $t=216; break;
          default: $t=228;
     }
     
     $years=$pension_year-$year_today; //�������� �� ������
     
     $seniority=$seniority_now+$years; //��������� ���� (���� �� ������ ������ + ���-�� ��� �� ������)

/********************************************************************************
������ ��������� �����
********************************************************************************/

     if ($birthday>=1967) {$percent=0.08;} else {$percent=0.14;}
     
     $i=1;
     $investment=1.1;
     $capital_year_insur=$sal*$percent*12; //��������� ���������� � ���
     $capital_insur=$capital_year_insur;
    

     while($i<=($years)) {
    	$capital_insur=$capital_insur*$investment+$capital_year_insur;
     	$i++;}
     
     $pens_insurance=$capital_insur/$t;

/********************************************************************************
������ ������������� �����
********************************************************************************/

     if ($birthday>=1967) 
     {
     $percent=0.06;
     $investment=1+$percent_capital;
     $i=1;
     $capital_year_invest=$sal*$percent*12;
     //��� ������� � ��������� ���. ����������������
     if($gos_finance==1 AND $capital_year_invest>=2000){
        if($capital_year_invest<=12000){
            $capital_year_invest=$capital_year_invest*2;
        }else{
            $capital_year_invest=$capital_year_invest+12000;
        }
     }

     $capital_invest=$capital_year_invest;

          while($i<=($years)) {
          	$capital_invest=$capital_invest*$investment+$capital_year_invest;
          	$i++;}

     $pens_investment=$capital_invest/$t;
     } 
else
{
     $pens_investment=0;
}

$pension =$pens_base + $pens_insurance + $pens_investment; 


$pension_capital=($sum_pens + $pens_insurance + $pens_investment)*$t;

//�����
?>


<a name="0"></a>

  <p align="center">���� ������� ������ � <b><?php echo($pension_year);?> ����</b> �������������� �������� <font style="color:#cc0000; font-size:14px; font-weight:bold;"><?php echo(number_format($pension,0));?> ���</b></font></p>
<div align="right"><input type="button" value="����������� ������&raquo;" class="but_pension" onClick="self.location.href='/servis/pensiya/';"></div>
<hr>

<?php
	switch($eho)
	{
		case 0: 
		
		echo('<center><font style="color:#cc0000; font-size:14px"><b>�� ��� �� ������.<br>����������� � ����������� �������!</b></font></center>');  
		break;
		
		case 1: 
		
		if ($seniority<5) {
$pension=0;
echo('�������� �������� ��� ���������� ������ �������� ������� <b>���������� ����� �� ����� 5 ���.</b> �� ������� ������ ���� ������ ����� <b>0 ���.</b>/�����<br><br>');
};

if ($birthday<=1966) {
    echo('����� � ���, ������������� �������������, �� ��� �������������� ������� ���� ����� ��������� �������� �� ��������� ����� � �������� <b>'.($sal*0.14*12).' ���.</b> �� <b>'.$year_today.'</b> ���.<br><br>');
} 
else 
{
    if($gos_finance==1){
        $nakop_4ast="� ��� ����� <b>".($capital_year_invest-$sal*0.06*12)." ���.</b> �� ��������������� ��������� ����������������;";
    }else{
        $nakop_4ast="";
    }
    echo('
    <p>�� <b>'.$year_today.'</b> ��� ������ � ��� �� ��� ������� ���� ��������:
    <ul>
    <li>������������� ����� - <b>'.$capital_year_invest.' ���.</b> �� ���, '.$nakop_4ast.'</li>
    <li>��������� ����� - <b>'.($sal*0.08*12).' ���.</b> �� ���.</li>
    </ul></p>');
};
	break;
	}

?>