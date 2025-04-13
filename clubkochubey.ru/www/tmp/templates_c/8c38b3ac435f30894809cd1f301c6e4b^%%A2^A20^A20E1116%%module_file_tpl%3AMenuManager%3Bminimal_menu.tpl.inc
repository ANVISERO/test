<?php /* Smarty version 2.6.25, created on 2014-01-13 21:25:53
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/8c38b3ac435f30894809cd1f301c6e4b^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '60517c6b9c78c2c819db4a4bd982cd3e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_60517c6b9c78c2c819db4a4bd982cd3e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('60517c6b9c78c2c819db4a4bd982cd3e','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_60517c6b9c78c2c819db4a4bd982cd3e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('60517c6b9c78c2c819db4a4bd982cd3e','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_60517c6b9c78c2c819db4a4bd982cd3e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('60517c6b9c78c2c819db4a4bd982cd3e','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
