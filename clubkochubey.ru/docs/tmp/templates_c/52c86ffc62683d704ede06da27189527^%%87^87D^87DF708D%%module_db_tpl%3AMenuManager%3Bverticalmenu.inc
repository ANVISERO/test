<?php /* Smarty version 2.6.25, created on 2013-03-06 20:16:46
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/52c86ffc62683d704ede06da27189527^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'ad1b823cb63be75b4a878ed8f3159147';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_ad1b823cb63be75b4a878ed8f3159147_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad1b823cb63be75b4a878ed8f3159147','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_ad1b823cb63be75b4a878ed8f3159147_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad1b823cb63be75b4a878ed8f3159147','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_ad1b823cb63be75b4a878ed8f3159147_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('ad1b823cb63be75b4a878ed8f3159147','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
