<?php /* Smarty version 2.6.25, created on 2012-06-09 18:03:49
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/e57e505e894c3411357e5ee85cd96811^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e7ae313790f0e0fc594f55f0564357f3';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e7ae313790f0e0fc594f55f0564357f3_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e7ae313790f0e0fc594f55f0564357f3','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e7ae313790f0e0fc594f55f0564357f3_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e7ae313790f0e0fc594f55f0564357f3','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e7ae313790f0e0fc594f55f0564357f3_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e7ae313790f0e0fc594f55f0564357f3','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
