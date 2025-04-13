<?php /* Smarty version 2.6.25, created on 2013-03-07 15:48:46
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/4638f576f291d5a20c635ffa8ea3ee15^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'afb4fa320d285fbf5d6bdbff36042959';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_afb4fa320d285fbf5d6bdbff36042959_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('afb4fa320d285fbf5d6bdbff36042959','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_afb4fa320d285fbf5d6bdbff36042959_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('afb4fa320d285fbf5d6bdbff36042959','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_afb4fa320d285fbf5d6bdbff36042959_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('afb4fa320d285fbf5d6bdbff36042959','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
