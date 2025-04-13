<?php /* Smarty version 2.6.25, created on 2012-06-10 21:27:49
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/6837e4acdbafed9794715404686e7ab4^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '7c1365b2e273295f1135ffddd53e4022';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_7c1365b2e273295f1135ffddd53e4022_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7c1365b2e273295f1135ffddd53e4022','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_7c1365b2e273295f1135ffddd53e4022_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7c1365b2e273295f1135ffddd53e4022','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_7c1365b2e273295f1135ffddd53e4022_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('7c1365b2e273295f1135ffddd53e4022','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
