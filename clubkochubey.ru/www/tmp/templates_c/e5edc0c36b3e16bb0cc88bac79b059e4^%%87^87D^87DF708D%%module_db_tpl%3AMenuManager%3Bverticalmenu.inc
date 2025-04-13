<?php /* Smarty version 2.6.25, created on 2014-01-13 13:57:42
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/e5edc0c36b3e16bb0cc88bac79b059e4^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'c279517aa7a573b56b5a669b03250ae6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_c279517aa7a573b56b5a669b03250ae6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c279517aa7a573b56b5a669b03250ae6','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c279517aa7a573b56b5a669b03250ae6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c279517aa7a573b56b5a669b03250ae6','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c279517aa7a573b56b5a669b03250ae6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c279517aa7a573b56b5a669b03250ae6','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
