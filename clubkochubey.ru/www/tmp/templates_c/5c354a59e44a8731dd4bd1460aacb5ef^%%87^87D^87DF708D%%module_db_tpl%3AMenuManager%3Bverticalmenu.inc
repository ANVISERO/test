<?php /* Smarty version 2.6.25, created on 2014-01-13 16:25:26
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/5c354a59e44a8731dd4bd1460aacb5ef^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'ede85a01fd08191d0f598edf8c1788d6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_ede85a01fd08191d0f598edf8c1788d6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ede85a01fd08191d0f598edf8c1788d6','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ede85a01fd08191d0f598edf8c1788d6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ede85a01fd08191d0f598edf8c1788d6','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ede85a01fd08191d0f598edf8c1788d6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ede85a01fd08191d0f598edf8c1788d6','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
