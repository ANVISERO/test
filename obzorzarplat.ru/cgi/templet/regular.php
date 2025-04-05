<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tit; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta name="keywords" content="<?php echo($key)?>" />
<meta name="description" content="<?php echo($des)?>" />
<meta name="REVISIT-AFTER" CONTENT="1 DAYS" />
<meta name="DISTRIBUTION" CONTENT="GLOBAL" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<link href="/_css/templet/regular.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="http://yandex.st/jquery-ui/1.8.11/themes/base/jquery.ui.all.min.css" rel="stylesheet" />
<!--
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
-->
<script type="text/javascript" src="http://yandex.st/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery/easing/1.3/jquery.easing.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery-ui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="/_js/jquery/templet.js"></script>
<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>
</head>
<?php flush(); ?>
<body>
<!--header-->
<?php include($folder.'../cgi/templet/header.php')?>
  <!-- end header -->

<div class="navibar"><?php include($folder.'_admin/moduls/navibar.php');?></div>

<div id="leftcol">
 		<?php
     include($folder.'../cgi/moduls/menu/menu_left_'.$temp.'.php');
  ?>
</div>
<!-- /leftcol -->

<div id="mainBody">
<h1><?php echo($title_raz);?></h1>
<?php include('_vars/content.php');?>
</div><!--/mainBody-->
 <div class="clearfloat" />

   <div id="footer">
<?php include($folder.'../cgi/templet/footer.php')?>
</div>
<!-- /footer -->
</body>
</html>