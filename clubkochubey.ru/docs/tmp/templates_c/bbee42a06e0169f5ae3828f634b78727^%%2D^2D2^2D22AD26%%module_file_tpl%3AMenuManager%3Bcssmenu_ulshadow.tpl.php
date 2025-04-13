<?php /* Smarty version 2.6.25, created on 2013-03-08 07:47:21
         compiled from module_file_tpl:MenuManager%3Bcssmenu_ulshadow.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_file_tpl:MenuManager;cssmenu_ulshadow.tpl', 11, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/bbee42a06e0169f5ae3828f634b78727^%%2D^2D2^2D22AD26%%module_file_tpl%3AMenuManager%3Bcssmenu_ulshadow.tpl.inc'] = '325ed14f17efc64a07fd649be27e4f47'; ?><?php if ($this->_tpl_vars['count'] > 0): ?>

<ul id="primary-nav">
<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
<?php if ($this->_tpl_vars['node']->depth > $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:325ed14f17efc64a07fd649be27e4f47#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $this->_tpl_vars['node']->depth-$this->_tpl_vars['node']->prevdepth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:325ed14f17efc64a07fd649be27e4f47#0}'; endif;?>

<?php elseif ($this->_tpl_vars['node']->depth < $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:325ed14f17efc64a07fd649be27e4f47#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','1');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $this->_tpl_vars['node']->prevdepth-$this->_tpl_vars['node']->depth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:325ed14f17efc64a07fd649be27e4f47#1}'; endif;?>

</li>
<?php elseif ($this->_tpl_vars['node']->index > 0): ?></li>
<?php endif; ?>
<?php if ($this->_tpl_vars['node']->parent == true || ( $this->_tpl_vars['node']->current == true && $this->_tpl_vars['node']->haschildren == true )): ?>
<li class="menuactive menuparent">
<a class="menuactive menuparent" <?php elseif ($this->_tpl_vars['node']->current == true): ?>
<li class="menuactive">
<a class="menuactive" <?php elseif ($this->_tpl_vars['node']->haschildren == true): ?>
<li class="menuparent">
<a class="menuparent" <?php elseif ($this->_tpl_vars['node']->type == 'sectionheader' && $this->_tpl_vars['node']->haschildren == true): ?>
<li class="sectionheader"><span class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>
</span> <?php elseif ($this->_tpl_vars['node']->type == 'separator'): ?>
<li style="list-style-type: none;"> <hr class="menu_separator" /><?php else: ?>
<li>
<a <?php endif; ?>

<?php if (( $this->_tpl_vars['node']->extra1 == 'restricted' && $this->_tpl_vars['ccuser']->loggedin() )): ?>
style="display:none" <?php endif; ?>
<?php if ($this->_tpl_vars['node']->type != 'sectionheader' && $this->_tpl_vars['node']->type != 'separator'): ?>
<?php if ($this->_tpl_vars['node']->target): ?>target="<?php echo $this->_tpl_vars['node']->target; ?>
" <?php endif; ?>
href="<?php echo $this->_tpl_vars['node']->url; ?>
"><span><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>
<?php elseif ($this->_tpl_vars['node']->type == 'sectionheader'): ?>
><span class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:325ed14f17efc64a07fd649be27e4f47#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('325ed14f17efc64a07fd649be27e4f47','2');echo smarty_cms_function_repeat(array('string' => '</li><li class="separator once" style="list-style-type: none;">&nbsp;</li></ul>','times' => $this->_tpl_vars['node']->depth-1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:325ed14f17efc64a07fd649be27e4f47#2}'; endif;?>

</li>
</ul>

<?php endif; ?>