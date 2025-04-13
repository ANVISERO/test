<?php /* Smarty version 2.6.25, created on 2014-01-13 16:39:54
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/912b0b7f6cf3cd4265553af794f251bc^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'e77d2744fe1f5e83b7148704f6b2ab7e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_e77d2744fe1f5e83b7148704f6b2ab7e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e77d2744fe1f5e83b7148704f6b2ab7e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e77d2744fe1f5e83b7148704f6b2ab7e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e77d2744fe1f5e83b7148704f6b2ab7e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e77d2744fe1f5e83b7148704f6b2ab7e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e77d2744fe1f5e83b7148704f6b2ab7e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
