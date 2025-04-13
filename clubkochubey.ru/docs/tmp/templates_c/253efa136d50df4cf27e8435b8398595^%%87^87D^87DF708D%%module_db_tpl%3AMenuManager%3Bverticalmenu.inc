<?php /* Smarty version 2.6.25, created on 2012-06-10 17:49:33
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/253efa136d50df4cf27e8435b8398595^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '8d15c33a8947dab15155becbc2494dbd';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_8d15c33a8947dab15155becbc2494dbd_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d15c33a8947dab15155becbc2494dbd','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_8d15c33a8947dab15155becbc2494dbd_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d15c33a8947dab15155becbc2494dbd','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_8d15c33a8947dab15155becbc2494dbd_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8d15c33a8947dab15155becbc2494dbd','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
