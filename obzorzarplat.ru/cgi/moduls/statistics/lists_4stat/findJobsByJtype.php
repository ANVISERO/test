<?php
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

header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype_id']);
  
$jobs_q=  mysqli_query($link,"Select id,name,business_cost from base_jobs where id in(
                        select job_id from base_job_types where jtype_id='$jtype_id') order by name");
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
?>

    <p><b><?php echo $jtype_name; ?></b><p>
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