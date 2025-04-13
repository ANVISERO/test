<?php /* Smarty version 2.6.25, created on 2012-06-10 07:39:53
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/2d4ad0103900c801e79e5d21f742101d^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '5782331afb94f2c01f4f16bba506260e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_5782331afb94f2c01f4f16bba506260e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5782331afb94f2c01f4f16bba506260e','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_5782331afb94f2c01f4f16bba506260e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5782331afb94f2c01f4f16bba506260e','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_5782331afb94f2c01f4f16bba506260e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5782331afb94f2c01f4f16bba506260e','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
