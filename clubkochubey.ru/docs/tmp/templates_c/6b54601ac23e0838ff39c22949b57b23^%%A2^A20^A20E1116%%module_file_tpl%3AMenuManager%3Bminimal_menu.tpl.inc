<?php /* Smarty version 2.6.25, created on 2012-06-10 19:46:54
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/6b54601ac23e0838ff39c22949b57b23^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '887ef5382084fcacc25740e4d050f924';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_887ef5382084fcacc25740e4d050f924_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('887ef5382084fcacc25740e4d050f924','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_887ef5382084fcacc25740e4d050f924_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('887ef5382084fcacc25740e4d050f924','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_887ef5382084fcacc25740e4d050f924_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('887ef5382084fcacc25740e4d050f924','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
