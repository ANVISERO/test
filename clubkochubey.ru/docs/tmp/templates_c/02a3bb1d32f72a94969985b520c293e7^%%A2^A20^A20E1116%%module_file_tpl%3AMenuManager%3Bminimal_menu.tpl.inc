<?php /* Smarty version 2.6.25, created on 2012-06-10 17:37:14
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/02a3bb1d32f72a94969985b520c293e7^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'df88d7f378c92aed435b44a2731f50ed';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_df88d7f378c92aed435b44a2731f50ed_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('df88d7f378c92aed435b44a2731f50ed','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_df88d7f378c92aed435b44a2731f50ed_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('df88d7f378c92aed435b44a2731f50ed','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_df88d7f378c92aed435b44a2731f50ed_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('df88d7f378c92aed435b44a2731f50ed','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
