<?php /* Smarty version 2.6.25, created on 2012-06-09 21:06:05
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/bb65d945df1104236dbc74ee5cca4a1c^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '216d644d0d41e94090a18ef32ecb73dc';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_216d644d0d41e94090a18ef32ecb73dc_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('216d644d0d41e94090a18ef32ecb73dc','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_216d644d0d41e94090a18ef32ecb73dc_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('216d644d0d41e94090a18ef32ecb73dc','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_216d644d0d41e94090a18ef32ecb73dc_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('216d644d0d41e94090a18ef32ecb73dc','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
