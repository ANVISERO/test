<?php /* Smarty version 2.6.25, created on 2012-06-10 21:55:32
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/1e16515790355f405afc3a3896e727ae^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '675f23159c20d5215d238de6c7d6aafb';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_675f23159c20d5215d238de6c7d6aafb_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('675f23159c20d5215d238de6c7d6aafb','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_675f23159c20d5215d238de6c7d6aafb_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('675f23159c20d5215d238de6c7d6aafb','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_675f23159c20d5215d238de6c7d6aafb_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('675f23159c20d5215d238de6c7d6aafb','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
