<?php
$date_today=date("d-m-Y (H:i)");

$page_url='isl/struktura/';

//�������� ��������

//����� �������
$people_summ=0; //����� ���-�� �����
$people_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_people"),0,0);
$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies"),0,0);
$jobs_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_jobs"),0,0);

$page_content='
<link href="/_css/isl/structura.css" rel="stylesheet" type="text/css">
<div class="structura">
<p class="attention">����� ����� ����������� ��������: <b>'.$comp_summ.'</b>. ����� ���������� �����������: <b>'.$people_summ.'</b></p></br>
<p>� ��������� ������� ���� �������� �� ������ ����� ��������.</p>
<p>����� ���������� ���������� ����������, ����������� � ���� ������ ������� obzorzarplat.ru: <b>'.$jobs_summ.'</b></p>
<table width="100%">
';


//������� 1
$page_content.=
'<tr>
<td>
<p class="img_title">������� 1. ��������� ������� � ����������� �� ������������� �������� ��������</p>
';

$result=mysqli_query($link,"select * from base_capital");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id!='0'"),0,0);
while($row=mysqli_fetch_array($result)){
    $capital_id=$row['id'];
    $tab[$capital_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id='$capital_id'"),0,0);
    $tab[$capital_id]=round((($tab[$capital_id]/$comp_summ)*100),2);
}

$chd1=$tab[1].','.$tab[2].','.$tab[3];
$chl1=$tab[1].'%|'.$tab[2].'%|'.$tab[3].'%';
$src1='http://chart.apis.google.com/chart?chof=gif&cht=p&chd=t:'.$chd1.'&chl='.$chl1.'&chs=500x200&chdl=%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB|%D1%81%D0%BC%D0%B5%D1%88%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D1%81%D0%BE%D0%B1%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D1%8C|%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%BD%D1%8B%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB';
$page_content.='
<img src="'.$src1.'" width="90%" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" />';
$page_content.='
</td>
';

/******************************************************************************************************************************************/
//������� 2
$page_content.=
'<td>
<p class="img_title">������� 2. ��������� ������� � ����������� �� ������������ ��������� ������ ��������</p>
';

$result=mysqli_query($link,"select * from base_coefficients");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id!='0'"),0,0);

while($row=mysqli_fetch_array($result)){
    $cofficient_id=$row['id'];
    $tab2[$cofficient_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id='$cofficient_id'"),0,0);
    $tab2[$cofficient_id]=round((($tab2[$cofficient_id]/$comp_summ)*100),2);
}

$chd2=$tab2[1].','.$tab2[2].','.$tab2[3].','.$tab2[4].','.$tab2[5].','.$tab2[6];
$chl2=$tab2[1].'%|'.$tab2[2].'%|'.$tab2[3].'%|'.$tab2[4].'%|'.$tab2[5].'%|'.$tab2[6].'%';
$src2='http://chart.apis.google.com/chart?chof=gif&chco=9ACD32&cht=p&chd=t:'.$chd2.'&chl='.$chl2.'&chs=400x180&chdl=%D0%B4%D0%BE%208%|%D0%BE%D1%82%209%%20%D0%B4%D0%BE%2016%|%D0%BE%D1%82%2016%%20%D0%B4%D0%BE%2030%|%D0%BE%D1%82%2031%%20%D0%B4%D0%BE%2050%|%D0%BE%D1%82%2051%%20%D0%B4%D0%BE%2075%|%D1%81%D0%B2%D1%8B%D1%88%D0%B5%2075%';
$page_content.='
<img src="'.$src2.'" width="90%" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" />';
$page_content.='
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 4
$page_content.=
'<tr>
<td colspan="2">
<p class="img_title">3. ��������� ������� � ����������� �� ����� ������������ ��������</p>
<table>';

$result=mysqli_query($link,"select id,name from base_sphere WHERE id in(select sphere_id from base_company_sphere) order by name");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE id in(select distinct company_id from base_company_sphere)"),0,0);

while($row=mysqli_fetch_array($result)){
    $sphere_id=$row['id'];
    $tab4[$sphere_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_company_sphere where sphere_id='$sphere_id'"),0,0);
    $tab4[$sphere_id]=round((($tab4[$sphere_id]/$comp_summ)*100),2);
    $page_content.="<tr><th>".$row['name']."</th><td>".$tab4[$sphere_id]."%</th></tr>";
}

$page_content.='
    </table>
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 5
$page_content.=
'<tr><td>
<p class="img_title">������� 4. ��������� ������� � ����������� �� �������� ��������</p>
';

$result=mysqli_query($link,"select * from base_ages");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id!='0'"),0,0);

while($row=mysqli_fetch_array($result)){
    $age_id=$row['id'];
    $tab5[$age_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id='$age_id'"),0,0);
    $tab5[$age_id]=round((($tab5[$age_id]/$comp_summ)*100),2);
}

$chd5=$tab5[1].','.$tab5[2].','.$tab5[3].','.$tab5[4];
$chl5=$tab5[1].'%|'.$tab5[2].'%|'.$tab5[3].'%|'.$tab5[4].'%';
$src5='http://chart.apis.google.com/chart?chof=gif&cht=p&chco=6A5ACD&chd=t:'.$chd5.'&chl='.$chl5.'&chs=400x180&chdl=%D0%94%D0%BE%202%20%D0%BB%D0%B5%D1%82|%D0%9E%D1%82%202%20%D0%B4%D0%BE%205%20%D0%BB%D0%B5%D1%82|%D0%9E%D1%82%205%20%D0%B4%D0%BE%2010%20%D0%BB%D0%B5%D1%82|%D0%91%D0%BE%D0%BB%D0%B5%D0%B5%2010%20%D0%BB%D0%B5%D1%82';
$page_content.='
<img src="'.$src5.'" width="90%" alt="��������� ������� � ����������� �� �������� ��������" />';
$page_content.='
</td>
';

/******************************************************************************************************************************************/
//������� 6
$page_content.=
'<td>
<p class="img_title">������� 5. ��������� ������� � ����������� �� ������� ����� ��������</p>
';

$result=mysqli_query($link,"select * from base_personal");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE personal_id!='0'"),0,0);

while($row=mysqli_fetch_array($result)){
    $personal_id=$row['id'];
    $tab6[$personal_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where personal_id='$personal_id'"),0,0);
    $tab6[$personal_id]=round((($tab6[$personal_id]/$comp_summ)*100),2);
}

$chd6=$tab6[1].','.$tab6[2].','.$tab6[3].','.$tab6[4].','.$tab6[5].','.$tab6[6];
$chl6=$tab6[1].'%|'.$tab6[2].'%|'.$tab6[3].'%|'.$tab6[4].'%|'.$tab6[5].'%|'.$tab6[6].'%';
$src6='http://chart.apis.google.com/chart?chof=gif&chco=4169E1|D8BFD8|ADD8E6|FFB6C1|90EE90|EEE8AA&cht=p&chd=t:'.$chd6.'&chl='.$chl6.'&chs=430x180&chdl=%D0%B4%D0%BE%2050%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%2051%20%D0%B4%D0%BE%20100%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20101%20%D0%B4%D0%BE%20200%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20201%20%D0%B4%D0%BE%20500%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20501%20%D0%B4%D0%BE%201000%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%B1%D0%BE%D0%BB%D0%B5%D0%B5%201000%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA';
$page_content.='
<img src="'.$src6.'" width="90%" alt="��������� ������� � ����������� �� ������� ����� ��������" />';
$page_content.='
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 7
$page_content.=
'<tr><td>
<p class="img_title">������� 6. ��������� ������� � ����������� �� ������������ �������� ��������</p>
';

$result=mysqli_query($link,"select * from base_evolution");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE evolution_id!='0'"),0,0);

while($row=mysqli_fetch_array($result)){
    $evolution_id=$row['id'];
    $tab7[$evolution_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where evolution_id='$evolution_id'"),0,0);
    $tab7[$evolution_id]=round((($tab7[$evolution_id]/$comp_summ)*100),2);
}

$chd7=$tab7[1].','.$tab7[2].','.$tab7[3].','.$tab7[4];
$chl7=$tab7[1].'%|'.$tab7[2].'%|'.$tab7[3].'%|'.$tab7[4].'%';
$src7='http://chart.apis.google.com/chart?chof=gif&chco=4169E1&chxr=0,0,100&cht=p&chd=t:'.$chd7.'&chl='.$chl7.'&chs=400x180&chdl=%D0%A0%D0%BE%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5|%D0%A0%D0%BE%D1%81%D1%82|%D0%97%D1%80%D0%B5%D0%BB%D0%BE%D1%81%D1%82%D1%8C|%D0%A3%D0%B3%D0%B0%D1%81%D0%B0%D0%BD%D0%B8%D0%B5';
$page_content.='
<img src="'.$src7.'" width="90%" alt="��������� ������� � ����������� �� ������������ �������� ��������" />
</td>
<td></td>
</tr>
</table>
';

//������� �� ���
//�������� ��������

//����� �������
$people_summ=0; //����� ���-�� �����
$people_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_people WHERE region_id='1'"),0,0);
$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE region_id='1'"),0,0);
$jobs_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_jobs WHERE region_id='1'"),0,0);

$page_content.='
    <h1>��������� ������� �� �����-����������</h1>
<p class="attention">����� ����� ����������� �������� � �����-����������: <b>'.$comp_summ.'</b>. ����� ���������� ����������� � �����-����������: <b>'.$people_summ.'</b></p></br>
<p>� ��������� ������� ���� �������� �� ������ ����� ��������.</p>
<table width="100%">
';


//������� 1
$page_content.=
'<tr>
<td>
<p class="img_title">������� 1. ��������� ������� � ����������� �� ������������� �������� ��������</p>
';

$result=mysqli_query($link,"select id,name from base_capital");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id!='0' AND region_id='1'"),0,0);

while($row=mysqli_fetch_array($result)){
    $capital_id=$row['id'];
    $tab[$capital_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE capital_id='$capital_id' AND region_id='1'"),0,0);
    $tab[$capital_id]=round((($tab[$capital_id]/$comp_summ)*100),2);
}

$chd1=$tab[1].','.$tab[2].','.$tab[3];
$chl1=$tab[1].'%|'.$tab[2].'%|'.$tab[3].'%';
$src1='http://chart.apis.google.com/chart?chof=gif&cht=p&chd=t:'.$chd1.'&chl='.$chl1.'&chs=500x200&chdl=%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB|%D1%81%D0%BC%D0%B5%D1%88%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D1%81%D0%BE%D0%B1%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D1%8C|%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%BD%D1%8B%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB';
$page_content.='
<img src="'.$src1.'" width="90%" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" />';
$page_content.='
</td>
';

/******************************************************************************************************************************************/
//������� 2
$page_content.=
'<td>
<p class="img_title">������� 2. ��������� ������� � ����������� �� ������������ ��������� ������ ��������</p>
';

$result=mysqli_query($link,"select * from base_coefficients");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id!='0' AND region_id='1'"),0,0);
while($row=mysqli_fetch_array($result)){
    $cofficient_id=$row['id'];
    $tab2[$cofficient_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE coeff_id='$cofficient_id' AND region_id='1'"),0,0);
    $tab2[$cofficient_id]=round((($tab2[$cofficient_id]/$comp_summ)*100),2);
}

$chd2=$tab2[1].','.$tab2[2].','.$tab2[3].','.$tab2[4].','.$tab2[5].','.$tab2[6];
$chl2=$tab2[1].'%|'.$tab2[2].'%|'.$tab2[3].'%|'.$tab2[4].'%|'.$tab2[5].'%|'.$tab2[6].'%';
$src2='http://chart.apis.google.com/chart?chof=gif&chco=9ACD32&cht=p&chd=t:'.$chd2.'&chl='.$chl2.'&chs=400x180&chdl=%D0%B4%D0%BE%208%|%D0%BE%D1%82%209%%20%D0%B4%D0%BE%2016%|%D0%BE%D1%82%2016%%20%D0%B4%D0%BE%2030%|%D0%BE%D1%82%2031%%20%D0%B4%D0%BE%2050%|%D0%BE%D1%82%2051%%20%D0%B4%D0%BE%2075%|%D1%81%D0%B2%D1%8B%D1%88%D0%B5%2075%';
$page_content.='
<img src="'.$src2.'" width="90%" alt="��������� ������� � ����������� �� ������������ ��������� ������ ��������" />';
$page_content.='
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 4
$page_content.=
'<tr>
<td colspan="2">
<p class="img_title">3. ��������� ������� � ����������� �� ����� ������������ ��������</p>
<table>';

$result=mysqli_query($link,"select id,name from base_sphere WHERE id in(select sphere_id from base_company_sphere) order by name");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE id in(select distinct company_id from base_company_sphere) AND region_id='1'"),0,0);
while($row=mysqli_fetch_array($result)){
    $sphere_id=$row['id'];
    $tab4[$sphere_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_company_sphere where sphere_id='$sphere_id' and company_id in(select id from base_companies WHERE region_id='1')"),0,0);
    $tab4[$sphere_id]=round((($tab4[$sphere_id]/$comp_summ)*100),2);
    $page_content.="<tr><th>".$row['name']."</th><td>".$tab4[$sphere_id]."%</th></tr>";
}

$page_content.='
    </table>
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 5
$page_content.=
'<tr><td>
<p class="img_title">������� 4. ��������� ������� � ����������� �� �������� ��������</p>
';

$result=mysqli_query($link,"select * from base_ages");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id!='0' AND region_id='1'"),0,0);
while($row=mysqli_fetch_array($result)){
    $age_id=$row['id'];
    $tab5[$age_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE age_id='$age_id'  AND region_id='1'"),0,0);
    $tab5[$age_id]=round((($tab5[$age_id]/$comp_summ)*100),2);
}

$chd5=$tab5[1].','.$tab5[2].','.$tab5[3].','.$tab5[4];
$chl5=$tab5[1].'%|'.$tab5[2].'%|'.$tab5[3].'%|'.$tab5[4].'%';
$src5='http://chart.apis.google.com/chart?chof=gif&cht=p&chco=6A5ACD&chd=t:'.$chd5.'&chl='.$chl5.'&chs=400x180&chdl=%D0%94%D0%BE%202%20%D0%BB%D0%B5%D1%82|%D0%9E%D1%82%202%20%D0%B4%D0%BE%205%20%D0%BB%D0%B5%D1%82|%D0%9E%D1%82%205%20%D0%B4%D0%BE%2010%20%D0%BB%D0%B5%D1%82|%D0%91%D0%BE%D0%BB%D0%B5%D0%B5%2010%20%D0%BB%D0%B5%D1%82';
$page_content.='
<img src="'.$src5.'" width="90%" alt="��������� ������� � ����������� �� �������� ��������" />';
$page_content.='
</td>
';

/******************************************************************************************************************************************/
//������� 6
$page_content.=
'<td>
<p class="img_title">������� 5. ��������� ������� � ����������� �� ������� ����� ��������</p>
';

$result=mysqli_query($link,"select * from base_personal");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE personal_id!='0' AND region_id='1'"),0,0);
while($row=mysqli_fetch_array($result)){
    $personal_id=$row['id'];
    $tab6[$personal_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where personal_id='$personal_id'  AND region_id='1'"),0,0);
    $tab6[$personal_id]=round((($tab6[$personal_id]/$comp_summ)*100),2);
}

$chd6=$tab6[1].','.$tab6[2].','.$tab6[3].','.$tab6[4].','.$tab6[5].','.$tab6[6];
$chl6=$tab6[1].'%|'.$tab6[2].'%|'.$tab6[3].'%|'.$tab6[4].'%|'.$tab6[5].'%|'.$tab6[6].'%';
$src6='http://chart.apis.google.com/chart?chof=gif&chco=4169E1|D8BFD8|ADD8E6|FFB6C1|90EE90|EEE8AA&cht=p&chd=t:'.$chd6.'&chl='.$chl6.'&chs=430x180&chdl=%D0%B4%D0%BE%2050%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%2051%20%D0%B4%D0%BE%20100%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20101%20%D0%B4%D0%BE%20200%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20201%20%D0%B4%D0%BE%20500%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%BE%D1%82%20501%20%D0%B4%D0%BE%201000%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA|%D0%B1%D0%BE%D0%BB%D0%B5%D0%B5%201000%20%D1%87%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA';
$page_content.='
<img src="'.$src6.'" width="90%" alt="��������� ������� � ����������� �� ������� ����� ��������" />';
$page_content.='
</td>
</tr>
';

/******************************************************************************************************************************************/
//������� 7
$page_content.=
'<tr><td>
<p class="img_title">������� 6. ��������� ������� � ����������� �� ������������ �������� ��������</p>
';

$result=mysqli_query($link,"select * from base_evolution");
$comp_summ=$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies WHERE evolution_id!='0' AND region_id='1'"),0,0);
while($row=mysqli_fetch_array($result)){
    $evolution_id=$row['id'];
    $tab7[$evolution_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies where evolution_id='$evolution_id'  AND region_id='1'"),0,0);
    $tab7[$evolution_id]=round((($tab7[$evolution_id]/$comp_summ)*100),2);
}

$chd7=$tab7[1].','.$tab7[2].','.$tab7[3].','.$tab7[4];
$chl7=$tab7[1].'%|'.$tab7[2].'%|'.$tab7[3].'%|'.$tab7[4].'%';
$src7='http://chart.apis.google.com/chart?chof=gif&chco=4169E1&chxr=0,0,100&cht=p&chd=t:'.$chd7.'&chl='.$chl7.'&chs=400x180&chdl=%D0%A0%D0%BE%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D0%B5|%D0%A0%D0%BE%D1%81%D1%82|%D0%97%D1%80%D0%B5%D0%BB%D0%BE%D1%81%D1%82%D1%8C|%D0%A3%D0%B3%D0%B0%D1%81%D0%B0%D0%BD%D0%B8%D0%B5';
$page_content.='
<img src="'.$src7.'" width="90%" alt="��������� ������� � ����������� �� ������������ �������� ��������" />
</td>
<td></td>
</tr>
</table>
</div>
';

//���������� �����
$fullpath='../'.$page_url.'_vars/content.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $page_content);
fclose ($file);

?>
���� � ��������: <b><?=$page_url;?></b><br><br>
�������� �������!