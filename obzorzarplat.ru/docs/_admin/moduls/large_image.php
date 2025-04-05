<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Forsage :: Фото</title>
</head>
<body style="background-color:#000000">

<? $photo_name=$_GET["id"]; ?>

<center>
<img src="<?=$photo_name;?>" style="border:4px solid #171717">
<br>
<input type="button" onclick="window.close();" style="font-family:Verdana; background-color:#000000; border:#171717 solid 2px; color:#CCCCCC; width:250px; cursor:hand" value="Закрыть окно">
</center>

</body>
</html>

