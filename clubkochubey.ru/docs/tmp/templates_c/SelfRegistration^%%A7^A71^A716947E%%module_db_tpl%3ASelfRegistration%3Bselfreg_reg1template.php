<?php /* Smarty version 2.6.25, created on 2013-03-07 16:00:42
         compiled from module_db_tpl:SelfRegistration%3Bselfreg_reg1template */ ?>
<!-- Registration 1 template -->
<?php echo $this->_tpl_vars['title']; ?>

<?php if (isset ( $this->_tpl_vars['message'] ) && $this->_tpl_vars['message'] != ''): ?>
  <?php if (isset ( $this->_tpl_vars['error'] ) && $this->_tpl_vars['error'] != ''): ?>
    <p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>
  <?php else: ?>
    <p><?php echo $this->_tpl_vars['message']; ?>
</p>
  <?php endif; ?>
<?php endif; ?>
<?php echo $this->_tpl_vars['startform']; ?>

<?php if ($this->_tpl_vars['controlcount'] > 0): ?>


<?php $_from = $this->_tpl_vars['controls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['control']):
?>
  <fieldset>
    <label><?php echo $this->_tpl_vars['control']->hidden; ?>

    <?php if ($this->_tpl_vars['control']->color != ''): ?>
      <?php echo $this->_tpl_vars['control']->prompt; ?>
<?php echo $this->_tpl_vars['control']->marker; ?>

    <?php else: ?>
      <?php echo $this->_tpl_vars['control']->prompt; ?>
<?php echo $this->_tpl_vars['control']->marker; ?>

    <?php endif; ?>
    </label>
    <?php echo $this->_tpl_vars['control']->control; ?>

  </fieldset>
<?php endforeach; endif; unset($_from); ?>


<br/>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['captcha'] )): ?>

  <?php echo $this->_tpl_vars['captcha']; ?>
<br /><br /> <fieldset><label><?php echo $this->_tpl_vars['captcha_title']; ?>
:</label> <?php echo $this->_tpl_vars['input_captcha']; ?>
 </fieldset>
<?php endif; ?>
 <?php echo $this->_tpl_vars['hidden']; ?>
<?php if (isset ( $this->_tpl_vars['hidden2'] )): ?><?php echo $this->_tpl_vars['hidden2']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['submit']; ?>
<br/><br/><br/>
<?php echo $this->_tpl_vars['msg_sendanotheremail']; ?>
&nbsp;<?php echo $this->_tpl_vars['link_sendanotheremail']; ?>

<?php echo $this->_tpl_vars['endform']; ?>

<!-- Registration 1 template -->