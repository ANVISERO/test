<style type="text/css">
#lightBox {margin:0; padding:0; list-style-type:none; }
#lightBox img { border:1px solid #000; margin-left:5px; }
#lightBox li {display:inline; list-style:none; padding:5px; margin:5px;}
</style>
<link type="text/css" href="/_js//prettyPhoto/css/prettyPhoto.css" rel="stylesheet" />
<script src="/_js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
   $("#lightBox a[rel^='prettyPhoto']").prettyPhoto({
  	theme: 'facebook'
  });
});
</script>

<ul id="lightBox">
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$preview_q=mysqli_query($link,"SELECT * from for_photo where album_id='$album_id'");

while($row=mysqli_fetch_array($preview_q)){
  echo('<li><a href="'.$row["link"].'" rel="prettyPhoto[gallery_1]"><img src="'.$row["link_preview"].'" align="middle"></a></li>');
}
?>
</ul>