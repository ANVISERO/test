<?php /* Smarty version 2.6.25, created on 2012-06-11 00:48:45
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/a18482228bf0e65e9385bbae3682b615^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'dc5ed9343606b05f76b0619c2a394066';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_dc5ed9343606b05f76b0619c2a394066_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('dc5ed9343606b05f76b0619c2a394066','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_dc5ed9343606b05f76b0619c2a394066_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('dc5ed9343606b05f76b0619c2a394066','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_dc5ed9343606b05f76b0619c2a394066_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('dc5ed9343606b05f76b0619c2a394066','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
