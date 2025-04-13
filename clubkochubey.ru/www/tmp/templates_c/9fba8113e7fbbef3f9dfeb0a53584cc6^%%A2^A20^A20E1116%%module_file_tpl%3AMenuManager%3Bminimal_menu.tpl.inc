<?php /* Smarty version 2.6.25, created on 2014-01-14 00:42:47
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/9fba8113e7fbbef3f9dfeb0a53584cc6^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'bc21292214401714e58ca13122b53046';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_bc21292214401714e58ca13122b53046_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_bc21292214401714e58ca13122b53046_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_bc21292214401714e58ca13122b53046_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
