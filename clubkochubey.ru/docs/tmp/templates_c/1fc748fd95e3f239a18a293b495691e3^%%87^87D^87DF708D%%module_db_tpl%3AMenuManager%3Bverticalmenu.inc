<?php /* Smarty version 2.6.25, created on 2012-06-10 18:11:55
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/1fc748fd95e3f239a18a293b495691e3^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '51a46b9b5c240a4c3f41b63237736e0a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_51a46b9b5c240a4c3f41b63237736e0a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('51a46b9b5c240a4c3f41b63237736e0a','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_51a46b9b5c240a4c3f41b63237736e0a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('51a46b9b5c240a4c3f41b63237736e0a','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_51a46b9b5c240a4c3f41b63237736e0a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('51a46b9b5c240a4c3f41b63237736e0a','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
