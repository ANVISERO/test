<?php /* Smarty version 2.6.25, created on 2013-03-07 10:57:22
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/767903a114e1aae6648795e50fd0c5fa^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '000120a5c669fb7b9758dde4b2b5bc56';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_000120a5c669fb7b9758dde4b2b5bc56_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('000120a5c669fb7b9758dde4b2b5bc56','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_000120a5c669fb7b9758dde4b2b5bc56_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('000120a5c669fb7b9758dde4b2b5bc56','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_000120a5c669fb7b9758dde4b2b5bc56_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('000120a5c669fb7b9758dde4b2b5bc56','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
