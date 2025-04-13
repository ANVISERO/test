<?php /* Smarty version 2.6.25, created on 2012-06-10 09:46:15
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/912fab01734403c5bd49acc940aeb1ab^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'd5fc3ac4052b12ad9aa9a44458832ed6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_d5fc3ac4052b12ad9aa9a44458832ed6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d5fc3ac4052b12ad9aa9a44458832ed6','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_d5fc3ac4052b12ad9aa9a44458832ed6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d5fc3ac4052b12ad9aa9a44458832ed6','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_d5fc3ac4052b12ad9aa9a44458832ed6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d5fc3ac4052b12ad9aa9a44458832ed6','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
