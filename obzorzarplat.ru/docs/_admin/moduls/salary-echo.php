<!-- Pagination DIV -->
<div id="galleryalt" class="paginationstyle" style="width: 100%; text-align: center">
<a href="#" rel="previous"><</a> <span class="flatview"></span> <a href="#" rel="next">></a>
</div>

<?
echo('

<div style="width: 100%;">
<div class="virtualpage hidepiece">
<br>
<strong>���������� ����� �������� � ���� �����, ��������, �������, ������ � ������.</strong>
<table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="115" height="30" align="right" valign="middle">25%</td>
    <td width="130" height="30" align="center" valign="middle">�������</td>
    <td width="102" height="30" align="left" valign="middle">75%</td>
  </tr>
  <tr>
    <td height="178" colspan="3" align="center" valign="middle"><img src="/_img/graf_01_1.GIF" width="347" height="178"></td>
  </tr>
  <tr>
    <td width="115" height="30" align="right" valign="middle"><b>'.number_format($proc_25_salary_bonus,0).' �.</b></td>
    <td width="130" height="30" align="center" valign="middle"><font color="red"><b>'.number_format($sred_salary_bonus,0).' �.</b></font></td>
    <td width="102" height="30" align="left" valign="middle"><b>'.number_format($proc_75_salary_bonus,0).' �.</b></td>
  </tr>
</table>
<br>
');

$month=(date('m')-1);
if($month == "1" ){$month_ru="������";}
elseif($month == "2" ){$month_ru="�������";}
elseif($month == "3" ){$month_ru="����";}
elseif($month == "4" ){$month_ru="������";}
elseif($month == "5" ){$month_ru="���";}
elseif($month == "6" ){$month_ru="����";}
elseif($month == "7" ){$month_ru="����";}
elseif($month == "8" ){$month_ru="������";}
elseif($month == "9" ){$month_ru="��������";}
elseif($month == "10"){$month_ru="�������";}
elseif($month == "11"){$month_ru="������";}
elseif($month == "12"){$month_ru="�������";}

echo('<p>*��������� ���������� ���� ������: <font style="color:#900;">'.$month_ru.' '.date('Y').'�.</font></p>');

echo('
**��������� ����� � ���������� ����� ����� �������� <a href="/servis/otchet/" class="link_4">����� &raquo;</strong></a>
<br><br>
==============================================
<br>
<br>�� �������� ������������: <strong>25</strong> � <strong>75</strong> ���������� ���������� �����. 
<br>
<ul>
<li><strong>25 ����������</strong> � ����� �������� ���������� ����� �� ��������� ���������, ���� �������� ����� 25% �������� ������� � ������ �������.<br><br>
<li><strong>75 ����������</strong> � ����� �������� ���������� ����� �� ��������� ���������, ���� �������� ����� 75% �������� ������� � ������ �������.
<li><br>��� ������ ������������ � ���������� ������ � ���������� ����� ���������� ����� ��������������� (�� ����).
</ul>
<br><br>Copyright �  1996-2009 Ant-Management
</div>


<div class="virtualpage hidepiece">
<br>

<strong>����������� �����</strong>
<table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="115" height="30" align="right" valign="middle">25%</td>
    <td width="130" height="30" align="center" valign="middle">�������</td>
    <td width="102" height="30" align="left" valign="middle">75%</td>
  </tr>
  <tr>
    <td height="178" colspan="3" align="center" valign="middle"><img src="/_img/graf_01_1.GIF" width="347" height="178"></td>
  </tr>
  <tr>
    <td width="115" height="30" align="right" valign="middle"><b>'.number_format($proc_25_salary,0).' �.</b></td>
    <td width="130" height="30" align="center" valign="middle"><font color="red"><b>'.number_format($sred_salary,0).' �.</b></font></td>
    <td width="102" height="30" align="left" valign="middle"><b>'.number_format($proc_75_salary,0).' �.</b></td>
   </tr>
</table>
<br>
');

$month=(date('m')-1);
if($month == "1" ){$month_ru="������";}
elseif($month == "2" ){$month_ru="�������";}
elseif($month == "3" ){$month_ru="����";}
elseif($month == "4" ){$month_ru="������";}
elseif($month == "5" ){$month_ru="���";}
elseif($month == "6" ){$month_ru="����";}
elseif($month == "7" ){$month_ru="����";}
elseif($month == "8" ){$month_ru="������";}
elseif($month == "9" ){$month_ru="��������";}
elseif($month == "10"){$month_ru="�������";}
elseif($month == "11"){$month_ru="������";}
elseif($month == "12"){$month_ru="�������";}

echo('<p>*��������� ���������� ���� ������: <font style="color:#900;">'.$month_ru.' '.date('Y').'�.</font></p>');

echo('
**�������� ���������� ����� �� <font style="color:#900;">������� 2009 �.</font> ���� ����� �������� <a href="/servis/otchet/" class="link_4">�����>>></strong></a>
<br><br>
==============================================
<br>
<br>�� �������� ������������: <strong>25</strong> � <strong>75</strong> ���������� ������������ ������.
<ul>
<li><strong>25 ����������</strong> � ����� �������� ������������ ������ �� ��������� ���������, ���� �������� ����� 25% �������� �������.<br><br>
<li><strong>75 ����������</strong> � ����� �������� ������������ ������ �� ��������� ���������, ���� �������� ����� 75% �������� �������.
<li><br>��� ������ ������������ � ���������� ������ � ���������� ����� ���������� ����� ��������������� (�� ����).
</ul>
<br><br>Copyright �  1996-2009 Ant-Management
</div>




<div class="virtualpage hidepiece">
<center><h2 class="title">����������� ���������� '.$jobs.'</h2></center>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="6" title="����������� ���������� '.$jobs.'">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>������ �������� ���������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_other_name.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>�����������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_conform.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>����������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_subordinate.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>����:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_purpose.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_mission.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>�������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;'.$jobs_func.'</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top"><em><strong>���������� � ����� � ������������:</strong></em></td>
    <td valign="top">&nbsp;'.$jobs_experience.'</td>
  </tr>
</table>
</ul>
<br><strong>������ ������ ������? - ����� ��� ����� <a href="/servis/otchet/" class="link_4">������������ �����</a>!</strong>
<br>
<br>������������ ����� ������� ��� ����������� � ����� ������������� ��� ��� ����� ������. ������� ������������ �����, �� ��������� ����������:
<ul>
      <li><em>��� �������� ������� � ����� ������,</em></li>
      <li><em>������� ����������� �� ����� �������������,</em></li>
      <li><em>��������� ���������� ������ �����.</em></li>
    </ul>   
<br><a href="/servis/otchet/" class="link_4"><strong>�������� �����>>></strong></a>
<br><br>Copyright �  1996-2009 Ant-Management


</div>

');
?>

<!-- Initialize-->
<script type="text/javascript">

var gallery=new virtualpaginate({
	piececlass: "virtualpage", //class of container for each piece of content
	piececontainer: 'div', //container element type (ie: "div", "p" etc)
	pieces_per_page: 1, //Pieces of content to show per page (1=1 piece, 2=2 pieces etc)
	defaultpage: 0, //Default page selected (0=1st page, 1=2nd page etc). Persistence if enabled overrides this setting.
	persist: false //Remember last viewed page and recall it when user returns within a browser session?
})

gallery.buildpagination(["galleryalt"], ["���������� �����", "����������� �����", "����������� ����������"])

</script>