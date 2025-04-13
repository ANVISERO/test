<?php /* Smarty version 2.6.25, created on 2014-01-13 13:48:19
         compiled from tpl_body:24 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'anchor', 'tpl_body:24', 7, false),array('function', 'cms_selflink', 'tpl_body:24', 18, false),array('function', 'search', 'tpl_body:24', 23, false),array('function', 'menu', 'tpl_body:24', 52, false),array('function', 'NMS', 'tpl_body:24', 57, false),array('function', 'news', 'tpl_body:24', 67, false),array('function', 'global_content', 'tpl_body:24', 86, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%9F^9F5^9F529885%%tpl_body%3A24.inc'] = '1ab754e0d183282aaca30ee6160c7ef6'; ?>
<body id="<?php echo $this->_tpl_vars['page_alias']; ?>
">
    <div id="ncleanblue">
      <div id="pagewrapper" class="core-wrap-960 core-center">
        <ul class="accessibility">
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','0');echo smarty_cms_function_anchor(array('anchor' => 'menu_vert','title' => 'Skip to navigation','accesskey' => 'n','text' => 'Skip to navigation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#0}'; endif;?>
</li>
          <li><?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','1');echo smarty_cms_function_anchor(array('anchor' => 'main','title' => 'Skip to content','accesskey' => 's','text' => 'Skip to content'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#1}'; endif;?>
</li>
        </ul>
        <hr class="accessibility" />

        <div id="header" >
          <div id="logo" class="core-float-left">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','2');echo smarty_cms_function_cms_selflink(array('dir' => 'start','text' => ($this->_tpl_vars['sitename'])), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#2}'; endif;?>

          </div>
          

          <div id="search" class="core-float-right">
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','3');echo smarty_cms_function_search(array('search_method' => 'post','resultpage' => 'search'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#3}'; endif;?>

          </div>


          
        </div>

        <div id="content" class="util-clearfix"> 

          <div id="main"  class="core-float-right">            
            
            <div class="main-main table">
<p class="phone">Наши телефоны</p>

<?php if ($this->_tpl_vars['ccuser']->loggedin()): ?> <?php else: ?> <a class="place" href="index.php?page=poryadok-priema">&nbsp;</a> <?php endif; ?> 
<a class="pres" href="/presentation.pdf">&nbsp;</a>
            </div>
            
          </div>

          <div id="left" class="core-float-left page-menu sbar-main">
          <h2 class="accessibility util-clearb">Navigation</h2>  
          <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','4');echo smarty_cms_function_menu(array('template' => 'verticalmenu'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#4}'; endif;?>

          <br style="clear:both" />
<h2>Подписка на новости</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','5');echo $this->_plugins['function']['NMS'][0][0]->function_plugin(array('mode' => 'subscribe'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#5}'; endif;?>

          </div>



        </div>
              <div id="news">
              <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','6');echo smarty_cms_function_news(array('number' => '6','detailpage' => 'news'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#6}'; endif;?>

              </div>              
 
      </div>
      <span class="util-clearb">&nbsp;</span>
      

        <div id="footer">
          <div class="block">
<h3>Карта сайта</h3>
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#7}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','7');echo smarty_cms_function_menu(array('template' => 'minimal_menu.tpl','start_level' => '1','number_of_levels' => '1'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#7}'; endif;?>

          </div>
          
         
       
            <?php if ($this->caching && !$this->_cache_including): echo '{nocache:1ab754e0d183282aaca30ee6160c7ef6#8}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('1ab754e0d183282aaca30ee6160c7ef6','8');echo smarty_cms_function_global_content(array('name' => 'footer'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:1ab754e0d183282aaca30ee6160c7ef6#8}'; endif;?>


        </div>



    </div>
  </body>
</html>