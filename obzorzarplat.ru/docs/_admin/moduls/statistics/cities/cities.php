<table width="100%">
<tr>
<th>�����</th>
<th>���������� ����������</th>
<th>���������� ��������</th>
<th>���������� �����</th>
<th>���� ���������� ���������� ������</th>
<th>������� ���������� ����� �� ������</th>
</tr>


<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$query="select * from base_regions order by name";
$result=mysqli_query($link,$query);

while($row = mysqli_fetch_array($result)){
    $city_id=$row["id"];
    $city_name=$row["name"];

    //���������� ����������
    $jobs_in_city=mysqli_result(mysqli_query($link,"select count(distinct(`job_id`)) from `base_company_jobs` where city_id='$city_id'"),0,0);

    //���������� ��������
    $companies_in_city=mysqli_result(mysqli_query($link,"select count(distinct(`company_id`)) from `base_company_jobs` where city_id='$city_id'"),0,0);

    //���������� �����
	$people_in_city = 0;
    $people_in_city = mysqli_result(mysqli_query($link,"select count(id) from `base_people` where region_id='$city_id'"),0,0);
	if ($people_in_city) {
		$res = mysqli_query($link,"select SUM(official_salary+add_payment+bonus+premium) from `base_people` where region_id='$city_id'") or die(mysql_error());
		if (mysqli_num_rows($res)) {
			$average_city = mysqli_result($res,0,0);
			$average_city = floor($average_city / $people_in_city);
		}
	 } else $average_city = 0;


    //���� ���������� ���������� ������
    $max_date_update_city=mysqli_result(mysqli_query($link,"select max(date) from `base_company_jobs` where city_id='$city_id'"),0,0);
    ?>
<tr>
    <td><?php echo $city_name; ?></td>
    <td><?php echo $jobs_in_city; ?></td>
    <td><?php echo $companies_in_city; ?></td>
    <td><?php echo $people_in_city; ?></td>
    <td><?php echo $max_date_update_city; ?></td>
	<td><?php echo $average_city;?></td>
</tr>

<?php
}
?>
</table>