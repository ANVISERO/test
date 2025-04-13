<?php /* Smarty version 2.6.25, created on 2014-01-13 16:28:10
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/88e0e9cfd42ebd3847e6d4b7e5369ef7^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '5defaeb979e0a2669f3aa8d289e07a87';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_5defaeb979e0a2669f3aa8d289e07a87_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5defaeb979e0a2669f3aa8d289e07a87','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_5defaeb979e0a2669f3aa8d289e07a87_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5defaeb979e0a2669f3aa8d289e07a87','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_5defaeb979e0a2669f3aa8d289e07a87_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5defaeb979e0a2669f3aa8d289e07a87','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
