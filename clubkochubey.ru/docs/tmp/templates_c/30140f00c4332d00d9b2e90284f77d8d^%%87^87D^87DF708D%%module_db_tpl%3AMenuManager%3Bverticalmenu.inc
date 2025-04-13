<?php /* Smarty version 2.6.25, created on 2012-06-09 17:10:38
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/30140f00c4332d00d9b2e90284f77d8d^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '3a0c5d586aab541bd31e4825a8e9b5c9';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_3a0c5d586aab541bd31e4825a8e9b5c9_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3a0c5d586aab541bd31e4825a8e9b5c9','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_3a0c5d586aab541bd31e4825a8e9b5c9_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3a0c5d586aab541bd31e4825a8e9b5c9','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_3a0c5d586aab541bd31e4825a8e9b5c9_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('3a0c5d586aab541bd31e4825a8e9b5c9','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
