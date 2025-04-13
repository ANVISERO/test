<?php /* Smarty version 2.6.25, created on 2014-01-15 09:19:08
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/abd800a6e1b93cb9c5f5ea3ea4d445f5^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '3fd92e43b4ce7578e345f409b6236955';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_3fd92e43b4ce7578e345f409b6236955_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3fd92e43b4ce7578e345f409b6236955','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_3fd92e43b4ce7578e345f409b6236955_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3fd92e43b4ce7578e345f409b6236955','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_3fd92e43b4ce7578e345f409b6236955_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3fd92e43b4ce7578e345f409b6236955','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
