<?php /* Smarty version 2.6.25, created on 2012-06-11 00:36:01
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/45a38c9d5508a145cc573d9a17a5f29d^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ad95db754d2cd22e49dc6c746ad0e845';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ad95db754d2cd22e49dc6c746ad0e845_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad95db754d2cd22e49dc6c746ad0e845','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ad95db754d2cd22e49dc6c746ad0e845_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad95db754d2cd22e49dc6c746ad0e845','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ad95db754d2cd22e49dc6c746ad0e845_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad95db754d2cd22e49dc6c746ad0e845','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
