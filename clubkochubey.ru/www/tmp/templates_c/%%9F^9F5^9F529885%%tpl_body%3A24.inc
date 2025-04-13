<?php /* Smarty version 2.6.25, created on 2014-01-13 13:48:19
         compiled from tpl_body:24 */

$this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%9F^9F5^9F529885%%tpl_body%3A24.inc'] = '1ab754e0d183282aaca30ee6160c7ef6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'anchor', 'tpl_body:24', 7, false),array('function', 'cms_selflink', 'tpl_body:24', 18, false),array('function', 'search', 'tpl_body:24', 23, false),array('function', 'menu', 'tpl_body:24', 52, false),array('function', 'NMS', 'tpl_body:24', 57, false),array('function', 'news', 'tpl_body:24', 67, false),array('function', 'global_content', 'tpl_body:24', 86, false),)), $this); ?>
<?php
function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','0');echo smarty_cms_function_anchor(array('anchor' => 'menu_vert','title' => 'Skip to navigation','accesskey' => 'n','text' => 'Skip to navigation'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','1');echo smarty_cms_function_anchor(array('anchor' => 'main','title' => 'Skip to content','accesskey' => 's','text' => 'Skip to content'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','2');echo smarty_cms_function_cms_selflink(array('dir' => 'start','text' => ($_smarty->_tpl_vars['sitename'])), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_3(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','3');echo smarty_cms_function_search(array('search_method' => 'post','resultpage' => 'search'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_4(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','4');echo smarty_cms_function_menu(array('template' => 'verticalmenu'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_5(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','5');echo $_smarty->_plugins['function']['NMS'][0][0]->function_plugin(array('mode' => 'subscribe'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_6(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','6');echo smarty_cms_function_news(array('number' => '6','detailpage' => 'news'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_7(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','7');echo smarty_cms_function_menu(array('template' => 'minimal_menu.tpl','start_level' => '1','number_of_levels' => '1'), $_smarty);
}


function _smarty_tplfunc_1ab754e0d183282aaca30ee6160c7ef6_8(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','8');echo smarty_cms_function_global_content(array('name' => 'footer'), $_smarty);
}



?>
