<?php /* Smarty version 2.6.25, created on 2012-06-10 00:40:59
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/f05f90014904e49613c19cc48151bbde^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '7b922f7483dba1492925723b110b8dbb';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_7b922f7483dba1492925723b110b8dbb_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b922f7483dba1492925723b110b8dbb','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7b922f7483dba1492925723b110b8dbb_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b922f7483dba1492925723b110b8dbb','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7b922f7483dba1492925723b110b8dbb_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7b922f7483dba1492925723b110b8dbb','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
