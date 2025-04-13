<?php /* Smarty version 2.6.25, created on 2012-06-10 03:01:13
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/16b8b73516c891c5efe76abdec871497^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '0b89f55c427d9b810e9f9d12a0b9532e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_0b89f55c427d9b810e9f9d12a0b9532e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0b89f55c427d9b810e9f9d12a0b9532e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_0b89f55c427d9b810e9f9d12a0b9532e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0b89f55c427d9b810e9f9d12a0b9532e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_0b89f55c427d9b810e9f9d12a0b9532e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0b89f55c427d9b810e9f9d12a0b9532e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
