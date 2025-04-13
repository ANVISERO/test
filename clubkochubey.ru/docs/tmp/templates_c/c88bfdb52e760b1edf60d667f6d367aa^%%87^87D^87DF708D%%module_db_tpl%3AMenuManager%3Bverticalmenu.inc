<?php /* Smarty version 2.6.25, created on 2012-06-09 20:17:02
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/c88bfdb52e760b1edf60d667f6d367aa^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'f3cb3eef1a5518cc2d18c75b148ee97e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_f3cb3eef1a5518cc2d18c75b148ee97e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3cb3eef1a5518cc2d18c75b148ee97e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_f3cb3eef1a5518cc2d18c75b148ee97e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3cb3eef1a5518cc2d18c75b148ee97e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_f3cb3eef1a5518cc2d18c75b148ee97e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('f3cb3eef1a5518cc2d18c75b148ee97e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
