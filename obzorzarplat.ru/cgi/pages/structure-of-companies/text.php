<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$date_today=date("d-m-Y (H:i)");

$date_start='2010-01-01';
$date_finish='2010-12-31';
$cities='1';

$jobs_q=mysqli_query($link,"select job_id from for_survey_jobs WHERE survey_id='2'");
while ($jobs = mysqli_fetch_object($jobs_q)) {
    $jobs_id[]=$jobs->job_id;
}

$jobs_string=implode(',', $jobs_id);

$companies_q=mysqli_query($link,"select distinct company_id FROM base_company_jobs
    WHERE date like '2010%'
        AND job_id in($jobs_string)
        AND city_id in($cities) AND company_id not between 100 AND 300");

while ($company = mysqli_fetch_object($companies_q)) {
    $companies_id[]=$company->company_id;
}

$companies_string=implode(',',  array_unique($companies_id));

echo $companies_string;
//�������� ��������

//����� �������
$people_summ=0; //����� ���-�� �����
$people_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_people WHERE company_id in($companies_string)"),0,0);
$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE id in($companies_string)"),0,0);
$jobs_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_jobs WHERE id in($jobs_string)"),0,0);

$page_content='
<p class="attention">����� ����� ����������� ��������: <b>'.$comp_summ.'</b>. ����� ���������� �����������: <b>'.$people_summ.'</b></p></br>
<p>� ��������� ������� ���� �������� �� ������ ����� ��������.</p>
<p>����� ���������� ���������� ����������, ����������� � ���� ������ ������� obzorzarplat.ru: <b>'.$jobs_summ.'</b></p>
<table width="100%">
';


//������� 1
$page_content.=
'<h2>��������� ������� � ����������� �� ������������� �������� ��������</h2>
<table><tr><th>������� ��������</th><th>���������� ��������, %</th></tr>
';

$result=mysqli_query($link,"select id,name from base_capital");
$comp_summ_1=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id!='0' AND id in($companies_string)"),0,0);
while($row=mysqli_fetch_array($result)){
    $capital_id=$row['id'];
    $tab1_res[$capital_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id='$capital_id' AND id in($companies_string)"),0,0);
    if($tab1_res[$capital_id]>0){
    $tab1[$capital_id]=round((($tab1_res[$capital_id]/$comp_summ_1)*100),2);
    $capital_name[$capital_id]=$row['name'].' ('.$tab1[$capital_id].'%)';
    $page_content.='<tr><th>'.$row['name'].'</th><td>'.$tab1[$capital_id].'%</td></tr>';
    }
}

$chd_1=implode(',',$tab1);
$chl_1=implode('%|',$tab1).'%';
$chdl_1=implode('|', $capital_name);
$src1='http://chart.apis.google.com/chart?chof=gif&cht=p&chd=t:'.$chd_1.'&chl='.$chl_1.'&chs=500x200&chdl='.iconv('windows-1251','utf-8',$chdl_1);
$page_content.='
    </table>

<p align="center"><img src="'.$src1.'" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" /></p>
<p class="img_title">������� 1. ��������� ������� � ����������� �� ������������� �������� ��������</p>';

/******************************************************************************************************************************************/
//������� 2
$page_content.=
'<h2>��������� ������� � ����������� �� ������������ ��������� ������ ��������</h2>
<table><tr><th>����������� ��������� ������</th><th>���������� ��������, %</th></tr>
';

$result=mysqli_query($link,"select * from base_coefficients order by id");
$comp_summ_2=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id!='0' AND id in($companies_string)"),0,0);
while($row=mysqli_fetch_array($result)){
    $cofficient_id=$row['id'];
    $tab2_res[$cofficient_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id='$cofficient_id' AND id in($companies_string)"),0,0);
    if($tab2_res[$cofficient_id]>0){
        $tab2[$cofficient_id]=round((($tab2_res[$cofficient_id]/$comp_summ_2)*100),2);
        $coefficient_name[$cofficient_id]=$row['interval'].' ('.$tab2[$cofficient_id].'%)';
        $page_content.='<tr><th>'.$row['interval'].'</th><td>'.$tab2[$cofficient_id].'%</td></tr>';
    }
}

$chd_2=implode(',',$tab2);
$chl_2=implode('%|', $tab2).'%';
$chdl_2=implode('|', $coefficient_name);
$src2='http://chart.apis.google.com/chart?chof=gif&chco=9ACD32&cht=p&chd=t:'.$chd_2.'&chl='.$chl_2.'&chs=400x180&chdl='.iconv('windows-1251', 'utf-8', $chdl_2);
$page_content.='
    </table>
<p align="center"><img src="'.$src2.'" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" /></p>
<p class="img_title">������� 2. ��������� ������� � ����������� �� ������������ ��������� ������ ��������</p>';

/******************************************************************************************************************************************/
//������� 4
$page_content.=
'<h2>��������� ������� � ����������� �� ����� ������������ ��������</h2>
<table><tr><th>����� ������������</th><th>���������� ��������, %</th></tr>';

$result=mysqli_query($link,"select id,name from base_sphere WHERE id in(select sphere_id from base_company_sphere) order by name");
while($row=mysqli_fetch_array($result)){
    $sphere_id=$row['id'];
    $tab4_res[$sphere_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_company_sphere where sphere_id='$sphere_id' AND company_id in($companies_string)"),0,0);
    if($tab4_res[$sphere_id]>0){
        $tab4[$sphere_id]=round((($tab4_res[$sphere_id]/$comp_summ)*100),2);
        $page_content.="<tr><th>".$row['name']."</th><td>".$tab4[$sphere_id]."%</th></tr>";
    }
}

$page_content.='
    </table>
';

/******************************************************************************************************************************************/
//������� 5
$page_content.=
'
<h2>��������� ������� � ����������� �� �������� ��������</h2>
<table><tr><th>������� ��������</th><th>���������� ��������, %</th></tr>
';

$result=mysqli_query($link,"select * from base_ages");
$comp_summ_5=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id!='0' AND id in($companies_string)"),0,0);
while($row=mysqli_fetch_array($result)){
    $age_id=$row['id'];
    $tab5_res[$age_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id='$age_id' AND id in($companies_string)"),0,0);
    if($tab5_res[$age_id]>0){
        $tab5[$age_id]=round((($tab5_res[$age_id]/$comp_summ_5)*100),2);
        $age_name[]=$row['interval'].' ('.$tab5[$age_id].'%)';
        $page_content.='<tr><th>'.$row['interval'].'</th><td>'.$tab5[$age_id].'%</td></tr>';
    }
}

$chd_5=implode(',',$tab5);
$chl_5=implode('%|',$tab5).'%';
$chdl_5=implode('|', $age_name);
$src5='http://chart.apis.google.com/chart?chof=gif&cht=p&chco=6A5ACD&chd=t:'.$chd_5.'&chl='.$chl_5.'&chs=400x180&chdl='.iconv('windows-1251','utf-8',$chdl_5);
$page_content.='
    </table>
<p align="center"><img src="'.$src5.'" alt="��������� ������� � ����������� �� �������� ��������" /></p>
<p class="img_title">������� 4. ��������� ������� � ����������� �� �������� ��������</p>';

/******************************************************************************************************************************************/
//������� 6
$page_content.=
'<h2>��������� ������� � ����������� �� ������� ����� ��������</h2>
    <table><tr><th>���������� ������� � ��������</th><th>���������� ��������, %</th></tr>
';
$comp_summ_6=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE personal_id!='0' AND id in($companies_string)"),0,0);

$result=mysqli_query($link,"select id,title from base_personal");
while($row=mysqli_fetch_array($result)){
    $personal_id=$row['id'];
    $tab6_res[$personal_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where personal_id='$personal_id' AND id in($companies_string)"),0,0);
    if($tab6_res[$personal_id]>0){
        $tab6[$personal_id]=round((($tab6_res[$personal_id]/$comp_summ_6)*100),2);
        $personal_name[$personal_id]=$row['title'].' ('.$tab6[$personal_id].'%)';
        $page_content.='<tr><th>'.$row['title'].'</th><td>'.$tab6[$personal_id].'%</td></tr>';
    }
}

$chd_6=implode(',',$tab6);
$chl_6=implode('%|',$tab6).'%';
$chdl_6=implode('|',$personal_name);
$src6='http://chart.apis.google.com/chart?chof=gif&chco=4169E1|D8BFD8|ADD8E6|FFB6C1|90EE90|EEE8AA&cht=p&chd=t:'.$chd_6.'&chl='.$chl_6.'&chs=450x180&chdl='.iconv('windows-1251','utf-8',$chdl_6);
$page_content.='
    </table>
<p align="center"><img src="'.$src6.'" width="450" height="180" alt="��������� ������� � ����������� �� ������� ����� ��������" /></p>
<p class="img_title">������� 5. ��������� ������� � ����������� �� ������� ����� ��������</p>';

/******************************************************************************************************************************************/
//������� 7
$page_content.=
'<h2>��������� ������� � ����������� �� ������������ �������� ��������</h2>
    <table><tr><th>������������ ��������</th><th>���������� ��������, %</th></tr>
';
$comp_summ_7=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE evolution_id!='0' AND id in($companies_string)"),0,0);

$result=mysqli_query($link,"select id,name from base_evolution");
while($row=mysqli_fetch_array($result)){
    $evolution_id=$row['id'];
    $tab7_res[$evolution_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where evolution_id='$evolution_id' AND id in($companies_string)"),0,0);
    if($tab7_res[$evolution_id]>0){
        $tab7[$evolution_id]=round((($tab7_res[$evolution_id]/$comp_summ_7)*100),2);
        $evolution_name[$evolution_id]=$row['name'].' ('.$tab7[$evolution_id].'%)';
        $page_content.='<tr><th>'.$row['name'].'</th><td>'.$tab7[$evolution_id].'%</td></tr>';
    }
}

$chd_7=implode(',',$tab7);
$chl_7=implode('%|',$tab7).'%';
$chdl_7=implode('|',$evolution_name);
$src7='http://chart.apis.google.com/chart?chof=gif&chco=4169E1&chxr=0,0,100&cht=p&chd=t:'.$chd_7.'&chl='.$chl_7.'&chs=400x180&chdl='.iconv('windows-1251','utf-8',$chdl_7);
$page_content.='
    </table>
<p align="center"><img src="'.$src7.'" alt="��������� ������� � ����������� �� ������������ �������� ��������" /></p>
<p class="img_title">������� 6. ��������� ������� � ����������� �� ������������ �������� ��������</p>
';

echo $page_content;

?>