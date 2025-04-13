<?php /* Smarty version 2.6.25, created on 2013-03-07 12:28:49
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/02f731c9f14c08fb82e97aa5924a3965^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '7efa7978580cb695e6d4118806f1d7d7';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_7efa7978580cb695e6d4118806f1d7d7_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7efa7978580cb695e6d4118806f1d7d7','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7efa7978580cb695e6d4118806f1d7d7_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7efa7978580cb695e6d4118806f1d7d7','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7efa7978580cb695e6d4118806f1d7d7_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7efa7978580cb695e6d4118806f1d7d7','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
