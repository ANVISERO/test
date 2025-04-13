<?php /* Smarty version 2.6.25, created on 2014-01-14 02:23:53
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/e397db8fc5c810029f960a815ff1796b^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '3c033e50a995cb2ee1aa8d85ff3ac255';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_3c033e50a995cb2ee1aa8d85ff3ac255_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3c033e50a995cb2ee1aa8d85ff3ac255','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_3c033e50a995cb2ee1aa8d85ff3ac255_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3c033e50a995cb2ee1aa8d85ff3ac255','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_3c033e50a995cb2ee1aa8d85ff3ac255_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3c033e50a995cb2ee1aa8d85ff3ac255','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
