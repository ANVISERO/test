<?php /* Smarty version 2.6.25, created on 2013-03-07 16:00:41
         compiled from module_db_tpl:FrontEndUsers%3Bfeusers_lostunform */ ?>
<h4><?php echo $this->_tpl_vars['title']; ?>
</h4>
<?php if (isset ( $this->_tpl_vars['message'] )): ?><h5 class="error"><?php echo $this->_tpl_vars['message']; ?>
</h5><?php endif; ?>
<?php if ($this->_tpl_vars['controlcount'] > 0): ?>
  <?php echo $this->_tpl_vars['startform']; ?>
<?php echo $this->_tpl_vars['hidden']; ?>

    <div class="pagerow">
      <div class="page_prompt"><?php echo $this->_tpl_vars['prompt_password']; ?>
</div>
      <div class="page_input"><?php echo $this->_tpl_vars['input_password']; ?>
</div>
    </div>
    <?php $_from = $this->_tpl_vars['controls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
       <div class="pagerow">
          <div class="page_prompt"><?php echo $this->_tpl_vars['entry']->hidden; ?>
<?php echo $this->_tpl_vars['entry']->prompt; ?>
</div
          <div class="page_input"><?php echo $this->_tpl_vars['entry']->control; ?>
<?php echo $this->_tpl_vars['entry']->addtext; ?>
</div>
       </div>
    <?php endforeach; endif; unset($_from); ?>
    <div class="pagerow"><?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['cancel']; ?>
</div>
    <div class="pagerow">
       <?php echo $this->_tpl_vars['captcha_title']; ?>
<?php echo $this->_tpl_vars['input_captcha']; ?>
<?php echo $this->_tpl_vars['captcha']; ?>

    </div>
  <?php echo $this->_tpl_vars['endform']; ?>

<?php endif; ?>