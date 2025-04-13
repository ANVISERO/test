<?php /* Smarty version 2.6.25, created on 2014-01-14 13:27:42
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/676eed701d7be2c736f2d827b25720e8^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'a692f1ab0307cc7061a37f6bc5c851ea';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_a692f1ab0307cc7061a37f6bc5c851ea_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a692f1ab0307cc7061a37f6bc5c851ea','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_a692f1ab0307cc7061a37f6bc5c851ea_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a692f1ab0307cc7061a37f6bc5c851ea','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_a692f1ab0307cc7061a37f6bc5c851ea_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a692f1ab0307cc7061a37f6bc5c851ea','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
