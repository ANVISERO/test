<?php /* Smarty version 2.6.25, created on 2012-06-10 19:24:12
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/07165d583091cc6ad5e8d66e78274fd1^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'cb2e94c5a52edd85fdec970a87cd4c6f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_cb2e94c5a52edd85fdec970a87cd4c6f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cb2e94c5a52edd85fdec970a87cd4c6f','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_cb2e94c5a52edd85fdec970a87cd4c6f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cb2e94c5a52edd85fdec970a87cd4c6f','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_cb2e94c5a52edd85fdec970a87cd4c6f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cb2e94c5a52edd85fdec970a87cd4c6f','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
