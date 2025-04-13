<?php /* Smarty version 2.6.25, created on 2012-06-10 18:25:57
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/8eec5ea9f680b6a1bf0378166be3d7a2^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '89bb085741a3e107715656818a0a8fc4';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_89bb085741a3e107715656818a0a8fc4_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('89bb085741a3e107715656818a0a8fc4','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_89bb085741a3e107715656818a0a8fc4_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('89bb085741a3e107715656818a0a8fc4','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_89bb085741a3e107715656818a0a8fc4_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('89bb085741a3e107715656818a0a8fc4','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
