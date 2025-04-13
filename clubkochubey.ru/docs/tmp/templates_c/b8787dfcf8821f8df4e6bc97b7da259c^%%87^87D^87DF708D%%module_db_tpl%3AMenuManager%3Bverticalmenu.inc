<?php /* Smarty version 2.6.25, created on 2012-06-09 23:08:52
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/b8787dfcf8821f8df4e6bc97b7da259c^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '5b38ef9b10527d8bbd24326efd2ee86a';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_5b38ef9b10527d8bbd24326efd2ee86a_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5b38ef9b10527d8bbd24326efd2ee86a','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_5b38ef9b10527d8bbd24326efd2ee86a_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5b38ef9b10527d8bbd24326efd2ee86a','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_5b38ef9b10527d8bbd24326efd2ee86a_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('5b38ef9b10527d8bbd24326efd2ee86a','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
