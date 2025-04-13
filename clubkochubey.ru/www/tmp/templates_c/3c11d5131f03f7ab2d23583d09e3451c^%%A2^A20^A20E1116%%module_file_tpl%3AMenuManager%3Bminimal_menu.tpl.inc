<?php /* Smarty version 2.6.25, created on 2014-01-15 09:16:23
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/3c11d5131f03f7ab2d23583d09e3451c^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'f4c9e7b741b93e93131353df47831f63';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_f4c9e7b741b93e93131353df47831f63_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f4c9e7b741b93e93131353df47831f63','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_f4c9e7b741b93e93131353df47831f63_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f4c9e7b741b93e93131353df47831f63','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_f4c9e7b741b93e93131353df47831f63_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f4c9e7b741b93e93131353df47831f63','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
