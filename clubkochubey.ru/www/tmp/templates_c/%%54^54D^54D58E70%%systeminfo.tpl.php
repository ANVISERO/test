<?php /* Smarty version 2.6.25, created on 2014-02-06 13:18:45
         compiled from systeminfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'si_lang', 'systeminfo.tpl', 3, false),array('modifier', 'default', 'systeminfo.tpl', 44, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%54^54D^54D58E70%%systeminfo.tpl.inc'] = '4cd33f4e6b58e4350183ca81959ce033'; ?><div class="pagecontainer">
<?php if (empty ( $this->_supers['get']['cleanreport'] )): ?>
	<p class="pageshowrows"><a href="<?php echo $this->_tpl_vars['systeminfo_cleanreport']; ?>
"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','0');echo systeminfo_lang(array('a' => 'copy_paste_forum'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#0}'; endif;?>
</a></p>
<?php endif; ?>

<?php echo $this->_tpl_vars['showheader']; ?>


<div class="pageoverflow">


<div class="pageoverflow">
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','1');echo systeminfo_lang(array('a' => 'help_systeminformation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#1}'; endif;?>

</div><hr/>


<fieldset>
<legend><strong><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','2');echo systeminfo_lang(array('a' => 'cms_install_information'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#2}'; endif;?>
</strong>: </legend>

<div class="pageoverflow">
  <p class="pagetext"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','3');echo systeminfo_lang(array('a' => 'cms_version'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#3}'; endif;?>
</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['cms_version']; ?>
</p>
</div>
<br />
<div class="pageoverflow">
<h4 class="h-inside"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','4');echo systeminfo_lang(array('a' => 'installed_modules'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#4}'; endif;?>
</h4>
 </div>
<?php $_from = $this->_tpl_vars['installed_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
  <div class="pageoverflow">
    <p class="pagetext"><?php echo $this->_tpl_vars['module']['module_name']; ?>
</p>
    <p class="pageinput"><?php echo $this->_tpl_vars['module']['version']; ?>
</p>
  </div>
<?php endforeach; endif; unset($_from); ?>

<br />

<div class="pageoverflow">
<h4 class="h-inside"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','5');echo systeminfo_lang(array('a' => 'config_information'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#5}'; endif;?>
</h4>
</div>
<?php $_from = $this->_tpl_vars['config_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view'] => $this->_tpl_vars['tmp']):
?>
  <?php $_from = $this->_tpl_vars['tmp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
?>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['test']->title; ?>
:</p>
		<p class="pageinput">         
	<?php if (isset ( $this->_tpl_vars['test']->value )): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['test']->value)) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>
<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->secondvalue )): ?>(<?php echo ((is_array($_tmp=@$this->_tpl_vars['test']->secondvalue)) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>
)<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->res )): ?><img class="icon-extra" src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/extra/<?php echo $this->_tpl_vars['test']->res; ?>
.gif" title="<?php echo $this->_tpl_vars['test']->res_text; ?>
" alt="<?php echo $this->_tpl_vars['test']->res_text; ?>
" /><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->error_fragment )): ?><a class="external" rel="external" href="<?php echo $this->_tpl_vars['cms_install_help_url']; ?>
#<?php echo $this->_tpl_vars['test']->error_fragment; ?>
"><img src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/system/info-external.gif" title="?" alt="?" /></a><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->message )): ?><br /><?php echo $this->_tpl_vars['test']->message; ?>
<?php endif; ?>
		</p>
	</div>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

</fieldset>



<fieldset>
<legend><strong><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','6');echo systeminfo_lang(array('a' => 'php_information'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#6}'; endif;?>
</strong>: </legend>

<?php $_from = $this->_tpl_vars['php_information']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view'] => $this->_tpl_vars['tmp']):
?>
  <?php $_from = $this->_tpl_vars['tmp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
?>
	<div class="pageoverflow">
		<p class="pagetext"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#7}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','7');echo systeminfo_lang(array('a' => $this->_tpl_vars['key']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#7}'; endif;?>
 (<?php echo $this->_tpl_vars['key']; ?>
):</p>
		<p class="pageinput">
	<?php if (isset ( $this->_tpl_vars['test']->value ) && $this->_tpl_vars['test']->display_value != 0): ?>&nbsp;<?php echo $this->_tpl_vars['test']->value; ?>
<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->secondvalue )): ?>(<?php echo $this->_tpl_vars['test']->secondvalue; ?>
)<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->res )): ?><img class="icon-extra" src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/extra/<?php echo $this->_tpl_vars['test']->res; ?>
.gif" title="<?php echo $this->_tpl_vars['test']->res_text; ?>
" alt="<?php echo $this->_tpl_vars['test']->res_text; ?>
" /><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->error_fragment )): ?><a class="external" rel="external" href="<?php echo $this->_tpl_vars['cms_install_help_url']; ?>
#<?php echo $this->_tpl_vars['test']->error_fragment; ?>
"><img src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/system/info-external.gif" title="?" alt="?" /></a><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->message )): ?><br /><?php echo $this->_tpl_vars['test']->message; ?>
<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->opt )): ?>
		<?php $_from = $this->_tpl_vars['test']->opt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['opt']):
?>
			<br /><?php echo $this->_tpl_vars['key']; ?>
: <?php echo $this->_tpl_vars['opt']['message']; ?>
 <img class="icon-extra" src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/extra/<?php echo $this->_tpl_vars['opt']['res']; ?>
.gif" alt="<?php echo $this->_tpl_vars['opt']['res_text']; ?>
" title="<?php echo $this->_tpl_vars['opt']['res_text']; ?>
" />
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
		</p>
	</div>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

</fieldset>



<fieldset>
<legend><strong><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#8}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','8');echo systeminfo_lang(array('a' => 'server_information'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#8}'; endif;?>
</strong>: </legend>

<?php $_from = $this->_tpl_vars['server_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view'] => $this->_tpl_vars['tmp']):
?>
  <?php $_from = $this->_tpl_vars['tmp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
?>
	<div class="pageoverflow">
		<p class="pagetext"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#9}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','9');echo systeminfo_lang(array('a' => $this->_tpl_vars['key']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#9}'; endif;?>
 (<?php echo $this->_tpl_vars['key']; ?>
):</p>
		<p class="pageinput">
	<?php if (isset ( $this->_tpl_vars['test']->value )): ?><?php echo $this->_tpl_vars['test']->value; ?>
<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->secondvalue )): ?>(<?php echo $this->_tpl_vars['test']->secondvalue; ?>
)<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->res )): ?><img class="icon-extra" src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/extra/<?php echo ((is_array($_tmp=@$this->_tpl_vars['test']->res)) ? $this->_run_mod_handler('default', true, $_tmp, 'space') : smarty_modifier_default($_tmp, 'space')); ?>
.gif" title="<?php echo ((is_array($_tmp=@$this->_tpl_vars['test']->res_text)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
" alt="<?php echo ((is_array($_tmp=@$this->_tpl_vars['test']->res_text)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>
" /><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->message )): ?><br /><?php echo $this->_tpl_vars['test']->message; ?>
<?php endif; ?>
		</p>
	</div>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<br />

<div class="pageoverflow">
<h4 class="h-inside"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#10}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','10');echo systeminfo_lang(array('a' => 'permission_information'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#10}'; endif;?>
</h4>
</div>
<?php $_from = $this->_tpl_vars['permission_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['view'] => $this->_tpl_vars['tmp']):
?>
  <?php $_from = $this->_tpl_vars['tmp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['test']):
?>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $this->_tpl_vars['key']; ?>
:</p>
		<p class="pageinput">
	<?php if (isset ( $this->_tpl_vars['test']->value )): ?><?php echo $this->_tpl_vars['test']->value; ?>
<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->secondvalue )): ?>(<?php echo $this->_tpl_vars['test']->secondvalue; ?>
)<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->res )): ?><img class="icon-extra" src="themes/<?php echo $this->_tpl_vars['themename']; ?>
/images/icons/extra/<?php echo $this->_tpl_vars['test']->res; ?>
.gif" title="<?php echo $this->_tpl_vars['test']->res_text; ?>
" alt="<?php echo $this->_tpl_vars['test']->res_text; ?>
" /><?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['test']->message )): ?><br /><?php echo $this->_tpl_vars['test']->message; ?>
<?php endif; ?>
		</p>
	</div>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
<br />


</fieldset>

<p class="pageback"><a class="pageback" href="<?php echo $this->_tpl_vars['backurl']; ?>
">&#171; <?php if ($this->caching && !$this->_cache_including): echo '{nocache:4cd33f4e6b58e4350183ca81959ce033#11}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4cd33f4e6b58e4350183ca81959ce033','11');echo systeminfo_lang(array('a' => 'back'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4cd33f4e6b58e4350183ca81959ce033#11}'; endif;?>
</a></p>

</div>

</div>