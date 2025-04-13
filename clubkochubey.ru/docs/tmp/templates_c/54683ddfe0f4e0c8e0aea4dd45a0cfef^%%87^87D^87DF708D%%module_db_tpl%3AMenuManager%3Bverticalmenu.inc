<?php /* Smarty version 2.6.25, created on 2012-06-10 12:30:28
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/54683ddfe0f4e0c8e0aea4dd45a0cfef^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '911f2b2dad0889061b30ee758314e369';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_911f2b2dad0889061b30ee758314e369_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('911f2b2dad0889061b30ee758314e369','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_911f2b2dad0889061b30ee758314e369_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('911f2b2dad0889061b30ee758314e369','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_911f2b2dad0889061b30ee758314e369_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('911f2b2dad0889061b30ee758314e369','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
