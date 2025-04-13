<?php /* Smarty version 2.6.25, created on 2013-03-12 14:54:59
         compiled from module_file_tpl:News%3Beditarticle.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'module_file_tpl:News;editarticle.tpl', 33, false),array('function', 'html_select_time', 'module_file_tpl:News;editarticle.tpl', 33, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/News^%%AC^ACB^ACB8292B%%module_file_tpl%3ANews%3Beditarticle.tpl.inc'] = 'e55a8755c0e91196c4fbf229e30fc4f6'; ?><?php echo $this->_tpl_vars['startform']; ?>

<?php if ($this->_tpl_vars['inputauthor']): ?>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $this->_tpl_vars['authortext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputauthor']; ?>
</p>
	</div>
<?php endif; ?>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $this->_tpl_vars['titletext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputtitle']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $this->_tpl_vars['categorytext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputcategory']; ?>
</p>
	</div>
<?php if (! isset ( $this->_tpl_vars['hide_summary_field'] ) || $this->_tpl_vars['hide_summary_field'] == '0'): ?>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['summarytext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputsummary']; ?>
</p>
	</div>
<?php endif; ?>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $this->_tpl_vars['contenttext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputcontent']; ?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['extratext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['inputextra']; ?>
</p>
		
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['postdatetext']; ?>
:</p>
		<p class="pageinput"><?php echo smarty_function_html_select_date(array('prefix' => $this->_tpl_vars['postdateprefix'],'time' => $this->_tpl_vars['postdate'],'start_year' => "-10",'end_year' => "+15"), $this);?>
 <?php echo smarty_function_html_select_time(array('prefix' => $this->_tpl_vars['postdateprefix'],'time' => $this->_tpl_vars['postdate']), $this);?>
</p>
	</div>
<?php if (isset ( $this->_tpl_vars['statustext'] )): ?>
	<div class="pageoverflow">
		<p class="pagetext">*<?php echo $this->_tpl_vars['statustext']; ?>
:</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['status']; ?>
</p>
	</div>
<?php else: ?>
	<?php echo $this->_tpl_vars['status']; ?>

<?php endif; ?>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['useexpirationtext']; ?>
:</p>
		<p class="pageinput"><input type="checkbox" name="<?php echo $this->_tpl_vars['actionid']; ?>
useexp" <?php if ($this->_tpl_vars['useexp'] == 1): ?>checked="checked"<?php endif; ?> onclick="togglecollapse('expiryinfo');" class="pagecheckbox"/></p>
	</div>
	<div id="expiryinfo" <?php if ($this->_tpl_vars['useexp'] != 1): ?>style="display: none;"<?php endif; ?>>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['startdatetext']; ?>
:</p>
		<p class="pageinput"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:e55a8755c0e91196c4fbf229e30fc4f6#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e55a8755c0e91196c4fbf229e30fc4f6','0');echo smarty_function_html_select_date(array('prefix' => $this->_tpl_vars['startdateprefix'],'time' => $this->_tpl_vars['startdate'],'start_year' => "-10",'end_year' => "+15"), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e55a8755c0e91196c4fbf229e30fc4f6#0}'; endif;?>
 <?php if ($this->caching && !$this->_cache_including): echo '{nocache:e55a8755c0e91196c4fbf229e30fc4f6#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e55a8755c0e91196c4fbf229e30fc4f6','1');echo smarty_function_html_select_time(array('prefix' => $this->_tpl_vars['startdateprefix'],'time' => $this->_tpl_vars['startdate']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e55a8755c0e91196c4fbf229e30fc4f6#1}'; endif;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['enddatetext']; ?>
:</p>
		<p class="pageinput"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:e55a8755c0e91196c4fbf229e30fc4f6#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e55a8755c0e91196c4fbf229e30fc4f6','2');echo smarty_function_html_select_date(array('prefix' => $this->_tpl_vars['enddateprefix'],'time' => $this->_tpl_vars['enddate'],'start_year' => "-10",'end_year' => "+15"), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e55a8755c0e91196c4fbf229e30fc4f6#2}'; endif;?>
 <?php if ($this->caching && !$this->_cache_including): echo '{nocache:e55a8755c0e91196c4fbf229e30fc4f6#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('e55a8755c0e91196c4fbf229e30fc4f6','3');echo smarty_function_html_select_time(array('prefix' => $this->_tpl_vars['enddateprefix'],'time' => $this->_tpl_vars['enddate']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:e55a8755c0e91196c4fbf229e30fc4f6#3}'; endif;?>
</p>
	</div>
	</div>
<?php if (isset ( $this->_tpl_vars['custom_fields'] )): ?>
<?php $_from = $this->_tpl_vars['custom_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
        <div class="pageoverflow">
           <p class="pagetext"><?php echo $this->_tpl_vars['field']->prompt; ?>
</p>
           <p class="pageinput"><?php echo $this->_tpl_vars['field']->field; ?>
</p>
        </div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo $this->_tpl_vars['hidden']; ?>
<?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['cancel']; ?>
<?php if (isset ( $this->_tpl_vars['apply'] )): ?><?php echo $this->_tpl_vars['apply']; ?>
<?php endif; ?></p>
	</div>
<?php echo $this->_tpl_vars['endform']; ?>
