<?php /* Smarty version 2.6.25, created on 2014-01-15 09:16:38
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/569d2efde3f9dd24e75574b1c4ce4455^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'baa11e44f0354d7120651d3a79d70a78';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_baa11e44f0354d7120651d3a79d70a78_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('baa11e44f0354d7120651d3a79d70a78','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_baa11e44f0354d7120651d3a79d70a78_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('baa11e44f0354d7120651d3a79d70a78','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_baa11e44f0354d7120651d3a79d70a78_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('baa11e44f0354d7120651d3a79d70a78','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
