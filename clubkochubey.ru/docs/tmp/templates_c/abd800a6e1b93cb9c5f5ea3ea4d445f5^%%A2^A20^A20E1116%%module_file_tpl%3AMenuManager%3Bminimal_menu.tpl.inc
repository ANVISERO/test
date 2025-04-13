<?php /* Smarty version 2.6.25, created on 2012-06-11 00:44:35
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/abd800a6e1b93cb9c5f5ea3ea4d445f5^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '4525220dcf7349a7b73c35c48c1e35ff';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_4525220dcf7349a7b73c35c48c1e35ff_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4525220dcf7349a7b73c35c48c1e35ff','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_4525220dcf7349a7b73c35c48c1e35ff_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4525220dcf7349a7b73c35c48c1e35ff','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_4525220dcf7349a7b73c35c48c1e35ff_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4525220dcf7349a7b73c35c48c1e35ff','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
