<?php /* Smarty version 2.6.25, created on 2014-01-13 16:27:44
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/06e1afb97d41578f760f5e9878dacefa^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'e91c75253bf2491200d87d6f9ce27cb3';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_e91c75253bf2491200d87d6f9ce27cb3_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e91c75253bf2491200d87d6f9ce27cb3','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_e91c75253bf2491200d87d6f9ce27cb3_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e91c75253bf2491200d87d6f9ce27cb3','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_e91c75253bf2491200d87d6f9ce27cb3_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('e91c75253bf2491200d87d6f9ce27cb3','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
