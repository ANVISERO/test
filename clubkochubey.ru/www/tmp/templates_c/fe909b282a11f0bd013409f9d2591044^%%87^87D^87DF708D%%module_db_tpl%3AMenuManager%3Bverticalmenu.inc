<?php /* Smarty version 2.6.25, created on 2014-01-14 02:26:08
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/fe909b282a11f0bd013409f9d2591044^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'd4527804535f4b00817529d6cdc5d69f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_d4527804535f4b00817529d6cdc5d69f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d4527804535f4b00817529d6cdc5d69f','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_d4527804535f4b00817529d6cdc5d69f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d4527804535f4b00817529d6cdc5d69f','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_d4527804535f4b00817529d6cdc5d69f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d4527804535f4b00817529d6cdc5d69f','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
