<?php /* Smarty version 2.6.25, created on 2014-01-15 09:13:17
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/5435acfc64411b9c4d27b5f294e993a5^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '0acd1b73c048defcf4f4e14ef7d6321c';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_0acd1b73c048defcf4f4e14ef7d6321c_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0acd1b73c048defcf4f4e14ef7d6321c','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_0acd1b73c048defcf4f4e14ef7d6321c_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0acd1b73c048defcf4f4e14ef7d6321c','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_0acd1b73c048defcf4f4e14ef7d6321c_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0acd1b73c048defcf4f4e14ef7d6321c','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
