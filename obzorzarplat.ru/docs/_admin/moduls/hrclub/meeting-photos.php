<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$meeting_id=intval($_GET["id"]);
$album_id=mysqli_result(mysqli_query($link,"select photoalbum_id from hrclub_meetings where id='$meeting_id'"),0,0);
?>
<style type="text/css">
#lightBox {margin:0; padding:0; list-style-type:none; }
#lightBox img { border:1px solid #000; margin-left:5px; }
#lightBox li {display:inline; list-style:none; padding:5px; margin:5px;}
</style>
<link type="text/css" href="/_js/highslide-4.1.8/highslide/highslide.css" rel="stylesheet" />
<script src="/_js/highslide-4.1.8/highslide/highslide-with-gallery.js" type="text/javascript"></script>

<script type="text/javascript">
hs.graphicsDir = '/_js/highslide-4.1.8/highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'glossy-dark';
hs.wrapperClassName = 'dark';
hs.numberPosition = 'caption';
hs.fadeInOut = true;
//hs.dimmingOpacity = 0.75;

// Add the controlbar
if (hs.addSlideshow) hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .6,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>

<ul id="lightBox">
<?php
$preview_q=mysqli_query($link,"SELECT * from for_photo where album_id='$album_id'  order by id");

while($row=mysqli_fetch_array($preview_q)){
  echo('<li><a href="'.$row["link"].'" class="highslide" onclick="return hs.expand(this)"><img src="'.$row["link_preview"].'" align="middle"></a></li>');
}
?>
</ul>