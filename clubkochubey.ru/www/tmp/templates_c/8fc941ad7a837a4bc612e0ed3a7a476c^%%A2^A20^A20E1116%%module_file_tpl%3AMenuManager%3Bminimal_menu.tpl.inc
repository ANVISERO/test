<?php /* Smarty version 2.6.25, created on 2014-01-14 05:18:56
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/8fc941ad7a837a4bc612e0ed3a7a476c^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ffcf447a38d477de1ab8511563fa1406';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ffcf447a38d477de1ab8511563fa1406_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ffcf447a38d477de1ab8511563fa1406','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ffcf447a38d477de1ab8511563fa1406_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ffcf447a38d477de1ab8511563fa1406','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ffcf447a38d477de1ab8511563fa1406_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ffcf447a38d477de1ab8511563fa1406','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
