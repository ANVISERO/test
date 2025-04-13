<?php /* Smarty version 2.6.25, created on 2014-01-15 09:11:52
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/80b9981fc102baa5e305b056ee191932^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'bc525928b9253f9d8b43f7dcb0f92f75';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_bc525928b9253f9d8b43f7dcb0f92f75_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc525928b9253f9d8b43f7dcb0f92f75','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_bc525928b9253f9d8b43f7dcb0f92f75_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc525928b9253f9d8b43f7dcb0f92f75','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_bc525928b9253f9d8b43f7dcb0f92f75_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('bc525928b9253f9d8b43f7dcb0f92f75','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
