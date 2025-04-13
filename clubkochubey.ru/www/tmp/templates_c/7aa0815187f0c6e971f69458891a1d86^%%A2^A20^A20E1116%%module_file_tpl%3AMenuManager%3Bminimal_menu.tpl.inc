<?php /* Smarty version 2.6.25, created on 2014-01-13 13:58:14
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/7aa0815187f0c6e971f69458891a1d86^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'c130df4a0a1a66f60a393a82d5d9f664';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_c130df4a0a1a66f60a393a82d5d9f664_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c130df4a0a1a66f60a393a82d5d9f664','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c130df4a0a1a66f60a393a82d5d9f664_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c130df4a0a1a66f60a393a82d5d9f664','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c130df4a0a1a66f60a393a82d5d9f664_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c130df4a0a1a66f60a393a82d5d9f664','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
