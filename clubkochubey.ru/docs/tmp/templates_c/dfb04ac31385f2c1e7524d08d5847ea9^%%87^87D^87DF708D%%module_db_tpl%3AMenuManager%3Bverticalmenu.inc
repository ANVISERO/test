<?php /* Smarty version 2.6.25, created on 2012-06-16 11:15:24
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/dfb04ac31385f2c1e7524d08d5847ea9^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'a7a93e3e32a32cddbb48738d1a01cc3d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_a7a93e3e32a32cddbb48738d1a01cc3d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a7a93e3e32a32cddbb48738d1a01cc3d','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_a7a93e3e32a32cddbb48738d1a01cc3d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a7a93e3e32a32cddbb48738d1a01cc3d','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_a7a93e3e32a32cddbb48738d1a01cc3d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('a7a93e3e32a32cddbb48738d1a01cc3d','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
