<?php /* Smarty version 2.6.25, created on 2014-01-15 02:22:03
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/9300d8f1d5081dc7b9bb10fef3edf540^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '9dc656168bf1a97dc6b25214eeeea85a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_9dc656168bf1a97dc6b25214eeeea85a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9dc656168bf1a97dc6b25214eeeea85a','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_9dc656168bf1a97dc6b25214eeeea85a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9dc656168bf1a97dc6b25214eeeea85a','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_9dc656168bf1a97dc6b25214eeeea85a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9dc656168bf1a97dc6b25214eeeea85a','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
