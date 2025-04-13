<?php /* Smarty version 2.6.25, created on 2013-03-07 16:00:40
         compiled from module_db_tpl:FrontEndUsers%3Bfeusers_forgotpasswordform */ ?>
<!-- forgot password template -->
<?php echo $this->_tpl_vars['startform']; ?>

<?php echo $this->_tpl_vars['title']; ?>

<?php if (! empty ( $this->_tpl_vars['message'] )): ?>
  <?php if (! empty ( $this->_tpl_vars['error'] )): ?>
    <p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>
  <?php else: ?>
    <p><?php echo $this->_tpl_vars['message']; ?>
</p>
  <?php endif; ?>
<?php endif; ?>
<p><?php echo $this->_tpl_vars['lostpw_message']; ?>
</p>
<p><?php echo $this->_tpl_vars['prompt_username']; ?>
&nbsp;<?php echo $this->_tpl_vars['input_username']; ?>
</p>
<p><?php echo $this->_tpl_vars['hidden']; ?>
<?php echo $this->_tpl_vars['submit']; ?>
&nbsp<?php echo $this->_tpl_vars['cancel']; ?>
</p>
<?php echo $this->_tpl_vars['endform']; ?>

<!-- forgot password template --> 