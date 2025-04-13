<?php /* Smarty version 2.6.25, created on 2014-01-14 02:30:30
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/7ef4aca64379de7e42a222030b29dd71^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '53f44632a04df7c01bc7f5e0a5775f5d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_53f44632a04df7c01bc7f5e0a5775f5d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('53f44632a04df7c01bc7f5e0a5775f5d','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_53f44632a04df7c01bc7f5e0a5775f5d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('53f44632a04df7c01bc7f5e0a5775f5d','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_53f44632a04df7c01bc7f5e0a5775f5d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('53f44632a04df7c01bc7f5e0a5775f5d','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
