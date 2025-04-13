<?php /* Smarty version 2.6.25, created on 2012-06-10 00:40:57
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/d55861f8821c04e23729c6fe86fd1703^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '49eff6f1424b75839aee2ad651ec8b8e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_49eff6f1424b75839aee2ad651ec8b8e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('49eff6f1424b75839aee2ad651ec8b8e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_49eff6f1424b75839aee2ad651ec8b8e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('49eff6f1424b75839aee2ad651ec8b8e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_49eff6f1424b75839aee2ad651ec8b8e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('49eff6f1424b75839aee2ad651ec8b8e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
