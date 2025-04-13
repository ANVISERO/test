<?php /* Smarty version 2.6.25, created on 2012-06-12 08:01:16
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/8fc941ad7a837a4bc612e0ed3a7a476c^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ab7312b3cbcd0dfd9d539fda796b3627';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ab7312b3cbcd0dfd9d539fda796b3627_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ab7312b3cbcd0dfd9d539fda796b3627','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ab7312b3cbcd0dfd9d539fda796b3627_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ab7312b3cbcd0dfd9d539fda796b3627','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ab7312b3cbcd0dfd9d539fda796b3627_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ab7312b3cbcd0dfd9d539fda796b3627','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
