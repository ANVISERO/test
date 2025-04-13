<?php /* Smarty version 2.6.25, created on 2012-06-11 15:20:14
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/b35178a56afd47802afda16779693b16^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '57263377b24b14b43f32361a6b15602f';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_57263377b24b14b43f32361a6b15602f_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('57263377b24b14b43f32361a6b15602f','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_57263377b24b14b43f32361a6b15602f_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('57263377b24b14b43f32361a6b15602f','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_57263377b24b14b43f32361a6b15602f_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('57263377b24b14b43f32361a6b15602f','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
