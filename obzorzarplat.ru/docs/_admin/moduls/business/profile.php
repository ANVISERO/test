<?php
$user_q=mysqli_query($link,"SELECT * from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' ");
while($row=mysqli_fetch_array($user_q)){
    $user_id=$row["id"];
    $name=stripslashes($row["name"]);
    $company=stripslashes($row["company"]);
    $email=stripslashes($row["email"]);
}

?>
<h2>���� ������ ��� ���������</h2>
<form action="/business/register/" method="post">
		<input type="hidden" name="_submit_check" value="1"/>

    <table border="0">
    <tr>
		<td align="right"><label for="name">���</label></td>
		<td align="left"><input class="input" type="text" id="name" name="name" size="52" value="<?php if(isset($name)){echo $name;}?>" /></td>
    </tr>
    <tr>
		<td align="right"><label for="company">��������</label></td>
		<td align="left"><input class="input" type="text" id="company" name="company" size="52" value="<?php if(isset($company)){echo htmlspecialchars($company,ENT_QUOTES);} ?>" /></td>
    </tr>
    <tr>
		<td align="right"><label for="email">Email</label></td>
		<td align="left"><input class="input" type="text" id="email" name="email" size="52" value="<?php if(isset($email)){echo $email;}?>" /></td>
    </tr>
    <tr>
      <td></td>
      <td align="left"><input type="submit" value="���������" class="reg" /></td>
    </tr>
   </table>
</form>

<h2>��� �������</h2>
<?php
$user_q=mysqli_query($link,"SELECT * from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' ");

while($row=mysqli_fetch_array($user_q))
{
    $user_id=$row["id"];
    $date_start=$row["date_start"];
    $date_finish=$row["date_finish"];
    $tarif_id=$row["tarif_id"];
}

$tarif_title=mysqli_result(mysqli_query($link,"SELECT title from for_tarif WHERE id='$tarif_id'"),0,0);
?>

<table class="standart">
    <tr>
        <td>��� �����</td>
        <td><b><?php echo($tarif_title);?></b></td>
    </tr>
    <tr>
        <td>������, ��������������� �� ������ ������</td>
        <td>
            <ul>
            <?php
    $report_type_q=mysqli_query($link,"SELECT * from for_tarif_reports where tarif_id='$tarif_id'");
    while($row=mysqli_fetch_array($report_type_q))
    {
        $report_title=mysqli_result(mysqli_query($link,"SELECT title from for_report_type WHERE id=".$row["report_id"]),0,0);
        echo("<li>".$report_title."</li>");
    }
            ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td>�������������� ������</td>
        <td>
            <ul>
    <?php
    $report_type_q=mysqli_query($link,"SELECT * from for_users_corporat_report_type where user_id='$user_id'");
    while($row=mysqli_fetch_array($report_type_q))
    {
        $report_title=mysqli_result(mysqli_query($link,"SELECT title from for_report_type WHERE id=".$row["report_type_id"]),0,0);
        echo("<li>".$report_title."</li>");
    }
    ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td>���� �������������� �����</td>
        <td><b><?php echo(date('d.m.Y', strtotime($date_start)));?> - <?php echo(date('d.m.Y', strtotime($date_finish)));?></b></td>
    </tr>
</table>