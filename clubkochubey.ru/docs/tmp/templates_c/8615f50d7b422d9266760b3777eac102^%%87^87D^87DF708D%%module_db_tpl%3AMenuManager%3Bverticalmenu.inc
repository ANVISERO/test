<?php /* Smarty version 2.6.25, created on 2012-06-11 15:21:03
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */

$this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/8615f50d7b422d9266760b3777eac102^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = 'd447bc5dbad9ec2296bdf50e2e8ce83d';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php
function _smarty_tplfunc_d447bc5dbad9ec2296bdf50e2e8ce83d_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d447bc5dbad9ec2296bdf50e2e8ce83d','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_d447bc5dbad9ec2296bdf50e2e8ce83d_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d447bc5dbad9ec2296bdf50e2e8ce83d','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_d447bc5dbad9ec2296bdf50e2e8ce83d_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('d447bc5dbad9ec2296bdf50e2e8ce83d','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
