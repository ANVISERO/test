<?php /* Smarty version 2.6.25, created on 2013-03-07 10:57:21
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/a48f1509b8aff7b134368284c705e1ae^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '98d5c455797ba42e8ae60cce56b8b243';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_98d5c455797ba42e8ae60cce56b8b243_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('98d5c455797ba42e8ae60cce56b8b243','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_98d5c455797ba42e8ae60cce56b8b243_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('98d5c455797ba42e8ae60cce56b8b243','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_98d5c455797ba42e8ae60cce56b8b243_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('98d5c455797ba42e8ae60cce56b8b243','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
