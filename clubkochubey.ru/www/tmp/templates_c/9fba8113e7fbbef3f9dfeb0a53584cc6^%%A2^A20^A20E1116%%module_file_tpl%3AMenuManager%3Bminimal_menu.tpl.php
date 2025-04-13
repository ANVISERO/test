<?php /* Smarty version 2.6.25, created on 2014-01-14 00:42:47
         compiled from module_file_tpl:MenuManager%3Bminimal_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;minimal_menu.tpl', 9, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/9fba8113e7fbbef3f9dfeb0a53584cc6^%%A2^A20^A20E1116%%module_file_tpl%3AMenuManager%3Bminimal_menu.tpl.inc'] = 'bc21292214401714e58ca13122b53046'; ?> 
<?php if ($this->_tpl_vars['count'] > 0): ?>
<ul class="clearfix">
<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
<?php if ($this->_tpl_vars['node']->depth > $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:bc21292214401714e58ca13122b53046#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $this->_tpl_vars['node']->depth-$this->_tpl_vars['node']->prevdepth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:bc21292214401714e58ca13122b53046#0}'; endif;?>

<?php elseif ($this->_tpl_vars['node']->depth < $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:bc21292214401714e58ca13122b53046#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $this->_tpl_vars['node']->prevdepth-$this->_tpl_vars['node']->depth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:bc21292214401714e58ca13122b53046#1}'; endif;?>

</li>
<?php elseif ($this->_tpl_vars['node']->index > 0): ?></li>
<?php endif; ?>

<?php if ($this->_tpl_vars['node']->current == true): ?>
<li><a href="<?php echo $this->_tpl_vars['node']->url; ?>
" class="currentpage"<?php if ($this->_tpl_vars['node']->target != ""): ?> target="<?php echo $this->_tpl_vars['node']->target; ?>
"<?php endif; ?>> <?php echo $this->_tpl_vars['node']->menutext; ?>
 </a>

<?php elseif ($this->_tpl_vars['node']->parent == true && $this->_tpl_vars['node']->depth == 1 && $this->_tpl_vars['node']->type != 'sectionheader' && $this->_tpl_vars['node']->type != 'separator'): ?>
<li class="activeparent"> <a href="<?php echo $this->_tpl_vars['node']->url; ?>
" class="activeparent"<?php if ($this->_tpl_vars['node']->target != ""): ?> target="<?php echo $this->_tpl_vars['node']->target; ?>
"<?php endif; ?>> <?php echo $this->_tpl_vars['node']->menutext; ?>
 </a>

<?php elseif ($this->_tpl_vars['node']->type == 'sectionheader'): ?>
<li class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>


<?php elseif ($this->_tpl_vars['node']->type == 'separator'): ?>
<li style="list-style-type: none;"> <hr class="separator" />

<?php else: ?>
<li><a href="<?php echo $this->_tpl_vars['node']->url; ?>
"<?php if ($this->_tpl_vars['node']->target != ""): ?> target="<?php echo $this->_tpl_vars['node']->target; ?>
"<?php endif; ?>> <?php echo $this->_tpl_vars['node']->menutext; ?>
 </a>

<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:bc21292214401714e58ca13122b53046#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('bc21292214401714e58ca13122b53046','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $this->_tpl_vars['node']->depth-1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:bc21292214401714e58ca13122b53046#2}'; endif;?>
</li>
</ul>
<?php endif; ?>