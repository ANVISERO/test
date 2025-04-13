<?php /* Smarty version 2.6.25, created on 2014-01-13 14:59:28
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/c88bfdb52e760b1edf60d667f6d367aa^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'af783e2e02c7865c2c682a142c92fa06';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_af783e2e02c7865c2c682a142c92fa06_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('af783e2e02c7865c2c682a142c92fa06','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_af783e2e02c7865c2c682a142c92fa06_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('af783e2e02c7865c2c682a142c92fa06','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_af783e2e02c7865c2c682a142c92fa06_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('af783e2e02c7865c2c682a142c92fa06','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
