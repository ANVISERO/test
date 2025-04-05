<div class="photo">
<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

if(isset($_GET['id'])){$id=intval($_GET['id']);}

$photo_q=mysqli_query($link,"select * from for_photo where id='$id'");

while($row=mysqli_fetch_array($photo_q)){
  echo('<center><img src="'.$row["link"].'"></center>');
}
?>
</div>