<?php /* Smarty version 2.6.25, created on 2013-03-07 06:18:13
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/e0a22b27adadf38beae4a475cd1d3f82^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '8977f84048047f8983473e99e1c03cdc';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_8977f84048047f8983473e99e1c03cdc_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8977f84048047f8983473e99e1c03cdc','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_8977f84048047f8983473e99e1c03cdc_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8977f84048047f8983473e99e1c03cdc','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_8977f84048047f8983473e99e1c03cdc_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8977f84048047f8983473e99e1c03cdc','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
