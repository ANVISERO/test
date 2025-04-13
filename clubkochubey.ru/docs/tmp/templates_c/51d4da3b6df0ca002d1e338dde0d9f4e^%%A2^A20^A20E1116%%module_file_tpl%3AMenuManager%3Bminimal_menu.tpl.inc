<?php /* Smarty version 2.6.25, created on 2012-06-11 00:43:59
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/51d4da3b6df0ca002d1e338dde0d9f4e^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '0342cef12e36a875a997fa9917cda4b0';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_0342cef12e36a875a997fa9917cda4b0_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0342cef12e36a875a997fa9917cda4b0','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_0342cef12e36a875a997fa9917cda4b0_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0342cef12e36a875a997fa9917cda4b0','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_0342cef12e36a875a997fa9917cda4b0_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0342cef12e36a875a997fa9917cda4b0','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
