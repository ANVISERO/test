<?php /* Smarty version 2.6.25, created on 2014-01-14 02:24:57
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/650dc7ac2386a35bb30e18f02842ffee^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '7e5ca2de4b1e6b8d9773ee6005d470a8';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_7e5ca2de4b1e6b8d9773ee6005d470a8_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7e5ca2de4b1e6b8d9773ee6005d470a8','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7e5ca2de4b1e6b8d9773ee6005d470a8_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7e5ca2de4b1e6b8d9773ee6005d470a8','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7e5ca2de4b1e6b8d9773ee6005d470a8_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7e5ca2de4b1e6b8d9773ee6005d470a8','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
