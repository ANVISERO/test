<?php /* Smarty version 2.6.25, created on 2013-03-07 15:48:39
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/b881a8208388e055c9bad32d032929eb^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'be51cb7c633dc8fdf54c6989c44a8b9a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_be51cb7c633dc8fdf54c6989c44a8b9a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('be51cb7c633dc8fdf54c6989c44a8b9a','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_be51cb7c633dc8fdf54c6989c44a8b9a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('be51cb7c633dc8fdf54c6989c44a8b9a','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_be51cb7c633dc8fdf54c6989c44a8b9a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('be51cb7c633dc8fdf54c6989c44a8b9a','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
