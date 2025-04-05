<?php

//сбор данных
$date=$_POST['date'];
$zag=$_POST['zag'];
$anons=stripslashes($_POST['anons']);
$opis=stripslashes($_POST['opis']);

$lang=$_POST['lang'];
$category=$_POST["category"];

//Подчистка

if(isset($_POST["status"])){$status=1;}
if(!isset($_POST["status"])){$status=0;}

//запись в базу
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!$link){echo 'not link';}

$query="insert into for_news(date,zag,status,lang,category_id) values('$date','$zag','$status','$lang','$category')";
$result=mysqli_query($link,$query);

$id=mysqli_result(mysqli_query($link,"select id from for_news WHERE date='$date' AND zag='$zag'"),0,0);

$filefolder='../_admin/elements/news/';

//Создание файлов
$fullpath=$filefolder.$id.'_an.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $anons);
fclose ($file);

$fullpath=$filefolder.$id.'_op.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $opis);
fclose ($file);

//Загрузка картинки
if(file_exists($_FILES['small-photo'] ['tmp_name']))
{

$photo= $id.'.jpg';
$uploaddir=$filefolder;
move_uploaded_file($_FILES['small-photo'] ['tmp_name'], $uploaddir . $photo);
$file=$filefolder.$id.'.jpg';
$path_real=$file;
$src_img=ImageCreateFromJpeg("$path_real");
$src_width=ImagesX($src_img);
$src_height=ImagesY($src_img);
$dest_width="80";
$dest_height="80";
$quality="80";
$dest_img=ImageCreateTrueColor($dest_width, $dest_height);
ImageCopyResampled($dest_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height);
ImageJpeg($dest_img, $file, $quality);
ImageDestroy($dest_img);
}


?>
<script>
self.location.href='?page=news';
</script>
