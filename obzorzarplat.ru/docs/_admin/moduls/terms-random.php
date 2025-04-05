<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$col_terms=mysqli_result(mysqli_query($link,"select COUNT(*) from for_terms"),0,0)-1;
$term_random_num=rand(0,$col_terms);

$term_name=mysqli_result(mysqli_query($link,"select * from for_terms"),$term_random_num,1);
$str=substr($term_name,0,1);
if($str=='0' or $str=='1' or $str=='2' or $str=='3' or $str=='4' or $str=='5' or $str=='6' or $str=='7' or $str=='8' or $str=='9')
{
$str='0-9';
}
$term_value=substr(mysqli_result(mysqli_query($link,"select * from for_terms"),$term_random_num,2),0,50);
?>
<a href="/glos/?str=<?=$str;?>" class="terms"><?=$term_name;?></a>
<br><br>
<?=$term_value;?><a href="/glos/?str=<?=$str;?>">...</a>