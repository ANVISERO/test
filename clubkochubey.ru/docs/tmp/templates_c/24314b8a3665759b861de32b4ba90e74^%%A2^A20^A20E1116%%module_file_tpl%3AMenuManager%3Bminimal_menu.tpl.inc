<?php /* Smarty version 2.6.25, created on 2013-03-07 06:34:50
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/24314b8a3665759b861de32b4ba90e74^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '99da7303699a4659f0791602901d5046';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_99da7303699a4659f0791602901d5046_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('99da7303699a4659f0791602901d5046','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_99da7303699a4659f0791602901d5046_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('99da7303699a4659f0791602901d5046','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_99da7303699a4659f0791602901d5046_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('99da7303699a4659f0791602901d5046','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
