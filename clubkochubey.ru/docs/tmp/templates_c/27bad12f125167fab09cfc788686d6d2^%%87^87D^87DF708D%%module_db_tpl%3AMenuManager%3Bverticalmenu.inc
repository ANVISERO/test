<?php /* Smarty version 2.6.25, created on 2012-06-09 17:49:35
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/27bad12f125167fab09cfc788686d6d2^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '6d0adf20f17ce7220db3d4a11cb0fc87';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_6d0adf20f17ce7220db3d4a11cb0fc87_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d0adf20f17ce7220db3d4a11cb0fc87','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_6d0adf20f17ce7220db3d4a11cb0fc87_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d0adf20f17ce7220db3d4a11cb0fc87','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_6d0adf20f17ce7220db3d4a11cb0fc87_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('6d0adf20f17ce7220db3d4a11cb0fc87','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
