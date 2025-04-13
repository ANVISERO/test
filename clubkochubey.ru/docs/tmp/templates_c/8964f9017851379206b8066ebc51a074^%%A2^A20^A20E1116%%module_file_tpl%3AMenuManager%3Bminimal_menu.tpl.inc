<?php /* Smarty version 2.6.25, created on 2012-06-11 00:49:45
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/8964f9017851379206b8066ebc51a074^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'e9b34196e722bbcfbb9600436b4765de';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_e9b34196e722bbcfbb9600436b4765de_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e9b34196e722bbcfbb9600436b4765de','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e9b34196e722bbcfbb9600436b4765de_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e9b34196e722bbcfbb9600436b4765de','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e9b34196e722bbcfbb9600436b4765de_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e9b34196e722bbcfbb9600436b4765de','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
