<?php /* Smarty version 2.6.25, created on 2013-03-07 16:00:24
         compiled from module_file_tpl:MenuManager%3Bcssmenu_ulshadow.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/b8679e1974a99e451030fad3c1d54638^%%2D^2D2^2D22AD26%%module_file_tpl%3AMenuManager%3Bcssmenu_ulshadow.tpl.inc'] = '878f1d64ab2782949c28d9c4625ac812';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;cssmenu_ulshadow.tpl', 11, false),)), $this); ?>
<?php
function _smarty_tplfunc_878f1d64ab2782949c28d9c4625ac812_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('878f1d64ab2782949c28d9c4625ac812','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_878f1d64ab2782949c28d9c4625ac812_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('878f1d64ab2782949c28d9c4625ac812','1');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_878f1d64ab2782949c28d9c4625ac812_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('878f1d64ab2782949c28d9c4625ac812','2');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
