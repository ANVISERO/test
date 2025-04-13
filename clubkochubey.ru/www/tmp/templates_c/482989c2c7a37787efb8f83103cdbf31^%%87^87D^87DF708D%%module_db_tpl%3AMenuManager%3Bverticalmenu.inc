<?php /* Smarty version 2.6.25, created on 2014-01-13 13:58:21
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/482989c2c7a37787efb8f83103cdbf31^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '2c9e0437dd50f3c808f68399356d7b21';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_2c9e0437dd50f3c808f68399356d7b21_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c9e0437dd50f3c808f68399356d7b21','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_2c9e0437dd50f3c808f68399356d7b21_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c9e0437dd50f3c808f68399356d7b21','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_2c9e0437dd50f3c808f68399356d7b21_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c9e0437dd50f3c808f68399356d7b21','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
