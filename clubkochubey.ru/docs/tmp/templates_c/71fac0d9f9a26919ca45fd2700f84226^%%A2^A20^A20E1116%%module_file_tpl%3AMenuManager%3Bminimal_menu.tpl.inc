<?php /* Smarty version 2.6.25, created on 2012-06-10 07:02:52
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/71fac0d9f9a26919ca45fd2700f84226^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '2c1e17b68230f1d9a4120a762b3f1fa6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_2c1e17b68230f1d9a4120a762b3f1fa6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c1e17b68230f1d9a4120a762b3f1fa6','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_2c1e17b68230f1d9a4120a762b3f1fa6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c1e17b68230f1d9a4120a762b3f1fa6','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_2c1e17b68230f1d9a4120a762b3f1fa6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('2c1e17b68230f1d9a4120a762b3f1fa6','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
