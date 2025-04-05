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
      2 => 'Б',
      3 => 'В',
			4 => 'Г',
			5 => 'Д',
			6 => 'Е',
			7 => 'Ё',
			8 => 'Ж',
			9 => 'З',
			10 => 'И',
			12 => 'К',
			13 => 'Л',
			14 => 'М',
			15 => 'Н',
			16 => 'О',
			17 => 'П',
			18 => 'Р',
			19 => 'С',
			20 => 'Т',
			21 => 'У',
			22 => 'Ф',
			23 => 'Х',
			24 => 'Ц',
			25 => 'Ч',
			26 => 'Ш',
			27 => 'Щ',
			28 => 'Э',
			29 => 'Ю',
			30 => 'Я'
			);
$letter=$alphabet[$letter_id];
  
$jobs_q=  mysqli_query($link,"Select id,name,business_cost from base_jobs where name like '".$letter."%' order by name");
?>

    <p><b><?php echo $letter; ?></b><p>
    <table width="100%" class="standart">
        <tr>
            <th width="80%">Должность</th>
            <th>Стоимость, руб./мес.</th>
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