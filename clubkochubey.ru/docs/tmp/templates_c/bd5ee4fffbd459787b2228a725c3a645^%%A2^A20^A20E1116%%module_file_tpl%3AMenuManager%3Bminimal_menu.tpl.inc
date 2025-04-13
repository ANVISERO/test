<?php /* Smarty version 2.6.25, created on 2013-03-07 04:54:18
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/bd5ee4fffbd459787b2228a725c3a645^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '455ce25c36b0d26d63a1028a086f836a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_455ce25c36b0d26d63a1028a086f836a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('455ce25c36b0d26d63a1028a086f836a','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_455ce25c36b0d26d63a1028a086f836a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('455ce25c36b0d26d63a1028a086f836a','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_455ce25c36b0d26d63a1028a086f836a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('455ce25c36b0d26d63a1028a086f836a','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
