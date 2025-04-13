<?php /* Smarty version 2.6.25, created on 2012-06-11 00:49:14
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/d293c0538f0c22943cb173802734de0b^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'f2622579919fc7764c6da8d2dee7582d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_f2622579919fc7764c6da8d2dee7582d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f2622579919fc7764c6da8d2dee7582d','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_f2622579919fc7764c6da8d2dee7582d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f2622579919fc7764c6da8d2dee7582d','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_f2622579919fc7764c6da8d2dee7582d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f2622579919fc7764c6da8d2dee7582d','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
