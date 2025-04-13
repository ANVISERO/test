<?php /* Smarty version 2.6.25, created on 2012-06-10 11:10:45
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/8d02956081efab141cbd43f93793b258^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '81a983cc36bbb7d2f6ad4bbfee3041bd';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_81a983cc36bbb7d2f6ad4bbfee3041bd_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('81a983cc36bbb7d2f6ad4bbfee3041bd','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_81a983cc36bbb7d2f6ad4bbfee3041bd_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('81a983cc36bbb7d2f6ad4bbfee3041bd','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_81a983cc36bbb7d2f6ad4bbfee3041bd_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('81a983cc36bbb7d2f6ad4bbfee3041bd','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
