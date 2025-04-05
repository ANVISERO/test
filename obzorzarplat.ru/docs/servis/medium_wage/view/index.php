<? 
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$title_graf=implode("", file('_vars/zag_graf.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$css=$folder.'_admin/templet/'.$temp.'/css.css';
$content='_vars/content.txt';

include($folder.'_admin/sql/mysql.php');


$id=$_GET["id"];
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);


$job_name=mysqli_result(mysqli_query($link,"select job_name from for_salary where id='$id'"),0,0);
$tit="—редн€€ заработна€ плата - ".$job_name;

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>