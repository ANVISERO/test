<?php /* Smarty version 2.6.25, created on 2012-06-11 00:31:54
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/6d023ba275d160c2a7b410a9a59ddd72^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '8f49cfcd7ebd5fa740c61f01ce4bfdfe';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_8f49cfcd7ebd5fa740c61f01ce4bfdfe_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8f49cfcd7ebd5fa740c61f01ce4bfdfe','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_8f49cfcd7ebd5fa740c61f01ce4bfdfe_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8f49cfcd7ebd5fa740c61f01ce4bfdfe','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_8f49cfcd7ebd5fa740c61f01ce4bfdfe_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8f49cfcd7ebd5fa740c61f01ce4bfdfe','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
