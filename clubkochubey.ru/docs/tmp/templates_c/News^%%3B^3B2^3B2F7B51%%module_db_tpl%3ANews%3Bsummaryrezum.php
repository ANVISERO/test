<?php /* Smarty version 2.6.25, created on 2012-06-09 17:05:45
         compiled from module_db_tpl:News%3Bsummaryrezum */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'supersizer', 'module_db_tpl:News;summaryrezum', 10, false),array('function', 'eval', 'module_db_tpl:News;summaryrezum', 12, false),array('modifier', 'cat', 'module_db_tpl:News;summaryrezum', 10, false),array('modifier', 'cms_date_format', 'module_db_tpl:News;summaryrezum', 18, false),array('modifier', 'strip_tags', 'module_db_tpl:News;summaryrezum', 22, false),array('modifier', 'truncate', 'module_db_tpl:News;summaryrezum', 22, false),array('modifier', 'escape', 'module_db_tpl:News;summaryrezum', 22, false),)), $this); ?>
<?php $this->_cache_serials['/home/zarplata/clubkochubey.ru/docs/tmp/templates_c/News^%%3B^3B2^3B2F7B51%%module_db_tpl%3ANews%3Bsummaryrezum.inc'] = 'ea956b5e2d9018a84f25de43224fc193'; ?><div class="NewsSummary">
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
<div class="NewsSummaryArticle">
  <?php if (isset ( $this->_tpl_vars['entry']->fields )): ?>
      <?php $_from = $this->_tpl_vars['entry']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
         <div class="NewsSummaryField">
            <?php if ($this->_tpl_vars['field']->type == 'file'): ?>
                <?php $this->assign('loc', $this->_tpl_vars['entry']->file_location); ?>
                <?php $this->assign('theFile', $this->_tpl_vars['field']->value); ?>
                <?php if ($this->caching && !$this->_cache_including): echo '{nocache:ea956b5e2d9018a84f25de43224fc193#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('ea956b5e2d9018a84f25de43224fc193','0');echo smarty_cms_function_supersizer(array('path' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['loc'])) ? $this->_run_mod_handler('cat', true, $_tmp, '/') : smarty_modifier_cat($_tmp, '/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['theFile']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['theFile'])),'width' => '90'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:ea956b5e2d9018a84f25de43224fc193#0}'; endif;?>

            <?php else: ?>
              <?php echo $this->_tpl_vars['field']->name; ?>
:&nbsp;<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['field']->value), $this);?>

            <?php endif; ?>
         </div>
      <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
	<div class="NewsSummaryPostdate">
<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->postdate)) ? $this->_run_mod_handler('cms_date_format', true, $_tmp) : smarty_cms_modifier_cms_date_format($_tmp)); ?>

	</div>
<br style="clear:both" /><a href="<?php echo $this->_tpl_vars['entry']->link; ?>
"><?php echo $this->_tpl_vars['entry']->title; ?>
</a>

<a class="NewsSummarySummary" href="<?php echo $this->_tpl_vars['entry']->link; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['entry']->content)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 170) : smarty_modifier_truncate($_tmp, 170)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall', "UTF-8") : smarty_modifier_escape($_tmp, 'htmlall', "UTF-8")); ?>
</a>




</div>
<?php endforeach; endif; unset($_from); ?>
</div>