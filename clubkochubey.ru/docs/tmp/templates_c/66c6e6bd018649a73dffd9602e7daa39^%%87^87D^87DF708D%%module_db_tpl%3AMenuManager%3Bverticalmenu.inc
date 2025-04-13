<?php /* Smarty version 2.6.25, created on 2012-06-10 14:33:25
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/66c6e6bd018649a73dffd9602e7daa39^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'badf8f496f91cf4369a708bd60b057a2';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_badf8f496f91cf4369a708bd60b057a2_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('badf8f496f91cf4369a708bd60b057a2','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_badf8f496f91cf4369a708bd60b057a2_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('badf8f496f91cf4369a708bd60b057a2','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_badf8f496f91cf4369a708bd60b057a2_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('badf8f496f91cf4369a708bd60b057a2','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
