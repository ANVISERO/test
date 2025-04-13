<?php /* Smarty version 2.6.25, created on 2012-06-09 17:05:45
         compiled from module_db_tpl:NMS%3Bnms_subscribeform */ ?>
	<?php if ($this->_tpl_vars['message'] != ""): ?>
	<br /><span class="nms_message"><?php echo $this->_tpl_vars['message']; ?>
</span><br />
	<?php endif; ?>
	<?php echo $this->_tpl_vars['formstart']; ?>

		<?php echo $this->_tpl_vars['formhidden']; ?>

        <?php if ($this->_tpl_vars['prompt_email'] != ""): ?>
		<!--<?php echo $this->_tpl_vars['prompt_email']; ?>
:&nbsp;--><?php echo $this->_tpl_vars['email']; ?>

        <?php endif; ?>
       <!-- <?php if ($this->_tpl_vars['prompt_username'] != ""): ?>
                <?php echo $this->_tpl_vars['prompt_username']; ?>
:&nbsp;<?php echo $this->_tpl_vars['username']; ?>
<br />
        <?php endif; ?>
		<?php $_from = $this->_tpl_vars['listids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_id']):
?>
		  <?php echo $this->_tpl_vars['curr_id']; ?>
<br/>
		<?php endforeach; endif; unset($_from); ?>-->
		<?php echo $this->_tpl_vars['submitbtn']; ?>

	<?php echo $this->_tpl_vars['formend']; ?>