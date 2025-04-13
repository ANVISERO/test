<?php /* Smarty version 2.6.25, created on 2014-01-14 02:24:46
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/4c662f01cd463c43dda21311014121d0^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '813f189c978b250b8b212807d615cd9e';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_813f189c978b250b8b212807d615cd9e_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('813f189c978b250b8b212807d615cd9e','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_813f189c978b250b8b212807d615cd9e_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('813f189c978b250b8b212807d615cd9e','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_813f189c978b250b8b212807d615cd9e_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('813f189c978b250b8b212807d615cd9e','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
