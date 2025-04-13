<?php /* Smarty version 2.6.25, created on 2014-01-13 13:56:52
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/9be3ac5fa062b6ff27820208f362bf9b^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '3954cd5d597eb75e7f775fb271630c4c';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_3954cd5d597eb75e7f775fb271630c4c_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3954cd5d597eb75e7f775fb271630c4c','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_3954cd5d597eb75e7f775fb271630c4c_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3954cd5d597eb75e7f775fb271630c4c','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_3954cd5d597eb75e7f775fb271630c4c_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3954cd5d597eb75e7f775fb271630c4c','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
