<?php /* Smarty version 2.6.25, created on 2014-01-13 13:57:34
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/e0a22b27adadf38beae4a475cd1d3f82^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '485dfa53999f5ff1ad7fe27a095f145f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_485dfa53999f5ff1ad7fe27a095f145f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('485dfa53999f5ff1ad7fe27a095f145f','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_485dfa53999f5ff1ad7fe27a095f145f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('485dfa53999f5ff1ad7fe27a095f145f','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_485dfa53999f5ff1ad7fe27a095f145f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('485dfa53999f5ff1ad7fe27a095f145f','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
