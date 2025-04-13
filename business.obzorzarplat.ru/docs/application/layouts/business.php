<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Обзоры заработных плат</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta name="keywords" content="<?php echo($key)?>">
<meta name="REVISIT-AFTER" CONTENT="1 DAYS" />
<meta name="DISTRIBUTION" CONTENT="GLOBAL" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<link href="/_css/business.css" rel="stylesheet" type="text/css" />
<link href="/_css/header.css" rel="stylesheet" type="text/css" />
<link href="/_css/footer.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
<link href="/_css/tariffs.css" rel="stylesheet" type="text/css" />
<link href="/_css/information_db.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 7]>
    <link href="/_css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
<!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript"></script>-->
<script src="/_js/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="/_js/lib/jquery-1.4.min.js" type="text/javascript"></script>
<!--<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>-->
<script src="/_js/lib/jquery.form.js" type="text/javascript"></script>
<script src="/_js/lib/jquery.example.js" type="text/javascript"></script>
<script src="http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js" type="text/javascript"></script>
<script src="/_js/jquery/business.js" type="text/javascript"></script>
</head>

<body>
<!--header-->
<?php include($folder.'application/layouts/header.php');?>
  <!-- end header -->
 <div class="navibar"><?php include($folder.'application/moduls/navibar.php');?></div>
<div id="leftcol">
 		<?php
 if ($_SESSION['logged_in']== FALSE)
 {
     include($folder.'application/moduls/menu/menu_left_business_outside.php');
 }
 else
 {
     include($folder.'application/moduls/menu/menu_left_business_inside.php');
 }
  ?>
</div> <!-- end leftcol -->


<div id="mainBody">
<h1><?php echo($title_raz);?></h1>
<?php include($content);?>
</div>
 <br class="clearfloat" />

<!--footer-->
   <div id="footer">
<?php include($folder.'application/layouts/footer.php');?>
</div>
<!-- end footer -->

</body>
</html>