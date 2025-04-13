<?php /* Smarty version 2.6.25, created on 2013-03-07 12:31:01
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/3cda7569f07fe063e54c4a108bddae71^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'fbd0b065d6cc6c9ff5eae230ad8f73b2';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_fbd0b065d6cc6c9ff5eae230ad8f73b2_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('fbd0b065d6cc6c9ff5eae230ad8f73b2','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_fbd0b065d6cc6c9ff5eae230ad8f73b2_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('fbd0b065d6cc6c9ff5eae230ad8f73b2','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_fbd0b065d6cc6c9ff5eae230ad8f73b2_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('fbd0b065d6cc6c9ff5eae230ad8f73b2','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
