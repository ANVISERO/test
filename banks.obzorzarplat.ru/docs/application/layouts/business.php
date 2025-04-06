<?php //header("Cache-Control: no-cache, must-revalidate"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251"/>
<title>Скоринговая система на основе обзора заработных плат</title>
<meta name="keywords" content="<?php echo($key)?>" />
<meta name="REVISIT-AFTER" CONTENT="1 DAYS" />
<meta name="DISTRIBUTION" CONTENT="GLOBAL" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<link href="/_css/business.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
<!--[if lte IE 7]>
    <link href="/_css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="/_js/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="/_js/lib/jquery-1.4.min.js" type="text/javascript"></script>
<script src="/_js/lib/jquery.form.js" type="text/javascript"></script>
<script src="/_js/lib/jquery.example.js" type="text/javascript"></script>
<script src="http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js" type="text/javascript"></script>
<script src="/_js/jquery/business.js" type="text/javascript"></script>
</head>

<body>
<!--header-->
<?php include($folder.'application/layouts/header.php')?>
  <!-- end header -->
<div id="mainBody">
<h1><?php echo($title_raz);?></h1>
<?php require('_vars/content.php'); ?>

</div>
 <br class="clearfloat" />

<!--footer-->
<?php include($folder.'application/layouts/footer.php')?>
<!-- end footer -->

</body>
</html>