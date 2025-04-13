<?php /* Smarty version 2.6.25, created on 2014-01-13 13:57:55
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/53609a04ca721d5383bfa09ab9641aa2^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '5597c54b767d0d9db218c55b4deb606f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_5597c54b767d0d9db218c55b4deb606f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5597c54b767d0d9db218c55b4deb606f','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_5597c54b767d0d9db218c55b4deb606f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5597c54b767d0d9db218c55b4deb606f','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_5597c54b767d0d9db218c55b4deb606f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5597c54b767d0d9db218c55b4deb606f','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
