<?php
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

if(isset($_POST['buk'])){$buk_id=intval($_POST['buk']);}else{$buk_id=0;}
if(isset($_POST['jtype_id'])){$jtype_id=intval($_POST['jtype_id']);}else{$jtype_id=0;}

$buk = array(
2 => 'А',3 => 'Б',4 => 'В',
			5 => 'Г',
			6 => 'Д',
			7 => 'Е',
			8 => 'Ё',
			9 => 'Ж',
			10 => 'З',
			11 => 'И',
			12 => 'Й',
			13 => 'К',
			14 => 'Л',
			15 => 'М',
			16 => 'Н',
			17 => 'О',
			18 => 'П',
			19 => 'Р',
			20 => 'С',
			21 => 'Т',
			22 => 'У',
			23 => 'Ф',
			24 => 'Х',
			25 => 'Ц',
			26 => 'Ч',
			27 => 'Ш',
			28 => 'Щ',
			29 => 'Э',
			30 => 'Ю',
			31 => 'Я'
			)
?>

<form name="del" method="post" action="?page=jobs-del">
<table width="100%">
<tr>
<td height="20" valign="top">&nbsp;</td>
<td valign="top">&nbsp;&nbsp;<strong>ID</strong></td>
<td valign="top">&nbsp;&nbsp;<strong>Наименование</strong></td>
<td valign="top">Должностная группа</td>
</tr>


<?php
if($buk_id!=0){
    $query="select id,name,jobs_group_id from base_jobs WHERE name like '$buk[$buk_id]%' order by name";
}elseif($jtype_id!=0){
    $query="select id,name,jobs_group_id from base_jobs WHERE id in(select job_id from base_job_types where jtype_id='".$jtype_id."') order by name";
}

$result=mysqli_query($link,$query);
$chet=0;
while($row=mysqli_fetch_array($result)){
    $chet++;
    $job_id=$row["id"];
    $jobs_group_id=$row["jobs_group_id"];
    $jobs_group_name="";
    $jobs_group_name=mysqli_result(mysqli_query($link,"select name from base_jobs_groups where id='$jobs_group_id'"),0,0);
    $jtypes_name="";


    $jtype_q=mysqli_query($link,"SELECT distinct jtype_id from base_job_types where job_id='$job_id'");
    while($row1=mysqli_fetch_array($jtype_q)){
        $jtype_id=$row1["jtype_id"];
        $jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
        $jtypes_name.="<li>".$jtype_name.";</li>";
    }

echo('
<tr>
<td><input type="checkbox" name="test_'.$chet.'" value="'.$row["id"].'"></td>
<td><a href="?page=jobs-red&id='.$row["id"].'">'.$row["id"].'</a></td>
<td><a href="?page=jobs-red&id='.$row["id"].'">'.$row["name"].'</a></td>
<td><ol>'.$jtypes_name.'</ol></td>
</tr>
');
}
?>
</table>
</form>