<?php /* Smarty version 2.6.25, created on 2012-06-11 01:01:03
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/93effa4e8c2c23607a2a3e870417528b^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '0becfb6280e1c2d1d3334e5449be852d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_0becfb6280e1c2d1d3334e5449be852d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0becfb6280e1c2d1d3334e5449be852d','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_0becfb6280e1c2d1d3334e5449be852d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0becfb6280e1c2d1d3334e5449be852d','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_0becfb6280e1c2d1d3334e5449be852d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0becfb6280e1c2d1d3334e5449be852d','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
