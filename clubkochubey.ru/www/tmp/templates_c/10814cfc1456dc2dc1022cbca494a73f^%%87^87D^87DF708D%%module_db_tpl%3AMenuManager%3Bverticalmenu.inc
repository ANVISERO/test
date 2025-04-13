<?php /* Smarty version 2.6.25, created on 2014-01-13 14:56:20
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/10814cfc1456dc2dc1022cbca494a73f^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '42a1e209a786875d4b0f5f69c4c3e9d2';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_42a1e209a786875d4b0f5f69c4c3e9d2_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('42a1e209a786875d4b0f5f69c4c3e9d2','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_42a1e209a786875d4b0f5f69c4c3e9d2_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('42a1e209a786875d4b0f5f69c4c3e9d2','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_42a1e209a786875d4b0f5f69c4c3e9d2_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('42a1e209a786875d4b0f5f69c4c3e9d2','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
