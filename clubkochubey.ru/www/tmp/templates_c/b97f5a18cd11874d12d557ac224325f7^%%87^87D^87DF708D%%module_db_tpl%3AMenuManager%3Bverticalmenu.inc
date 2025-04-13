<?php /* Smarty version 2.6.25, created on 2014-01-13 16:28:43
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/b97f5a18cd11874d12d557ac224325f7^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '9835816117059495111c30215624b096';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_9835816117059495111c30215624b096_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9835816117059495111c30215624b096','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_9835816117059495111c30215624b096_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9835816117059495111c30215624b096','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_9835816117059495111c30215624b096_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('9835816117059495111c30215624b096','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
