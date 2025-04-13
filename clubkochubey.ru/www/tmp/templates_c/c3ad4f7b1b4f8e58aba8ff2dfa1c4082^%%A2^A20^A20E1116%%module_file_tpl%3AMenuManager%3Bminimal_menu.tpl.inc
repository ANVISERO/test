<?php /* Smarty version 2.6.25, created on 2014-01-15 01:06:16
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/c3ad4f7b1b4f8e58aba8ff2dfa1c4082^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ddfbcd17ff94a95b0d69af8f2ad73fb8';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ddfbcd17ff94a95b0d69af8f2ad73fb8_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ddfbcd17ff94a95b0d69af8f2ad73fb8','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ddfbcd17ff94a95b0d69af8f2ad73fb8_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ddfbcd17ff94a95b0d69af8f2ad73fb8','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ddfbcd17ff94a95b0d69af8f2ad73fb8_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ddfbcd17ff94a95b0d69af8f2ad73fb8','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
