<?php /* Smarty version 2.6.25, created on 2012-06-11 00:44:09
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/18b5f92f97e60fc2afda002b61f51158^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '693961cf0f9e0683aa57c0771f724c03';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_693961cf0f9e0683aa57c0771f724c03_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('693961cf0f9e0683aa57c0771f724c03','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_693961cf0f9e0683aa57c0771f724c03_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('693961cf0f9e0683aa57c0771f724c03','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_693961cf0f9e0683aa57c0771f724c03_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('693961cf0f9e0683aa57c0771f724c03','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
