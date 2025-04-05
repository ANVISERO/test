<link type="text/css" href="/_js/highslide-4.1.8/highslide/highslide.css" rel="stylesheet" />
<script src="/_js/highslide-4.1.8/highslide/highslide-with-gallery.js" type="text/javascript"></script>

<script type="text/javascript">
hs.graphicsDir = '/_js/highslide-4.1.8/highslide/graphics/';
hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.numberPosition = 'caption';
	hs.dimmingOpacity = 0.75;

	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .75,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>

<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$meeting_id=intval($_GET["id"]);

$meetings=mysqli_query($link,"select * from hrclub_meetings WHERE id='$meeting_id'");

if(mysqli_num_rows($meetings)==1){

while($row=mysqli_fetch_array($meetings)){
    $meeting_id=$row["id"];
    $title=$row["title"];
    $date=$row["date"];
    $information=$row["information"];
    $place=$row["place"];
    $cost=$row["cost"];
    $photoalbum_id=$row["photoalbum_id"];
}

list($year,$monthId,$day)=implode('[-,/,.]',$date);
$month=array('01'=>'������', '02'=>'�������', '03'=>'�����', '04'=>'������', '05'=>'���', '06'=>'����', '07'=>'����', '08'=>'�������', '09'=>'��������', '10'=>'�������', '11'=>'������', '12'=>'�������');
$month_title=$month[$monthId];
?>

<?php if(isset($date) && $date!='0000-00-00') { ?>
<p><b><?php echo($day.' '.$month_title.' '.$year.'�.');?></b></p>
<?php } ?>

<h1>���� ���������: <?php echo($title);?></h1>

<?php if(isset($information) && $information!='') { ?>
<h2>���������� � ���������</h2>
<div style="position:relative; float:right; padding:10px;">

</div>
<?php echo $information;?>
<?php } ?>

<?php if(isset($photoalbum_id) && $photoalbum_id!='0') { ?>
<h2>��������� � ���������</h2>
<?php
$photoalbum_cover_preview=mysqli_result(mysqli_query($link,"SELECT link_preview from for_photo where album_id='$photoalbum_id' order by id limit 1"),0,0);
$photoalbum_cover=mysqli_result(mysqli_query($link,"SELECT link from for_photo where link_preview='$photoalbum_cover_preview'"),0,0);
?>
<table border="0">
    <tr>
        <td><a id="thumb1" href="<?php echo $photoalbum_cover; ?>" class="highslide" onclick="return hs.expand(this)">
                <img src="<?php echo $photoalbum_cover_preview; ?>" alt="���������"></a></td>
        <td><p>��������� � ��������� ����� ���������� <a href="/hrclub/meetings/photos/?id=<?php echo $meeting_id; ?>">����� &raquo;</a></p></td>
    </tr>
</table>
<div class="hidden-container">
<?php
$preview_q=mysqli_query($link,"SELECT * from for_photo where album_id='$photoalbum_id' and link_preview!='$photoalbum_cover_preview'");

while($row=mysqli_fetch_array($preview_q)){
  echo('<a href="'.$row["link"].'" class="highslide" onclick="return hs.expand(this, { thumbnailId: \'thumb1\' })"><img src="'.$row["link_preview"].'" align="middle"></a>');
}
?>
</div>
<?php } ?>


<?php if(isset($place) && $place!='') { ?>
<h2>����� ���������� ���������</h2>
<p>����� ���������� ���������: <?php echo $place;?></p>
<?php } ?>

<h2>��������</h2>
<p>�������� ����� ��������� ���������� �� ������� � ����������, ������������, ����������� � �������� � ����� ����� � �������������� ����� - ��������� �������� �� ���������:
    <br>+7 (812) 740 18 11;
    <br>+7 (921) 372 42 22;
    <br><a href='mailto:kate@ant-management.spb.ru' class="lk3">kate@ant-management.spb.ru</a></p>

<?php } ?>