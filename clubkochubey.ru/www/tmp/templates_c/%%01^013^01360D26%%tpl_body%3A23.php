<?php /* Smarty version 2.6.25, created on 2014-02-12 16:22:31
         compiled from tpl_body:23 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'anchor', 'tpl_body:23', 7, false),array('function', 'cms_selflink', 'tpl_body:23', 14, false),array('function', 'search', 'tpl_body:23', 18, false),array('function', 'menu', 'tpl_body:23', 34, false),array('function', 'NMS', 'tpl_body:23', 39, false),array('function', 'cms_module', 'tpl_body:23', 42, false),array('function', 'breadcrumbs', 'tpl_body:23', 51, false),array('function', 'oldprint', 'tpl_body:23', 52, false),array('function', 'title', 'tpl_body:23', 56, false),array('function', 'content', 'tpl_body:23', 58, false),array('function', 'global_content', 'tpl_body:23', 80, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%01^013^01360D26%%tpl_body%3A23.inc'] = '3e1dda8dce66b62a377a815daff5e7d8'; ?>
<body id="<?php echo $this->_tpl_vars['page_alias']; ?>
">
    <div id="ncleanblue">
      <div id="pagewrapper" class=" core-center">
        <ul class="accessibility">
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','0');echo smarty_cms_function_anchor(array('anchor' => 'menu_vert','title' => 'Skip to navigation','accesskey' => 'n','text' => 'Skip to navigation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#0}'; endif;?>
</li>
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','1');echo smarty_cms_function_anchor(array('anchor' => 'main','title' => 'Skip to content','accesskey' => 's','text' => 'Skip to content'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#1}'; endif;?>
</li>
        </ul>
        <hr class="accessibility" />
        <div id="header" class="util-clearfix">

          <div id="logo" class="core-float-left">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','2');echo smarty_cms_function_cms_selflink(array('dir' => 'start','text' => ($this->_tpl_vars['sitename'])), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#2}'; endif;?>

          </div>
          
          <div id="search" class="core-float-right">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','3');echo smarty_cms_function_search(array('search_method' => 'post','resultpage' => 'search'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#3}'; endif;?>

          </div>
        </div>

        <div id="content" class="util-clearfix"> 
<div id="folder">

          <div id="left" class="core-float-left page-menu sbar-main">

          <h2 class="accessibility util-clearb">Navigation</h2>
                    <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','4');echo smarty_cms_function_menu(array('template' => 'verticalmenu'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#4}'; endif;?>

    <br style="clear:both" />
<div id="phorm">
<h2>Подписка на новости</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','5');echo $this->_plugins['function']['NMS'][0][0]->function_plugin(array('mode' => 'subscribe'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#5}'; endif;?>

<br style="clear:both" />
<h2>Опрос</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','6');echo smarty_cms_function_cms_module(array('module' => 'polls'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#6}'; endif;?>
       
          </div>
          </div>



          <div id="main">
<div class="breadcrumbs"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#7}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','7');echo smarty_cms_function_breadcrumbs(array('starttext' => '','root' => 'Home','delimiter' => '&gt;'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#7}'; endif;?>
</div>
                <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#8}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','8');echo smarty_cms_function_oldprint(array('showbutton' => true), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#8}'; endif;?>

            
          
              <h1 class="title"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#9}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','9');echo smarty_cms_function_title(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#9}'; endif;?>
</h1>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#10}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','10');echo smarty_cms_function_content(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#10}'; endif;?>
           

          </div>

        </div></div>

      </div>
     
      

        <div id="footer">
          <div class="block">
<h3>Карта сайта</h3>
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#11}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','11');echo smarty_cms_function_menu(array('template' => 'minimal_menu.tpl','start_level' => '1','number_of_levels' => '1'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#11}'; endif;?>

          </div>
                

            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:3e1dda8dce66b62a377a815daff5e7d8#12}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('3e1dda8dce66b62a377a815daff5e7d8','12');echo smarty_cms_function_global_content(array('name' => 'footer'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:3e1dda8dce66b62a377a815daff5e7d8#12}'; endif;?>

  
 
        </div>



    </div>
  </body>
</html>