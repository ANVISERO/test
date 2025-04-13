<?php /* Smarty version 2.6.25, created on 2012-06-11 00:03:31
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/1fe78b6b32c0a3c8d84563219115c9c6^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'de3be1183f5a003227061c4d9d8588a2';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_de3be1183f5a003227061c4d9d8588a2_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('de3be1183f5a003227061c4d9d8588a2','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_de3be1183f5a003227061c4d9d8588a2_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('de3be1183f5a003227061c4d9d8588a2','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_de3be1183f5a003227061c4d9d8588a2_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('de3be1183f5a003227061c4d9d8588a2','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
