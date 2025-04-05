<?php header('Cache-control:max-age=3600, must-revalidate');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $tit; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta name="keywords" content="<?php echo $key; ?>" />
<meta name="description" content="<?php echo $des; ?>" />
<meta name="REVISIT-AFTER" CONTENT="1 DAYS" />
<meta name="DISTRIBUTION" CONTENT="GLOBAL" />
<meta name="google-site-verification" content="f-qduJJjgs7SOMfLWSfuv6yTwm-tM6BQJ9ZQWqMtsW4" />
<link rel="SHORTCUT ICON" href="/favicon.ico" />
<link href="/_css/templet/main.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="http://yandex.st/jquery-ui/1.8.11/themes/base/jquery.ui.all.min.css" rel="stylesheet" />
<!--[if lte IE 7]>
    <link href="/_css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--
<script type="text/javascript" src="/_js/lib/jquery-1.4.min.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.anythingslider.js"></script>
<script src="/_js/jquery-ui-1.7.2.custom/jquery-ui.min.js" type="text/javascript"></script>
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
-->
<script type="text/javascript" src="http://yandex.st/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery/easing/1.3/jquery.easing.min.js"></script>
<script type="text/javascript" src="http://yandex.st/jquery-ui/1.8.10/jquery-ui.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.anythingslider.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.innerfade.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.jcarousel.min.js"></script>
<script src="/_js/jquery/main.js" type="text/javascript"></script>

<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>

<script type="text/javascript" src="/_js/jquery.newsScroll.js"></script>
<meta name="google-site-verification" content="If3C2YfDIQNTWWUMyb42A7kiOeldosU5lttc9_HgmSg" />
</head>
    <?php flush(); ?>
<body>

<!--header-->
<?php include($folder.'../cgi/templet/header.php')?>
<!--end header-->

 <div id="mainContent">
<?php include($content);?>
 </div> <!-- end mainContent -->

<!--footer-->
<?php include($folder.'../cgi/templet/footer.php')?>
<!-- end footer -->
</body>
</html>