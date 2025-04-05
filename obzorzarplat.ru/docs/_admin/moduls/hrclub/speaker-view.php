<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$speaker_id=intval($_GET["id"]);

$speaker=mysqli_query($link,"select * from hrclub_speakers WHERE id='$speaker_id'");

if(mysqli_num_rows($speaker)==1){

while($row=mysqli_fetch_array($speaker)){
    $speaker_id=$row["id"];
    $name=$row["name"];
    $second_name=$row["second_name"];
    $surname=$row["surname"];
    $job=$row["job"];
    $company=$row["company"];
    $company_information=$row["company_information"];
    $biografy=$row["biografy"];
}
?>

<h1><?php echo($name.' '.$second_name.' '.$surname);?>, <br><?php echo $job; ?></h1>

<div class="biografy">
    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/_img/speakers/'.$speaker_id.'.jpg')){ ?>
<div class="photo">
<img src="/_img/speakers/<?php echo $speaker_id; ?>.jpg" alt="кадровый клуб Кочубей" border="0" align="middle">
</div>
    <?php } ?>

    <?php echo $biografy; ?>
</div>

<?php if(isset($company_information) && $company_information!=''){ ?>
<h2>О компании</h2>
<?php echo $company_information; ?>
<?php } ?>

<?php } ?>