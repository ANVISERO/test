<?php /* Smarty version 2.6.25, created on 2014-01-13 13:58:10
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/c42c89944ce8232c71464c8fc8bac227^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'aa855ec3789516a783c6ab9e48c4547e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_aa855ec3789516a783c6ab9e48c4547e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('aa855ec3789516a783c6ab9e48c4547e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_aa855ec3789516a783c6ab9e48c4547e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('aa855ec3789516a783c6ab9e48c4547e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_aa855ec3789516a783c6ab9e48c4547e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('aa855ec3789516a783c6ab9e48c4547e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
