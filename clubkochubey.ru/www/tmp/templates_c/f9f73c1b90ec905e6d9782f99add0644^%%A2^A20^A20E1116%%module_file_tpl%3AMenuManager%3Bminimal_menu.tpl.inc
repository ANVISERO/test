<?php /* Smarty version 2.6.25, created on 2014-01-14 02:32:53
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/f9f73c1b90ec905e6d9782f99add0644^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '03b937320f9a483c3d1bdc94209da30e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_03b937320f9a483c3d1bdc94209da30e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03b937320f9a483c3d1bdc94209da30e','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_03b937320f9a483c3d1bdc94209da30e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03b937320f9a483c3d1bdc94209da30e','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_03b937320f9a483c3d1bdc94209da30e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03b937320f9a483c3d1bdc94209da30e','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
