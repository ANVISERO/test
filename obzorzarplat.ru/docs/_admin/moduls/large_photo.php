<?
$id=$_GET["id"];
$temp=$_GET["temp"];
$css='/_admin/templet/'.$temp.'/css.css';
//Определение имени
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from for_goods where id='$id'";
$result=mysqli_query($link,$query);
$name=mysqli_result($result,0,2);

$filefolder='../elements/goods/';
$kov="'";

$large_photo=$filefolder.$id.'/large-photo-1.jpg'; 
$dop_photo_1_1=$filefolder.$id.'/dop-photo-1-1.jpg'; 
$dop_photo_1_2=$filefolder.$id.'/dop-photo-1-2.jpg'; 
$dop_photo_1_3=$filefolder.$id.'/dop-photo-1-3.jpg'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Фото</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="<? echo($css);?>" rel="stylesheet" type="text/css" />
</head>

<body>
<br>
<center><font class="price"><? echo($name);?></font></center>
<hr>

<table width="490" height="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90" height="100" align="left" valign="middle">
<? if(file_exists($large_photo))
{
echo('	
	<a onmouseover="this.style.cursor='.$kov.'hand'.$kov.'" onclick="photo.src='.$kov.$large_photo.$kov.'"><img src="'.$large_photo.'" style="border:6px solid #171717" name="dop_0" width="60" height="60" id="dop_0"></a>');
	}
?>	
	</td>
    <td width="400" rowspan="4" align="center" valign="middle">
	
<? if(file_exists($large_photo))
{
echo('	
	<img src="'.$large_photo.'" style="border:6px solid #171717" name="photo" width="400" height="400" id="photo">');
	}
?>		
	</td>
  </tr>
  <tr align="left">
    <td width="90" height="100" valign="middle">
<? if(file_exists($dop_photo_1_1))
{
echo('	
	<a onmouseover="this.style.cursor='.$kov.'hand'.$kov.'" onclick="photo.src='.$kov.$dop_photo_1_1.$kov.'"><img src="'.$dop_photo_1_1.'" style="border:6px solid #171717" name="dop_0" width="60" height="60" id="dop_0"></a>');
}
?>
	
	</td>
  </tr>
  <tr align="left">
    <td width="90" height="100" valign="middle">
	
<? if(file_exists($dop_photo_1_2))
{
echo('	
	<a onmouseover="this.style.cursor='.$kov.'hand'.$kov.'" onclick="photo.src='.$kov.$dop_photo_1_2.$kov.'"><img src="'.$dop_photo_1_2.'" style="border:6px solid #171717" name="dop_0" width="60" height="60" id="dop_0"></a>');
}
?>
	
	</td>
  </tr>
  <tr align="left">
    <td width="90" height="100" valign="middle">
	
<? if(file_exists($dop_photo_1_3))
{
echo('	
	<a onmouseover="this.style.cursor='.$kov.'hand'.$kov.'" onclick="photo.src='.$kov.$dop_photo_1_3.$kov.'"><img src="'.$dop_photo_1_3.'" style="border:6px solid #171717" name="dop_0" width="60" height="60" id="dop_0"></a>');
}
?>
	
	</td>
  </tr>
</table>
<hr>
<center><input type="button" class="button2" value="Закрыть окно" onclick="window.close();"></center>
</body>