<?php /* Smarty version 2.6.25, created on 2014-01-13 13:58:23
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/1106d6695b481dd99352d677e8d1cf37^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'cc8eb43c22129e166db145afa188aa20';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_cc8eb43c22129e166db145afa188aa20_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc8eb43c22129e166db145afa188aa20','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_cc8eb43c22129e166db145afa188aa20_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc8eb43c22129e166db145afa188aa20','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_cc8eb43c22129e166db145afa188aa20_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc8eb43c22129e166db145afa188aa20','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
