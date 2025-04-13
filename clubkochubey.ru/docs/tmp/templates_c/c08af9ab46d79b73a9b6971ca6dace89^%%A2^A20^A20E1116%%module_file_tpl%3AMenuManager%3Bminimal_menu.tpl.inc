<?php /* Smarty version 2.6.25, created on 2012-06-10 17:20:36
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/c08af9ab46d79b73a9b6971ca6dace89^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e6e0315e7f0c2c68a6d49e45998eae79';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e6e0315e7f0c2c68a6d49e45998eae79_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e6e0315e7f0c2c68a6d49e45998eae79','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e6e0315e7f0c2c68a6d49e45998eae79_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e6e0315e7f0c2c68a6d49e45998eae79','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e6e0315e7f0c2c68a6d49e45998eae79_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e6e0315e7f0c2c68a6d49e45998eae79','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
