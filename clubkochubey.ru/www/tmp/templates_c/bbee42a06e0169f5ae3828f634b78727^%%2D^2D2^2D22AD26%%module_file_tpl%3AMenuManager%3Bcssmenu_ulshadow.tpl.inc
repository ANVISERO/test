<?php /* Smarty version 2.6.25, created on 2014-01-19 04:09:09
         compiled from module_file_tpl:MenuManager%3Bcssmenu_ulshadow.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/bbee42a06e0169f5ae3828f634b78727^%%2D^2D2^2D22AD26%%module_file_tpl%3AMenuManager%3Bcssmenu_ulshadow.tpl.inc'] = 'cc927f1cff1a22f880aebe9db1c71273';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;cssmenu_ulshadow.tpl', 11, false),)), $this); ?>
<?php
function _smarty_tplfunc_cc927f1cff1a22f880aebe9db1c71273_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc927f1cff1a22f880aebe9db1c71273','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_cc927f1cff1a22f880aebe9db1c71273_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc927f1cff1a22f880aebe9db1c71273','1');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_cc927f1cff1a22f880aebe9db1c71273_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('cc927f1cff1a22f880aebe9db1c71273','2');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
