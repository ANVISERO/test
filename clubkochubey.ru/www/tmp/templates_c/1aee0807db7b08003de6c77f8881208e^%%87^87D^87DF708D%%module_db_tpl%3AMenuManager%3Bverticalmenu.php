<?php /* Smarty version 2.6.25, created on 2014-01-14 01:25:02
         compiled from module_db_tpl:MenuManager%3Bverticalmenu */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'repeat', 'module_db_tpl:MenuManager;verticalmenu', 25, false),array('modifier', 'cat', 'module_db_tpl:MenuManager;verticalmenu', 45, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/1aee0807db7b08003de6c77f8881208e^%%87^87D^87DF708D%%module_db_tpl%3AMenuManager%3Bverticalmenu.inc'] = '8d98ee8045e9924d5ad687eacc4ef176'; ?><?php echo '
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery(\'ul.sf-menu\').superfish();
		});
</script>
'; ?>



<?php $this->assign('number_of_levels', 10000); ?>
<?php if (isset ( $this->_tpl_vars['menuparams']['number_of_levels'] )): ?>
  <?php $this->assign('number_of_levels', $this->_tpl_vars['menuparams']['number_of_levels']); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['count'] > 0): ?>
<ul class="sf-menu">

<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>

<?php if ($this->_tpl_vars['node']->depth > $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8d98ee8045e9924d5ad687eacc4ef176#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','0');echo smarty_cms_function_repeat(array('string' => '<ul class="unli">','times' => $this->_tpl_vars['node']->depth-$this->_tpl_vars['node']->prevdepth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8d98ee8045e9924d5ad687eacc4ef176#0}'; endif;?>

<?php elseif ($this->_tpl_vars['node']->depth < $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8d98ee8045e9924d5ad687eacc4ef176#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','1');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $this->_tpl_vars['node']->prevdepth-$this->_tpl_vars['node']->depth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8d98ee8045e9924d5ad687eacc4ef176#1}'; endif;?>

</li>
<?php elseif ($this->_tpl_vars['node']->index > 0): ?>
</li>
<?php endif; ?>



<?php if ($this->_tpl_vars['node']->parent == true || $this->_tpl_vars['node']->current == true): ?>
<?php $this->assign('classes', 'menuactive'); ?>

<?php if ($this->_tpl_vars['node']->parent == true): ?>
<?php $this->assign('classes', 'menuactive menuparent'); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['node']->children_exist == true && $this->_tpl_vars['node']->depth < $this->_tpl_vars['number_of_levels']): ?>
<?php $this->assign('classes', ((is_array($_tmp=$this->_tpl_vars['classes'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' parent') : smarty_modifier_cat($_tmp, ' parent'))); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['node']->type == 'sectionheader'): ?>
<li class="<?php echo $this->_tpl_vars['classes']; ?>
"><a class="<?php echo $this->_tpl_vars['classes']; ?>
"><span class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>
<?php else: ?>
<li class="<?php echo $this->_tpl_vars['classes']; ?>
"><a class="<?php echo $this->_tpl_vars['classes']; ?>
"
<?php endif; ?>


<?php elseif ($this->_tpl_vars['node']->type == 'sectionheader' && $this->_tpl_vars['node']->haschildren == true): ?>
<li><a ><span class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>

<?php elseif ($this->_tpl_vars['node']->type == 'sectionheader'): ?>
 <li><a ><span class="sectionheader"><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>

<?php elseif ($this->_tpl_vars['node']->type == 'separator'): ?>
 <li style="list-style-type: none;"> <hr class="menu_separator" />

<?php elseif ($this->_tpl_vars['node']->children_exist == true && $this->_tpl_vars['node']->depth < $this->_tpl_vars['number_of_levels'] && $this->_tpl_vars['node']->type != 'sectionheader' && $this->_tpl_vars['node']->type != 'separator'): ?>
<li class="menuparent"><a class="menuparent" 

<?php else: ?>
<?php $this->assign('classes', ''); ?>
<?php if ($this->_tpl_vars['node']->alias == 'registratsiya-2'): ?>
<?php $this->assign('classes', 'red'); ?>
<?php endif; ?>
<li class="<?php echo $this->_tpl_vars['classes']; ?>
">
<a 
<?php endif; ?>

<?php if ($this->_tpl_vars['node']->type != 'sectionheader' && $this->_tpl_vars['node']->type != 'separator'): ?>
<?php if ($this->_tpl_vars['node']->target): ?>
            target="<?php echo $this->_tpl_vars['node']->target; ?>
" 
<?php endif; ?>
href="<?php echo $this->_tpl_vars['node']->url; ?>
"><span><?php echo $this->_tpl_vars['node']->menutext; ?>
</span></a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8d98ee8045e9924d5ad687eacc4ef176#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8d98ee8045e9924d5ad687eacc4ef176','2');echo smarty_cms_function_repeat(array('string' => '</li></ul>','times' => $this->_tpl_vars['node']->depth-1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8d98ee8045e9924d5ad687eacc4ef176#2}'; endif;?>

</li>
</ul>
<?php endif; ?>