<?php
$order_url=$_GET['id'];
$root=$_SERVER['DOCUMENT_ROOT'];

$test_url=mysqli_num_rows(mysqli_query($link,"select id from zarplata_banks.for_users_corporat_scoring_reports where url='$order_url'"));

if($test_url<>0){
    $order_id=mysqli_result(mysqli_query($link,"select id from zarplata_banks.for_users_corporat_scoring_reports where url='$order_url'"),0,0);
    $user_id=mysqli_result(mysqli_query($link,"select user_id from zarplata_banks.for_users_corporat_scoring_reports where url='$order_url'"),0,0);
    $order_html=$root.'/_report/user'.$user_id.'/report_'.$order_id.'.txt';
?>
<p class="no_print" align="right">
<a href="/archive/"><img src="/_img/menu_icons/archive2.png" title="�����" border="0" alt="�����" /></a>
<a href="javascript:window.print();"><img src="/_img/menu_icons/fileprint_mini.png" title="������" border="0" alt="������" /></a>
<a href="javascript:window.close();"><img src="/_img/menu_icons/close_red_mini.png" title="�������" border="0" alt="�������" /></a>
</p>
<?php
    include($order_html);
}else{
    echo('<p>����� ����� �� ����������! �������� ���� ���������.</p>');
}
?>