<?php /* Smarty version 2.6.25, created on 2013-03-18 18:08:41
         compiled from module_file_tpl:FileManager%3Buploadview.tpl */ ?>
<fieldset>
<?php echo $this->_tpl_vars['formstart']; ?>

<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['maxfilesize']; ?>
" />
<?php echo $this->_tpl_vars['path']; ?>

<?php $_from = $this->_tpl_vars['inputs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['input']):
?>
<div class="pageoverflow">

<p class="pagetext">
<strong><?php echo $this->_tpl_vars['input']->label; ?>
</strong>
</p>
<p class="pageinput">
<?php echo $this->_tpl_vars['input']->fileinput; ?>
<?php echo $this->_tpl_vars['input']->unpackinput; ?>
<?php echo $this->_tpl_vars['unpacktext']; ?>

</p>
</div>
<?php endforeach; endif; unset($_from); ?>
<div class="pageoverflow">
<p class="pagetext">
<strong>&nbsp;</strong>
</p>
<p class="pageinput">
<?php echo $this->_tpl_vars['submit']; ?>

</p>
</div>
<?php echo $this->_tpl_vars['formend']; ?>

</fieldset>