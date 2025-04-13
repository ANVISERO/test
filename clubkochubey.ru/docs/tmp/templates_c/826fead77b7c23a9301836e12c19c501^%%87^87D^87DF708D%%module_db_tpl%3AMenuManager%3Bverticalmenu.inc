<?php /* Smarty version 2.6.25, created on 2012-06-12 13:31:34
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/826fead77b7c23a9301836e12c19c501^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'caa1d26a8807b0155a4a694d7cd3c4af';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_caa1d26a8807b0155a4a694d7cd3c4af_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('caa1d26a8807b0155a4a694d7cd3c4af','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_caa1d26a8807b0155a4a694d7cd3c4af_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('caa1d26a8807b0155a4a694d7cd3c4af','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_caa1d26a8807b0155a4a694d7cd3c4af_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('caa1d26a8807b0155a4a694d7cd3c4af','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
