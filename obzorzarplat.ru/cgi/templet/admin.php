<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>OZP - Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta name="keywords" content="<?php echo (isset($key)) ? $key : ''?>" />
<meta name="description" content="<?php echo (isset($des)) ? $des : '' ?>" />
<meta name="REVISIT-AFTER" CONTENT="1 DAYS" />
<meta name="DISTRIBUTION" CONTENT="GLOBAL" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<link href="../_css/templet/admin.css" rel="stylesheet" type="text/css" />
<link href="/_css/templet/header.css" rel="stylesheet" type="text/css" />
<link href="/_css/templet/footer.css" rel="stylesheet" type="text/css" />
<link href="/_css/templet/menu_left.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="https://yandex.st/jquery-ui/1.8.11/themes/base/jquery.ui.all.min.css" rel="stylesheet" />

<script type="text/javascript" src="https://yandex.st/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://yandex.st/jquery-ui/1.8.11/jquery-ui.min.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="/_js/jquery/templet.js"></script>
</head>

<body>
<!--header-->
<?php include($folder.'../cgi/templet/header-admin.php');?>
  <!-- end header -->

 <div id="mainContent">
<div class="mainBody">
<h1><?php echo($title);?></h1>
<?php
if(file_exists($folder.'../cgi/pages/'.$page.'/text.php')){
    $fileContent=$folder.'../cgi/pages/'.$page.'/text.php';
}else{
    $fileContent=$folder.'../cgi/pages/'.$page.'/text.txt';
}
include($fileContent);?>
</div>
 </div> <!-- end mainContent -->
 <br class="clearfloat" />

<!--footer-->
   <div id="footer">
<?php include($folder.'../cgi/templet/footer.php');?>
</div>
<!-- end footer -->

</body>
</html>