<?php
$folder="../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$tarif_id=intval($_GET['tarifId']);
$user_id=intval($_GET['userId']);
?>

<p>Отчеты, входящие в тариф:</p>

<ul>

<?php
$reports_q=mysqli_query($link,"select * from for_report_type where id in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')");
while($row=mysqli_fetch_array($reports_q))
{
    echo("<li>".$row["title"]."</li>");
}
?>
</ul>

<p>Дополнительные отчеты:</p>
<ul>
<?php
$reports_q=mysqli_query($link,"select * from for_report_type where id not in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')");
while($row=mysqli_fetch_array($reports_q))
{
    $chk="";
    echo($_COOKIE['user_id']);
    $users_report_types=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_report_type where user_id='".$user_id."' AND report_type_id='".$row["id"]."'"));
    if($users_report_types!==0){$chk="checked";}
    echo("<li><input type='checkbox' id='report_type_".$row["id"]."' value='".$row["id"]."' name=report_type[] ".$chk.">
            <label for=id='report_type_".$row["id"]."'>".$row["title"]."</label></li>");
}
  ?>
</ul>