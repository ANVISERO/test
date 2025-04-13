<?php /* Smarty version 2.6.25, created on 2012-06-17 15:58:09
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/dd427d809f7b2568d6316e73a09eb3b2^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'c684f10d334bccdf3b8d5ef50131d719';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_c684f10d334bccdf3b8d5ef50131d719_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c684f10d334bccdf3b8d5ef50131d719','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c684f10d334bccdf3b8d5ef50131d719_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c684f10d334bccdf3b8d5ef50131d719','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c684f10d334bccdf3b8d5ef50131d719_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c684f10d334bccdf3b8d5ef50131d719','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
