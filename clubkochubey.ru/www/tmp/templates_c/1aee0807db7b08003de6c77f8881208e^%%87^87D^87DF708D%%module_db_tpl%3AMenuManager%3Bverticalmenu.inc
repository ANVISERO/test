<?php /* Smarty version 2.6.25, created on 2014-01-14 01:25:02
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/1aee0807db7b08003de6c77f8881208e^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '8d98ee8045e9924d5ad687eacc4ef176';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_8d98ee8045e9924d5ad687eacc4ef176_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_8d98ee8045e9924d5ad687eacc4ef176_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_8d98ee8045e9924d5ad687eacc4ef176_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
