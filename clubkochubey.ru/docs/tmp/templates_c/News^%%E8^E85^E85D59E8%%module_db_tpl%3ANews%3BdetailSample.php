<?php /* Smarty version 2.6.25, created on 2012-06-19 10:44:07
         compiled from module_db_tpl:News%3BdetailSample */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cms_date_format', 'module_db_tpl:News;detailSample', 12, false),array('modifier', 'cms_escape', 'module_db_tpl:News;detailSample', 15, false),array('function', 'eval', 'module_db_tpl:News;detailSample', 24, false),)), $this); ?>
<?php $this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/News^%%E8^E85^E85D59E8%%module_db_tpl%3ANews%3BdetailSample.inc'] = '9c384566255dbf90a6de47530426c544'; ?><?php if (isset ( $this->_tpl_vars['entry']->canonical )): ?>
  <?php $this->assign('canonical', $this->_tpl_vars['entry']->canonical); ?>
<?php endif; ?>

<div id="NewsPostDetailPrintLink">
	<?php echo $this->_tpl_vars['entry']->printlink; ?>

</div>

<?php if ($this->_tpl_vars['entry']->postdate): ?>
	<div id="NewsPostDetailDate">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->postdate)) ? $this->_run_mod_handler('cms_date_format', true, $_tmp) : smarty_cms_modifier_cms_date_format($_tmp)); ?>

	</div>
<?php endif; ?>
<h3 id="NewsPostDetailTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->title)) ? $this->_run_mod_handler('cms_escape', true, $_tmp, 'htmlall') : smarty_cms_modifier_cms_escape($_tmp, 'htmlall')); ?>
</h3>

<?php if (isset ( $this->_tpl_vars['entry']->fields )): ?>
  <?php $_from = $this->_tpl_vars['entry']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
     <div class="NewsDetailField">
        <?php if ($this->_tpl_vars['field']->type == 'file'): ?>
	            <img src="<?php echo $this->_tpl_vars['entry']->file_location; ?>
/<?php echo $this->_tpl_vars['field']->value; ?>
" alt="" />
        <?php else: ?>
          <?php echo $this->_tpl_vars['field']->name; ?>
:&nbsp;<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['field']->value), $this);?>

        <?php endif; ?>
     </div>
  <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


<div id="NewsPostDetailContent">
	<?php if ($this->caching && !$this->_cache_including): echo '{nocache:9c384566255dbf90a6de47530426c544#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('9c384566255dbf90a6de47530426c544','0');echo smarty_function_eval(array('var' => $this->_tpl_vars['entry']->content), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:9c384566255dbf90a6de47530426c544#0}'; endif;?>

</div>

<?php if ($this->_tpl_vars['entry']->extra): ?>
	<div id="NewsPostDetailExtra">
		<?php echo $this->_tpl_vars['extra_label']; ?>
 <?php echo $this->_tpl_vars['entry']->extra; ?>

	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['return_url'] != ""): ?>

<?php endif; ?>
