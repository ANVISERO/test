<?php /* Smarty version 2.6.25, created on 2014-01-14 03:00:25
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/50831ba720c71d2e20d99cb6be7d06ac^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '220c5c83dffd2f94d7dcb2410f80a09a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_220c5c83dffd2f94d7dcb2410f80a09a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('220c5c83dffd2f94d7dcb2410f80a09a','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_220c5c83dffd2f94d7dcb2410f80a09a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('220c5c83dffd2f94d7dcb2410f80a09a','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_220c5c83dffd2f94d7dcb2410f80a09a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('220c5c83dffd2f94d7dcb2410f80a09a','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
