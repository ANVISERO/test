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
<!--[if lte IE 7]>
    <link href="/_css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<!--header-->
<div id="logo"><a href="http://obzorzarplat.ru"><img alt="Обзор зарплат" src="http://obzorzarplat.ru/_img/logo_ru.jpg" border="0" /></a></div>

  <!-- end header -->
<div id="mainBody">
<h1><?php echo($title_raz);?></h1>
<?php include('_vars/content.php');?>
</div>
 <br class="clearfloat" />

<!--footer-->
<?php include($folder.'application/layouts/footer.php')?>
<!-- end footer -->

</body>
</html>