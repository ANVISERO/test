<?php /* Smarty version 2.6.25, created on 2014-01-15 09:41:44
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/8cbea12f8e76f139f9349ddac0ce1c6a^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e58ca358fb3dbc0df3ab1593958f5169';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e58ca358fb3dbc0df3ab1593958f5169_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e58ca358fb3dbc0df3ab1593958f5169','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e58ca358fb3dbc0df3ab1593958f5169_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e58ca358fb3dbc0df3ab1593958f5169','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e58ca358fb3dbc0df3ab1593958f5169_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e58ca358fb3dbc0df3ab1593958f5169','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
