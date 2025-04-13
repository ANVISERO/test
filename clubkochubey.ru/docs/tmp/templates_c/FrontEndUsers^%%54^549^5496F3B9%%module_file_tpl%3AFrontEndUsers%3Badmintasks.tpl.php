<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Badmintasks.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['message'] )): ?><p><?php echo $this->_tpl_vars['message']; ?>
</p><?php endif; ?>

<?php echo $this->_tpl_vars['startform']; ?>
<?php echo $this->_tpl_vars['input_hidden']; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['legend_importusers']; ?>
</legend>
<?php echo $this->_tpl_vars['info_importusersfileformat']; ?>
<hr/>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_importuserstogroup']; ?>
:</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_importuserstogroup']; ?>
</p>
</div>
<div class="pageoverflow">
   <p class="pagetext"><?php echo $this->_tpl_vars['prompt_importusersfile']; ?>
:</p>
   <p class="pageinput"><?php echo $this->_tpl_vars['input_importusersfile']; ?>
</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_importusersbtn']; ?>
</p>
</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['legend_exportusers']; ?>
</legend>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_exportusers']; ?>
:</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_exportusers']; ?>
</p>
</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['legend_userhistorymaintenance']; ?>
</legend>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_exportuserhistory']; ?>
:</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_exportuserhistory']; ?>
&nbsp;<?php echo $this->_tpl_vars['button_exportuserhistory']; ?>
</p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_clearuserhistory']; ?>
:</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_clearuserhistory']; ?>
&nbsp;<?php echo $this->_tpl_vars['button_clearuserhistory']; ?>
</p>
</div>
</fieldset>
<?php echo $this->_tpl_vars['endform']; ?>
