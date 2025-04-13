<?php /* Smarty version 2.6.25, created on 2013-03-07 16:42:44
         compiled from module_db_tpl:SelfRegistration%3Bselfreg_sendanotheremail_template */ ?>

<!-- SendAnotherEmail Template -->
<?php echo $this->_tpl_vars['title']; ?>

<?php if (isset ( $this->_tpl_vars['message'] ) && $this->_tpl_vars['message'] != ''): ?>
  <?php if (isset ( $this->_tpl_vars['message'] ) && $this->_tpl_vars['error'] != ''): ?>
    <p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>
  <?php else: ?>
    <p><?php echo $this->_tpl_vars['message']; ?>
</p>
  <?php endif; ?>
<?php endif; ?>
<p>I didn't receive my confirmation email, please send another one.</p>
<p>My Username is: <?php echo $this->_tpl_vars['startform']; ?>
<?php echo $this->_tpl_vars['input_username']; ?>
&nbsp;<?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['endform']; ?>
</p>
<!-- SendAnotherEmail Template -->
  