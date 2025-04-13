<?php /* Smarty version 2.6.25, created on 2014-01-15 10:03:45
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/830c62c2c5aee81d8eaa829935d4f358^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '7caad8844975c9c5927032237ab6f120';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_7caad8844975c9c5927032237ab6f120_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7caad8844975c9c5927032237ab6f120','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7caad8844975c9c5927032237ab6f120_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7caad8844975c9c5927032237ab6f120','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7caad8844975c9c5927032237ab6f120_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7caad8844975c9c5927032237ab6f120','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
