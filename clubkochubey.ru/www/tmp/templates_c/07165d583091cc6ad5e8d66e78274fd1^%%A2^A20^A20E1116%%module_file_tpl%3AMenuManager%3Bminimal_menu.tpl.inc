<?php /* Smarty version 2.6.25, created on 2014-01-13 16:08:07
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/07165d583091cc6ad5e8d66e78274fd1^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ff2b10c8c117f3ffa5f53dd9a7835f50';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ff2b10c8c117f3ffa5f53dd9a7835f50_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ff2b10c8c117f3ffa5f53dd9a7835f50','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ff2b10c8c117f3ffa5f53dd9a7835f50_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ff2b10c8c117f3ffa5f53dd9a7835f50','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ff2b10c8c117f3ffa5f53dd9a7835f50_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ff2b10c8c117f3ffa5f53dd9a7835f50','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
