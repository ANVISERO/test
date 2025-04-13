<?php /* Smarty version 2.6.25, created on 2014-01-13 14:56:24
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/4c6175c0f57975f2124376cc7ad2fa13^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'b9c2e3bdb7834d4107a968b181688d3b';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_b9c2e3bdb7834d4107a968b181688d3b_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9c2e3bdb7834d4107a968b181688d3b','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_b9c2e3bdb7834d4107a968b181688d3b_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9c2e3bdb7834d4107a968b181688d3b','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_b9c2e3bdb7834d4107a968b181688d3b_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9c2e3bdb7834d4107a968b181688d3b','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
