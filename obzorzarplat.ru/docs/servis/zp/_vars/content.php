<link type="text/css" href="/_css/express_report/salary.css" rel="stylesheet" />
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />

<div class="salary">
    <div class="img_left"><img src="/_img/services/express/express128x128.png" width="128" height="128" alt="�������� �����"></div>
    <div class="descript">
    <p>������� ���������� ����� ��� ��������� ���������� � ������� ������ (�����-����������, ������, ���������, ������������� � ������)
        ����������� �� ������ ������ ������� obzorzarplat.ru</p>
    <p>����������, ��� �� ���������� ������ <b>����������� ������</b>, ���������� ���� ��������������� �� ��������-�������� ������������
        (��������� � �������� ����� ������ ����� ��������� <a href="/isl/metod/" class="lk2">����� &raquo;</a>)</p>
    </div>
    <div class="clear"></div>
    <p align="right"><i>������� 1. ������� ���������� ����� � 2010 ���� �� ������ ������� <b>obzorzarplat.ru</b></i>.</p>
<table width="100%" border="0" class="salary_data">
  <tr>
    <th></th>
    <th>������� �������� � <em>������ (���/���.)</em></th>
    <th>������� �������� � <em>�����-���������� (���/���.)</em></th>
  </tr>
  <tr>
    <td>2010 ���</td>
    <td align="center"><b>26 118 ������</b></td>
    <td align="center"><b>28 899 ������</b></td>
  </tr>
  <tr>
</table>
<br>
<h2>������ ���������� ���� �� ����������</h2>
<?php
$news_q=mysqli_query($link,"SELECT id,zag,date FROM for_news WHERE status='1' AND category_id='4' order by date desc limit 5");
    while ($news = mysqli_fetch_object($news_q)) {
        echo '<h3>'.date('d.m.Y',  strtotime($news->date)).' '.$news->zag.'</h3>';
        if(file_exists($folder.'_admin/elements/news/'.$news->id.'_an.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news->id.'_an.txt'));
        }
        echo '<p align="right"><a href="/isl/salary/?id='.$news->id.'">���������</a></p>';

    }
    ?>
<h2>������������ �������� ������ � ���������� �����</h2>
<p>���������� ����� �� ���������� �� ������ ���������� ����, ������ ����������� ������, ��������� � �����. � ������ �� �������� ��������
    ���������� ����� � ������������ ������, � ����� �������� ���������.</p>

<?php
include($folder.'_admin/moduls/express_report/salary-form.php');
?>
</div>