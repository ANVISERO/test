<?php /* Smarty version 2.6.25, created on 2014-01-13 13:58:34
         compiled from module_db_tpl:FrontEndUsers%3Bfeusers_loginform */ ?>
<?php echo $this->_tpl_vars['startform']; ?>

<?php if ($this->_tpl_vars['error']): ?>
  <?php echo $this->_tpl_vars['error']; ?>
<br>
<?php endif; ?>

<fieldset><label><?php echo $this->_tpl_vars['prompt_username']; ?>
:</label><?php echo $this->_tpl_vars['input_username']; ?>
</fieldset>
<fieldset><label><?php echo $this->_tpl_vars['prompt_password']; ?>
:</label><?php echo $this->_tpl_vars['input_password']; ?>
</fieldset>
 <?php if (isset ( $this->_tpl_vars['captcha'] )): ?><br/>
   <?php echo $this->_tpl_vars['captcha']; ?>
<br/><br/>
<fieldset><label><?php echo $this->_tpl_vars['captcha_title']; ?>
:</label> <?php echo $this->_tpl_vars['input_captcha']; ?>
</fieldset>

 <?php endif; ?>
 <?php if (isset ( $this->_tpl_vars['input_rememberme'] )): ?>
<fieldset><label><?php echo $this->_tpl_vars['input_rememberme']; ?>
</label><?php echo $this->_tpl_vars['prompt_rememberme']; ?>
</fieldset>
 <?php endif; ?>
<br/>
 <input type="submit" name="<?php echo $this->_tpl_vars['feuactionid']; ?>
submit" value="<?php echo $this->_tpl_vars['mod']->Lang('login'); ?>
"/><br/><br/>
  <a href="<?php echo $this->_tpl_vars['url_forgot']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('info_forgotpw'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('forgotpw'); ?>
</a><br/>
  <a href="<?php echo $this->_tpl_vars['url_lostun']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('info_lostun'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('lostusername'); ?>
</a><br/>
  Ещё не зарегистрированы? <a href="http://clubkochubey.ru/index.php?page=registratsiya" title="Ещё не зарегистрированы? Регистрация">Регистрация</a>
<?php echo $this->_tpl_vars['endform']; ?>

