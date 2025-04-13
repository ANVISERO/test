<?php /* Smarty version 2.6.25, created on 2013-03-07 06:34:50
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/cfc736ec6107c1844ea7b375fef132c2^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'f1badc010e19697b1ef46a741f85ae4e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_f1badc010e19697b1ef46a741f85ae4e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f1badc010e19697b1ef46a741f85ae4e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_f1badc010e19697b1ef46a741f85ae4e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f1badc010e19697b1ef46a741f85ae4e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_f1badc010e19697b1ef46a741f85ae4e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f1badc010e19697b1ef46a741f85ae4e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
