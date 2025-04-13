<?php /* Smarty version 2.6.25, created on 2014-01-13 14:56:19
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/ed8a34164bc90283905e74622dfc75b1^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'b9edd0618f72eee595e98e695b099124';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_b9edd0618f72eee595e98e695b099124_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9edd0618f72eee595e98e695b099124','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_b9edd0618f72eee595e98e695b099124_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9edd0618f72eee595e98e695b099124','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_b9edd0618f72eee595e98e695b099124_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('b9edd0618f72eee595e98e695b099124','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
