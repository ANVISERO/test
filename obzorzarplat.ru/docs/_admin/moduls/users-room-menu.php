<?
$user_money=mysqli_result(mysqli_query($link,"select * from for_users where id='$user_id'"),0,18);
$user_money=sprintf("%.2f",$user_money);
?>

������ �����:<br><br>
<a href="?page=history"><img src="/_admin/_adminfiles/ico_money.gif" alt="������� ��������" width="28" height="15" border="0" align="absmiddle"></a>
<font style="font-size:13px; color:#cc0000; font-weight:bold"><?=$user_money;?></font> ���.<br><br>
<center><input type="button" class="but" value="��������� ����" onClick="self.location.href='?page=addmoney'"></center>
<hr>


<img src="/_img/arr_02.gif" width="8" height="7">&nbsp;&nbsp;<a href="?page=bay" class="usermenu">������ �����</a><br><br>
<img src="/_img/arr_02.gif" width="8" height="7">&nbsp;&nbsp;<a href="?page=otchet" class="usermenu">��������� ������</a><br><br>
<img src="/_img/arr_02.gif" width="8" height="7">&nbsp;&nbsp;<a href="?page=addmoney" class="usermenu">��������� ����</a><br><br>
<img src="/_img/arr_02.gif" width="8" height="7">&nbsp;&nbsp;<a href="?page=history" class="usermenu">������� ��������</a><br><br>
<img src="/_img/arr_02.gif" width="8" height="7">&nbsp;&nbsp;<a href="?page=user" class="usermenu">�������� ������������</a>

