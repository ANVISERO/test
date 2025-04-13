<?php /* Smarty version 2.6.25, created on 2014-01-15 01:06:16
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/c2b954fec0cf817cc12b92b49b00d31c^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '39a8f508c16d3903d4270719f07021cd';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_39a8f508c16d3903d4270719f07021cd_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('39a8f508c16d3903d4270719f07021cd','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_39a8f508c16d3903d4270719f07021cd_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('39a8f508c16d3903d4270719f07021cd','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_39a8f508c16d3903d4270719f07021cd_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('39a8f508c16d3903d4270719f07021cd','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
