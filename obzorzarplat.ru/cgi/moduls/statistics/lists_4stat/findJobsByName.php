<?php
header("Content-Type: text/html; charset=windows-1251");

$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

$letter_id=intval($_GET['letter_id']);

$alphabet = array(
      2 => '�',
      3 => '�',
			4 => '�',
			5 => '�',
			6 => '�',
			7 => '�',
			8 => '�',
			9 => '�',
			10 => '�',
			12 => '�',
			13 => '�',
			14 => '�',
			15 => '�',
			16 => '�',
			17 => '�',
			18 => '�',
			19 => '�',
			20 => '�',
			21 => '�',
			22 => '�',
			23 => '�',
			24 => '�',
			25 => '�',
			26 => '�',
			27 => '�',
			28 => '�',
			29 => '�',
			30 => '�'
			);
$letter=$alphabet[$letter_id];
  
$jobs_q=  mysqli_query($link,"Select id,name,business_cost from base_jobs where name like '".$letter."%' order by name");
?>

    <p><b><?php echo $letter; ?></b><p>
    <table width="100%" class="standart">
        <tr>
            <th width="80%">���������</th>
            <th>���������, ���./���.</th>
        </tr>
       <?php
        while($row=mysqli_fetch_array($jobs_q)){
            ?>
        <tr>
            <td><input type="checkbox" name="job[]" value="<?php echo $row["id"]; ?>"
                       id="job_<?php echo $row["id"]; ?>">
                <label for="job_<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></label>
            </td>
            <td><?php echo $row["business_cost"]; ?></td>
        </tr>
            <?php
        }
        ?>
    </table>