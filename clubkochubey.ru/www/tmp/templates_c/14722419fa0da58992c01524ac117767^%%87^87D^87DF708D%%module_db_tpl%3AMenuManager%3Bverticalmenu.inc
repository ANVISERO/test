<?php /* Smarty version 2.6.25, created on 2014-01-13 23:13:29
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/14722419fa0da58992c01524ac117767^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'c08d7003cdad6111add5eff52c19de84';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_c08d7003cdad6111add5eff52c19de84_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c08d7003cdad6111add5eff52c19de84','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c08d7003cdad6111add5eff52c19de84_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c08d7003cdad6111add5eff52c19de84','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c08d7003cdad6111add5eff52c19de84_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c08d7003cdad6111add5eff52c19de84','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
