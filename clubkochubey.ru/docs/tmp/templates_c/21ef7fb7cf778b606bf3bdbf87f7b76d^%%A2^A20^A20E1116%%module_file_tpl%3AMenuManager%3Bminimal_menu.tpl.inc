<?php /* Smarty version 2.6.25, created on 2012-06-10 17:26:15
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/21ef7fb7cf778b606bf3bdbf87f7b76d^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'ca55d2a6e629b549bfe853e65331d9f2';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_ca55d2a6e629b549bfe853e65331d9f2_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ca55d2a6e629b549bfe853e65331d9f2','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ca55d2a6e629b549bfe853e65331d9f2_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ca55d2a6e629b549bfe853e65331d9f2','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ca55d2a6e629b549bfe853e65331d9f2_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ca55d2a6e629b549bfe853e65331d9f2','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
