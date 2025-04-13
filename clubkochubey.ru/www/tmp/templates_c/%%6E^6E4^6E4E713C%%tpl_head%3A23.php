<?php /* Smarty version 2.6.25, created on 2014-02-12 16:22:31
         compiled from tpl_head:23 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'title', 'tpl_head:23', 4, false),array('function', 'sitename', 'tpl_head:23', 4, false),array('function', 'metadata', 'tpl_head:23', 7, false),array('function', 'stylesheet', 'tpl_head:23', 14, false),array('function', 'cms_selflink', 'tpl_head:23', 17, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%6E^6E4^6E4E713C%%tpl_head%3A23.inc'] = 'b04887e24e41120e1125703fe69422b7'; ?><head>
<?php if (isset ( $this->_tpl_vars['canonical'] )): ?><link rel="canonical" href="<?php echo $this->_tpl_vars['canonical']; ?>
" /><?php elseif (isset ( $this->_tpl_vars['content_obj'] )): ?><link rel="canonical" href="<?php echo $this->_tpl_vars['content_obj']->GetURL(); ?>
" /><?php endif; ?>

<title><?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','0');echo smarty_cms_function_title(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#0}'; endif;?>
 | <?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','1');echo smarty_cms_function_sitename(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#1}'; endif;?>
</title>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','2');echo smarty_cms_function_metadata(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#2}'; endif;?>


<?php echo '
<script type="text/javascript" src="./jquery.js"></script>
'; ?>


<?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','3');echo smarty_cms_function_stylesheet(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#3}'; endif;?>


<?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','4');echo smarty_cms_function_cms_selflink(array('dir' => 'start','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#4}'; endif;?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','5');echo smarty_cms_function_cms_selflink(array('dir' => 'prev','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#5}'; endif;?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:b04887e24e41120e1125703fe69422b7#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('b04887e24e41120e1125703fe69422b7','6');echo smarty_cms_function_cms_selflink(array('dir' => 'next','rellink' => 1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:b04887e24e41120e1125703fe69422b7#6}'; endif;?>


<!--[if IE 6]>
<script type="text/javascript" src="modules/MenuManager/CSSMenu.js"></script>
<![endif]-->

<?php echo '
<!--[if IE 6]>
<script type="text/javascript"  src="uploads/NCleanBlue/js/ie6fix.js"></script>
<script type="text/javascript">
 // argument is a CSS selector
 DD_belatedPNG.fix(\'.sbar-top,.sbar-bottom,.main-top,.main-bottom,#version\');
</script>
<style type="text/css">
/* enable background image caching in IE6 */
html {filter:expression(document.execCommand("BackgroundImageCache", false, true));} 
</style>
<![endif]-->
'; ?>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  </head>