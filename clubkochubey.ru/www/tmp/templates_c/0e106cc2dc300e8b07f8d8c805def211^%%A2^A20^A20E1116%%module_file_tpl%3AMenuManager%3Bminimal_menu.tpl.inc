<?php /* Smarty version 2.6.25, created on 2014-01-14 21:13:39
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/0e106cc2dc300e8b07f8d8c805def211^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'f3fdd6c13a57a644f64bb3a8d8085b93';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_f3fdd6c13a57a644f64bb3a8d8085b93_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3fdd6c13a57a644f64bb3a8d8085b93','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_f3fdd6c13a57a644f64bb3a8d8085b93_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3fdd6c13a57a644f64bb3a8d8085b93','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_f3fdd6c13a57a644f64bb3a8d8085b93_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3fdd6c13a57a644f64bb3a8d8085b93','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
