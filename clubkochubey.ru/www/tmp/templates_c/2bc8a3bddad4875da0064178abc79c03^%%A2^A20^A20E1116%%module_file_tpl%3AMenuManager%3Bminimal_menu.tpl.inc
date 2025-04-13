<?php /* Smarty version 2.6.25, created on 2014-01-15 09:11:52
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/2bc8a3bddad4875da0064178abc79c03^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '3386eaeb98db052079bcccada2faac65';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_3386eaeb98db052079bcccada2faac65_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3386eaeb98db052079bcccada2faac65','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_3386eaeb98db052079bcccada2faac65_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3386eaeb98db052079bcccada2faac65','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_3386eaeb98db052079bcccada2faac65_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3386eaeb98db052079bcccada2faac65','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
