<?php /* Smarty version 2.6.25, created on 2014-02-01 22:59:36
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/0af599aae793be3a091d63ed905ef63a^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '196dd6669e3965d6a38e5d5d8d16c13f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_196dd6669e3965d6a38e5d5d8d16c13f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('196dd6669e3965d6a38e5d5d8d16c13f','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_196dd6669e3965d6a38e5d5d8d16c13f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('196dd6669e3965d6a38e5d5d8d16c13f','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_196dd6669e3965d6a38e5d5d8d16c13f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('196dd6669e3965d6a38e5d5d8d16c13f','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
