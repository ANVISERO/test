<?php /* Smarty version 2.6.25, created on 2012-06-10 12:09:58
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/4f01f81bd47e0a318029c8b3beba2a42^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'c1a6ac80cb9e9a89b7e9da0eb6c4f093';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_c1a6ac80cb9e9a89b7e9da0eb6c4f093_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c1a6ac80cb9e9a89b7e9da0eb6c4f093','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_c1a6ac80cb9e9a89b7e9da0eb6c4f093_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c1a6ac80cb9e9a89b7e9da0eb6c4f093','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_c1a6ac80cb9e9a89b7e9da0eb6c4f093_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c1a6ac80cb9e9a89b7e9da0eb6c4f093','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
