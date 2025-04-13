<?php /* Smarty version 2.6.25, created on 2012-06-09 17:26:20
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/f001e5378803d3d26ae745df234f8038^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '434a35eaaecec5572229fe85b85e572b';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_434a35eaaecec5572229fe85b85e572b_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('434a35eaaecec5572229fe85b85e572b','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_434a35eaaecec5572229fe85b85e572b_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('434a35eaaecec5572229fe85b85e572b','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_434a35eaaecec5572229fe85b85e572b_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('434a35eaaecec5572229fe85b85e572b','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
