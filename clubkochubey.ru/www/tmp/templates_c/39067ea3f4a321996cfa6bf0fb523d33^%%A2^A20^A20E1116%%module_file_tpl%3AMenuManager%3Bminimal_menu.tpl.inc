<?php /* Smarty version 2.6.25, created on 2014-01-13 13:56:42
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/39067ea3f4a321996cfa6bf0fb523d33^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = '974aad6e705765a0699397c6d78280d6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php
function _smarty_tplfunc_974aad6e705765a0699397c6d78280d6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('974aad6e705765a0699397c6d78280d6','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_974aad6e705765a0699397c6d78280d6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('974aad6e705765a0699397c6d78280d6','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_974aad6e705765a0699397c6d78280d6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('974aad6e705765a0699397c6d78280d6','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
