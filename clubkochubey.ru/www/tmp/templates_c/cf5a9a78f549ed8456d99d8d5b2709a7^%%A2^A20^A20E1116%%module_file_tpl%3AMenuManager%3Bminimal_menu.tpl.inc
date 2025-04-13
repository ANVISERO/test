<?php /* Smarty version 2.6.25, created on 2014-01-14 14:40:31
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/cf5a9a78f549ed8456d99d8d5b2709a7^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '03e1e3bfb73ee2c47a905bfeee5c3ca6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_03e1e3bfb73ee2c47a905bfeee5c3ca6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03e1e3bfb73ee2c47a905bfeee5c3ca6','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_03e1e3bfb73ee2c47a905bfeee5c3ca6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03e1e3bfb73ee2c47a905bfeee5c3ca6','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_03e1e3bfb73ee2c47a905bfeee5c3ca6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('03e1e3bfb73ee2c47a905bfeee5c3ca6','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
