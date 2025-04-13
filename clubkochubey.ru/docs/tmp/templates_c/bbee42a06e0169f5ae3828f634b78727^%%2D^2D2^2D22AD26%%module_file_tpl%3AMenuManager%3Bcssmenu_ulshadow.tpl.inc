<?php /* Smarty version 2.6.25, created on 2013-03-08 07:47:21
         compiled from module_file_tpl:MenuManager%3Bcssmenu_ulshadow.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/bbee42a06e0169f5ae3828f634b78727^%%2D^2D2^2D22AD26%%module_file_tpl%3AMenuManager%3Bcssmenu_ulshadow.tpl.inc'] = '325ed14f17efc64a07fd649be27e4f47';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;cssmenu_ulshadow.tpl', 11, false),)), $this); ?>
<?php
function _smarty_tplfunc_325ed14f17efc64a07fd649be27e4f47_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_325ed14f17efc64a07fd649be27e4f47_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','1');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_325ed14f17efc64a07fd649be27e4f47_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','2');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
