<?php /* Smarty version 2.6.25, created on 2012-06-09 18:08:52
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/55245ffa7a949934c825d84bb35cd11b^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '85472fb94d5dd401413bba7b3f045e0d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_85472fb94d5dd401413bba7b3f045e0d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('85472fb94d5dd401413bba7b3f045e0d','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_85472fb94d5dd401413bba7b3f045e0d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('85472fb94d5dd401413bba7b3f045e0d','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_85472fb94d5dd401413bba7b3f045e0d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('85472fb94d5dd401413bba7b3f045e0d','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
