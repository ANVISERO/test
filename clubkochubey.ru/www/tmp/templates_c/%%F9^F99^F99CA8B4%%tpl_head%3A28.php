<?php /* Smarty version 2.6.25, created on 2014-01-13 16:28:39
         compiled from tpl_head:28 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'title', 'tpl_head:28', 3, false),array('function', 'sitename', 'tpl_head:28', 3, false),array('function', 'metadata', 'tpl_head:28', 6, false),array('function', 'stylesheet', 'tpl_head:28', 10, false),array('function', 'cms_selflink', 'tpl_head:28', 12, false),array('function', 'get_date', 'tpl_head:28', 54, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%F9^F99^F99CA8B4%%tpl_head%3A28.inc'] = '32f4bfd362819dbe9811c297d811d71d'; ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','0');echo smarty_cms_function_title(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#0}'; endif;?>
 | <?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','1');echo smarty_cms_function_sitename(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#1}'; endif;?>
</title>

<!--<base href="http://cms.ru/">--><base href=".">
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','2');echo smarty_cms_function_metadata(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#2}'; endif;?>




<?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','3');echo smarty_cms_function_stylesheet(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#3}'; endif;?>


<?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','4');echo smarty_cms_function_cms_selflink(array('dir' => 'start','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#4}'; endif;?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','5');echo smarty_cms_function_cms_selflink(array('dir' => 'prev','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#5}'; endif;?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','6');echo smarty_cms_function_cms_selflink(array('dir' => 'next','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#6}'; endif;?>


<script type="text/javascript" src="./js/jquery-1.6.min.js"></script>
<?php echo '
 <script language="JavaScript">
     var jsReady = false;
     function isReady() {
         return jsReady;
     }
     function pageInit() {
         jsReady = true;
         controlbgpos();
     }
     function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
     function sendToActionScript(value) {
         thisMovie("banner").sendToActionScript(value);
     }
    $(window).resize(function () {controlbgpos()});
  //  $(document).ready(function () {controlbgpos()});

    function controlbgpos() {

    if ($(\'body\').width()<($(\'#maintable\').width()+Number($(\'#bgf\').css("padding-left").replace("px",""))+Number($(\'#bgf\').css("padding-right").replace("px",""))) ) {
    $(\'body\').css({"background-position": ((
    ($(\'#maintable\').width()+Number($(\'#bgf\').css("padding-left").replace("px",""))+Number($(\'#bgf\').css("padding-right").replace("px","")))
    -2560)/2)+"px "+($(\'#flashContent\').offset( ).top-552)+"px"});
    } else {
    $(\'body\').css({"background-position": (($(\'body\').width()-2560)/2)+"px "+($(\'#flashContent\').offset( ).top-552)+"px"});
    }

  $(\'.sf-menu\').css({\'left\':(($(\'#menudiv\').width()-$(\'.sf-menu\').width())/2 - 20)+ \'px\'});

    }
    function get_date() {
        return (153-'; ?>
 <?php if ($this->caching && !$this->_cache_including): echo '{nocache:32f4bfd362819dbe9811c297d811d71d#7}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('32f4bfd362819dbe9811c297d811d71d','7');echo smarty_cms_function_get_date(array('format' => 'z'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:32f4bfd362819dbe9811c297d811d71d#7}'; endif;?>
 <?php echo ');
     };

 </script>
'; ?>

</head>