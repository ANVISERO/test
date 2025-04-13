<?php /* Smarty version 2.6.25, created on 2014-01-13 14:39:39
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/ddf40b83fc1a7239bb32eb584db47536^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'bdee74ddc4b3d706d7212e7c165639cb';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_bdee74ddc4b3d706d7212e7c165639cb_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bdee74ddc4b3d706d7212e7c165639cb','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_bdee74ddc4b3d706d7212e7c165639cb_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bdee74ddc4b3d706d7212e7c165639cb','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_bdee74ddc4b3d706d7212e7c165639cb_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bdee74ddc4b3d706d7212e7c165639cb','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
