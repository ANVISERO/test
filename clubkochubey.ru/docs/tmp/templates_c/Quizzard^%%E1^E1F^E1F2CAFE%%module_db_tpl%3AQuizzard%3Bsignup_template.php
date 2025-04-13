<?php /* Smarty version 2.6.25, created on 2013-03-07 10:43:21
         compiled from module_db_tpl:Quizzard%3Bsignup_template */ ?>
<?php if ($this->_tpl_vars['message'] != ""): ?><strong><?php echo $this->_tpl_vars['message']; ?>
</strong><br /><?php endif; ?>
<div>
<?php echo $this->_tpl_vars['startform']; ?>

<div class="quizrow">
<label for="name"><?php echo $this->_tpl_vars['title_name']; ?>
<?php if ($this->_tpl_vars['req_user']): ?>*<?php endif; ?>:</label>
<?php echo $this->_tpl_vars['input_name']; ?>

</div>


<?php $_from = $this->_tpl_vars['extras']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        	<div class="quizrow">
			<?php echo $this->_tpl_vars['entry']['label']; ?>
<?php if ($this->_tpl_vars['entry']['required']): ?>*<?php endif; ?>:
			<?php echo $this->_tpl_vars['entry']['input']; ?>

			</div>
<?php endforeach; endif; unset($_from); ?>

<div class="quizrow">
<label for="email"><?php echo $this->_tpl_vars['title_email']; ?>
<?php if ($this->_tpl_vars['req_user']): ?>*<?php endif; ?>:</label>
<?php echo $this->_tpl_vars['input_email']; ?>

</div>

<div class="quizrow">
<?php echo $this->_tpl_vars['quiz_id']; ?>
<?php echo $this->_tpl_vars['takequiz']; ?>

</div>
<?php echo $this->_tpl_vars['endform']; ?>

</div>