<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//���� ����������
$kov="'";
$login=$_POST['login'];
$pass_1=$_POST['pass_1'];
$pass_2=$_POST['pass_2'];
$im=$_POST['im'];
$fam=$_POST['fam'];


$otch='';
$mail='';
$day_b='';
$mon_b='';
$year_b='';
$birth=$day_b.' '.$mon_b.' '.$year_b;
$sex='';
$country='';
$sity='';
$phone='';
$bisines='';
$icq='';
$skype='';
$web='';
$status=1;
$type=0;
$money=0;

$date=date("Y-m-d");
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];

//������
$err[1]=$err[2]=$err[3]=$err[4]=$err[5]=0;
//��������
if(mysqli_num_rows(mysqli_query($link,"select * from for_users where log='$login'"))<>0){$err[1]=1;}
if($pass_1<>$pass_2){$err[2]=1;}
if((eregi("@",$login)==0)){$err[3]=1;}
if($cap<>($cap_code/123)){$err[4]=1;}
if(!isset($_POST['pravila'])){$err[5]=1;}

if(($err[1]+$err[2]+$err[3]+$err[4]+$err[5])==0)
{
$id=implode("", file($folder.'_admin/settings/count_id'));

$count_file=$folder.'_admin/settings/count_id';
$count=implode("", file($count_file));
$file = fopen ($count_file,"w+");
fputs ( $file, ($count+1));
fclose ($file);

//������ � ����
$query=mysqli_query($link,"insert into for_users value ('$id','$login','$pass_1','$im','$fam','$otch','$mail','$birth','$sex','$country','$sity','$phone','$bisines','$icq','$web','$skype','$status','$type','$money','$date')");

//������ � �������
$str_date=date("Y.m.d H:i");
$result2=mysqli_query($link,"insert into for_schethistory value ('$id','$str_date','+','0','�������� �����')");


echo('
<center><font style="color:#00B115"><b>'.$im.' '.$fam.', �����������! ���� ������� ������ ('.$login.') ������� ������������!</b></font>
<br><br>
�� ���������������� � ������� ��� <b>"�������������� ������������"</b>. ��� ����� ����������� ���� E-mail � ������.
<br><br>
�� �������� ����������� �� �������� "������������� ������������" ����������� � ������������� �����.
</center>
');

}
else
{
echo('<b>��������� ������:</b><br><br>');
if($err[1]<>0){echo('������������ � ������� <b>'.$login.'</b> ��� ����������<br><br>');}
if($err[2]<>0){echo('��������� ������ �� ���������<br><br>');}
if($err[3]<>0){echo('E-mail ������ �� ���������<br><br>');}
if($err[4]<>0){echo('����� �� �������� ������ �� �����<br><br>');}
if($err[5]<>0){echo('�� �� ���������� � ��������� �����<br><br>');}
echo('<input type="button" class="but" value="��������� �����������" onClick="self.location.href='.$kov.'?step=0'.$kov.'">');
}
?>