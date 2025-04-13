<?php /* Smarty version 2.6.25, created on 2014-02-01 22:59:36
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/e06bc6d2726074ad0c4d29a14361900c^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'c2b0e6266c3ec400f79a30222ce4e9e8';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_c2b0e6266c3ec400f79a30222ce4e9e8_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c2b0e6266c3ec400f79a30222ce4e9e8','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c2b0e6266c3ec400f79a30222ce4e9e8_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c2b0e6266c3ec400f79a30222ce4e9e8','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c2b0e6266c3ec400f79a30222ce4e9e8_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c2b0e6266c3ec400f79a30222ce4e9e8','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
