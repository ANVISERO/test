<?php /* Smarty version 2.6.25, created on 2014-01-31 22:04:24
         compiled from tpl_body:22 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'anchor', 'tpl_body:22', 7, false),array('function', 'cms_selflink', 'tpl_body:22', 18, false),array('function', 'search', 'tpl_body:22', 22, false),array('function', 'menu', 'tpl_body:22', 37, false),array('function', 'NMS', 'tpl_body:22', 41, false),array('function', 'cms_module', 'tpl_body:22', 44, false),array('function', 'breadcrumbs', 'tpl_body:22', 53, false),array('function', 'oldprint', 'tpl_body:22', 54, false),array('function', 'title', 'tpl_body:22', 58, false),array('function', 'content', 'tpl_body:22', 61, false),array('function', 'global_content', 'tpl_body:22', 82, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%76^763^76313DB0%%tpl_body%3A22.inc'] = '5e848bd6a9913cedf391c562a655bffb'; ?>
<body id="<?php echo $this->_tpl_vars['page_alias']; ?>
">
    <div id="ncleanblue">
      <div id="pagewrapper" class=" core-center">
        <ul class="accessibility">
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','0');echo smarty_cms_function_anchor(array('anchor' => 'menu_vert','title' => 'Skip to navigation','accesskey' => 'n','text' => 'Skip to navigation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#0}'; endif;?>
</li>
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','1');echo smarty_cms_function_anchor(array('anchor' => 'main','title' => 'Skip to content','accesskey' => 's','text' => 'Skip to content'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#1}'; endif;?>
</li>
        </ul>
        <hr class="accessibility" />

        <div id="header" class="util-clearfix">
          <div id="logo" class="core-float-left">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','2');echo smarty_cms_function_cms_selflink(array('dir' => 'start','text' => ($this->_tpl_vars['sitename'])), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#2}'; endif;?>

          </div>
          
          <div id="search" class="core-float-right">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','3');echo smarty_cms_function_search(array('search_method' => 'post','resultpage' => 'search'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#3}'; endif;?>

          </div>
        </div>

        <div id="content" class="util-clearfix"> 
<div id="folder">

          <div id="left" class="core-float-left page-menu sbar-main">

          <h2 class="accessibility util-clearb">Navigation</h2>
          <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','4');echo smarty_cms_function_menu(array('template' => 'cssmenu_ulshadow.tpl'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#4}'; endif;?>

    <br style="clear:both" />
<h2>Подписка на новости</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','5');echo $this->_plugins['function']['NMS'][0][0]->function_plugin(array('mode' => 'subscribe'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#5}'; endif;?>

<br style="clear:both" />
<h2>Опрос</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','6');echo smarty_cms_function_cms_module(array('module' => 'polls'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#6}'; endif;?>
       

          </div>



          <div id="main">
<div class="breadcrumbs"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#7}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','7');echo smarty_cms_function_breadcrumbs(array('starttext' => '','root' => 'Home','delimiter' => '&gt;'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#7}'; endif;?>
</div>
                <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#8}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','8');echo smarty_cms_function_oldprint(array('showbutton' => true), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#8}'; endif;?>

            
          
              <h1 class="title"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#9}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','9');echo smarty_cms_function_title(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#9}'; endif;?>
</h1>


<?php if ($this->_tpl_vars['ccuser']->loggedin() && $this->_tpl_vars['ccuser']->memberof('Authorised')): ?> <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#10}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','10');echo smarty_cms_function_content(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#10}'; endif;?>
 <?php elseif ($this->_tpl_vars['ccuser']->loggedin()): ?> <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#11}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','11');echo smarty_cms_function_content(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#11}'; endif;?>
 <?php else: ?> <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#12}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','12');echo smarty_cms_function_cms_module(array('module' => 'FrontEndUsers','form' => 'login'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#12}'; endif;?>
 <?php endif; ?>           

          </div>

        </div></div>

      </div>
     
      

        <div id="footer">
          <div class="block">
<h3>Карта сайта</h3>
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#13}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','13');echo smarty_cms_function_menu(array('template' => 'minimal_menu.tpl','start_level' => '1','number_of_levels' => '1'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#13}'; endif;?>

          </div>

            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:5e848bd6a9913cedf391c562a655bffb#14}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('5e848bd6a9913cedf391c562a655bffb','14');echo smarty_cms_function_global_content(array('name' => 'footer'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:5e848bd6a9913cedf391c562a655bffb#14}'; endif;?>


        </div>



    </div>
  </body>
</html>