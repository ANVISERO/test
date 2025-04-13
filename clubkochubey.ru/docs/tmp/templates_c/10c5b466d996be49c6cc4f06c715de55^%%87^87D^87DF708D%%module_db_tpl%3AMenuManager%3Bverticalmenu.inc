<?php /* Smarty version 2.6.25, created on 2012-06-12 17:50:15
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/10c5b466d996be49c6cc4f06c715de55^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '80b520a80ac0b13c83585e365d922f86';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_80b520a80ac0b13c83585e365d922f86_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('80b520a80ac0b13c83585e365d922f86','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_80b520a80ac0b13c83585e365d922f86_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('80b520a80ac0b13c83585e365d922f86','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_80b520a80ac0b13c83585e365d922f86_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('80b520a80ac0b13c83585e365d922f86','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
