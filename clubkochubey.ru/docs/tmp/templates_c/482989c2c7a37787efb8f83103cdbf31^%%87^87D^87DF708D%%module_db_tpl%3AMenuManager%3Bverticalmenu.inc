<?php /* Smarty version 2.6.25, created on 2012-06-09 17:24:12
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/482989c2c7a37787efb8f83103cdbf31^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'e0a77d8ab3aa5afe3691f3d9836f2245';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_e0a77d8ab3aa5afe3691f3d9836f2245_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e0a77d8ab3aa5afe3691f3d9836f2245','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e0a77d8ab3aa5afe3691f3d9836f2245_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e0a77d8ab3aa5afe3691f3d9836f2245','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e0a77d8ab3aa5afe3691f3d9836f2245_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e0a77d8ab3aa5afe3691f3d9836f2245','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
