<?php /* Smarty version 2.6.25, created on 2014-01-14 02:24:46
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/22119d8c97b591819db09b32233717df^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e73007296d3a5bc78b477e5475a50083';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e73007296d3a5bc78b477e5475a50083_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e73007296d3a5bc78b477e5475a50083','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e73007296d3a5bc78b477e5475a50083_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e73007296d3a5bc78b477e5475a50083','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e73007296d3a5bc78b477e5475a50083_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e73007296d3a5bc78b477e5475a50083','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
