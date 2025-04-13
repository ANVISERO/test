<?php /* Smarty version 2.6.25, created on 2013-03-25 03:57:46
         compiled from tpl_body:23 */

$this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/%%01^013^01360D26%%tpl_body%3A23.inc'] = 'c768240a8f45d8b097067e95fce350b4';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'anchor', 'tpl_body:23', 7, false),array('function', 'cms_selflink', 'tpl_body:23', 14, false),array('function', 'search', 'tpl_body:23', 18, false),array('function', 'menu', 'tpl_body:23', 34, false),array('function', 'NMS', 'tpl_body:23', 39, false),array('function', 'cms_module', 'tpl_body:23', 42, false),array('function', 'breadcrumbs', 'tpl_body:23', 51, false),array('function', 'oldprint', 'tpl_body:23', 52, false),array('function', 'title', 'tpl_body:23', 56, false),array('function', 'content', 'tpl_body:23', 58, false),array('function', 'global_content', 'tpl_body:23', 80, false),)), $this); ?>
<?php
function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','0');echo smarty_cms_function_anchor(array('anchor' => 'menu_vert','title' => 'Skip to navigation','accesskey' => 'n','text' => 'Skip to navigation'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','1');echo smarty_cms_function_anchor(array('anchor' => 'main','title' => 'Skip to content','accesskey' => 's','text' => 'Skip to content'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','2');echo smarty_cms_function_cms_selflink(array('dir' => 'start','text' => ($_smarty->_tpl_vars['sitename'])), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_3(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','3');echo smarty_cms_function_search(array('search_method' => 'post','resultpage' => 'search'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_4(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','4');echo smarty_cms_function_menu(array('template' => 'verticalmenu'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_5(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','5');echo $_smarty->_plugins['function']['NMS'][0][0]->function_plugin(array('mode' => 'subscribe'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_6(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','6');echo smarty_cms_function_cms_module(array('module' => 'polls'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_7(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','7');echo smarty_cms_function_breadcrumbs(array('starttext' => '','root' => 'Home','delimiter' => '&gt;'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_8(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','8');echo smarty_cms_function_oldprint(array('showbutton' => true), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_9(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','9');echo smarty_cms_function_title(array(), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_10(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','10');echo smarty_cms_function_content(array(), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_11(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','11');echo smarty_cms_function_menu(array('template' => 'minimal_menu.tpl','start_level' => '1','number_of_levels' => '1'), $_smarty);
}


function _smarty_tplfunc_c768240a8f45d8b097067e95fce350b4_12(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('c768240a8f45d8b097067e95fce350b4','12');echo smarty_cms_function_global_content(array('name' => 'footer'), $_smarty);
}



?>
