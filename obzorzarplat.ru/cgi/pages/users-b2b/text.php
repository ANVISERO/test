<?php
$date_now=date('Y-m-d');

//просмотр
if(isset($_GET['show']) && $_GET['show']!=''){
    $show=$_GET['show'];
}else{
    $show='actual';
}

//сортировка
if(isset($_GET['order']) && $_GET['order']!=''){
    $order=$_GET['order'];
}else{
    $order='nothing';
}
?>

<link href="_adminfiles/temps/users-b2b.css" rel="stylesheet" type="text/css" />
<a href="?page=content"><img src="_adminfiles/button_back.gif" alt="Возврат" width="105" height="20" border="0"></a>&nbsp;&nbsp;<a href="?page=users-b2b-new"><img src="_adminfiles/button_addelement.gif" alt="Добавить элемент" width="150" height="20" border="0"></a>&nbsp;&nbsp;<a onClick="del.submit();"><img onMouseOver="this.style.cursor='pointer'" src="_adminfiles/button_del.gif" alt="Удалить отмеченные" width="168" height="20" border="0"></a>
<div class="users-b2b">
<ul>
    <li><a href="?page=users-b2b&show=all">Показать всех клиентов</a></li>
    <li><a href="?page=users-b2b&show=demo">Показать клиентов, у которых демо доступ</a></li>
    <li><a href="?page=users-b2b&show=end">Показать клиентов, у которых истек срок доступа</a></li>
    <li><a href="?page=users-b2b">Показать клиентов, у которых корпоративный доступ</a></li>
</ul>
<form name="del" method="post" action="?page=users-b2b-del">
<table>
<tr>
<th></th>
<th>№</th>
<th>Срок действия договора</th>
<th>Корпоративный клиент</th>
<th>Тариф</th>
<th><a href="?page=users-b2b&show=<?php echo $show;?>&order=reports">Кол-во отчетов</a></th>
</tr>


<?php
switch($order){
    case 'reports':
        $order_q=' order by reports desc';
        break;
    case 'nothing':
        $order_q='order by id desc';
}

switch($show){
    case 'actual':
        $show_q=" WHERE date_finish>='$date_now' AND levelaccess NOT in('5')";
        break;
    case 'demo':
        $show_q=" WHERE levelaccess='5'";
        break;
    case 'end':
        $show_q=" WHERE date_finish<'$date_now'";
        break;
    case 'all':
        $show_q="";
        break;
}

$result_q="select id,tarif_id,contract,date_start,date_finish,login,company,levelaccess,reports from for_users_corporat ".$show_q." ".$order_q;

$result=mysqli_query($link,$result_q);
$chet=0;
while($row=mysqli_fetch_array($result)){
    $chet++;
    $tarif=mysqli_result(mysqli_query($link,"select title from for_tarif where id='".$row["tarif_id"]."'"),0,0);
    $tr_class="";

    if($row["date_finish"]<=date("Y-m-d")){
        $tr_class="class='warning'";
    }else{
        if($row["levelaccess"]=='5'){$tr_class="class='demo'";}
    }

echo('
<tr '.$tr_class.'>
<td align="center"><input type="checkbox" name="test[]" value="'.$row["id"].'"></td>
<td><a href="?page=users-b2b-red&id='.$row["id"].'">'.$row["contract"].'</a></td>
<td><a href="?page=users-b2b-red&id='.$row["id"].'">'.date("d.m.Y",strtotime($row["date_start"])).' - '.date("d.m.Y",strtotime($row["date_finish"])).'</a></td>
<td><a href="?page=users-b2b-red&id='.$row["id"].'">'.$row["login"].' / '.stripslashes($row["company"]).'</a></td>
<td><a href="?page=users-b2b-red&id='.$row["id"].'">'.$tarif.'</a></td>
<td><a href="?page=users-b2b-red&id='.$row["id"].'">'.$row["reports"].'</a></td>
</tr>
');
}
?>
</table>
</form>
</div>