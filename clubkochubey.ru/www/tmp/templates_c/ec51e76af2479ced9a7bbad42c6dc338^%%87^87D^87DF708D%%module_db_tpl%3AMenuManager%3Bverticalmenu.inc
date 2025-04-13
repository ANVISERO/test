<?php /* Smarty version 2.6.25, created on 2014-01-15 09:13:17
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/ec51e76af2479ced9a7bbad42c6dc338^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'a3b694a65159e0b2663699e1f2da8a1e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_a3b694a65159e0b2663699e1f2da8a1e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a3b694a65159e0b2663699e1f2da8a1e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_a3b694a65159e0b2663699e1f2da8a1e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a3b694a65159e0b2663699e1f2da8a1e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_a3b694a65159e0b2663699e1f2da8a1e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a3b694a65159e0b2663699e1f2da8a1e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
