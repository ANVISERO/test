<?php /* Smarty version 2.6.25, created on 2012-06-16 11:15:24
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/f07ce9c8152c5902d2427f7ec92338bc^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'c12b872c03d3027a03e057e8ec020d20';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_c12b872c03d3027a03e057e8ec020d20_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c12b872c03d3027a03e057e8ec020d20','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c12b872c03d3027a03e057e8ec020d20_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c12b872c03d3027a03e057e8ec020d20','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c12b872c03d3027a03e057e8ec020d20_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c12b872c03d3027a03e057e8ec020d20','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
