<?php /* Smarty version 2.6.25, created on 2014-02-06 13:20:32
         compiled from checksum.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'checksum.tpl', 26, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/www/tmp/templates_c/%%8E^8E4^8E4C686E%%checksum.tpl.inc'] = 'c8894d389a63b95a6ac7d3dbf12f7c27'; ?><div class="pagecontainer">

<?php if (isset ( $this->_tpl_vars['error'] )): ?>
<div class="pageerrorcontainer">
 <div class="pageoverflow">
   <p class="pageerror"><?php echo $this->_tpl_vars['error']; ?>
</p>
 </div>
 </div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['message'] )): ?>
<div class="pagecontainer">
 <div class="pageoverflow">
   <p style="color: green;"><?php echo $this->_tpl_vars['message']; ?>
</p>
 </div>
 </div>
<?php endif; ?>

<form action="<?php echo $this->_supers['server']['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
<div>
  <input type="hidden" name="<?php echo $this->_tpl_vars['cms_secure_param_name']; ?>
" value="<?php echo $this->_tpl_vars['cms_user_key']; ?>
" />
  <input type="hidden" name="action" value="upload" />
</div>
<fieldset>
  <legend><?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','0');echo checksum_lang(array('key' => 'perform_validation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#0}'; endif;?>
</legend>
  <div class="pageoverflow">
    <p><?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','1');echo checksum_lang(array('key' => 'info_validation'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#1}'; endif;?>
</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext"><?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','2');echo checksum_lang(array('key' => 'upload_cksum_file'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#2}'; endif;?>
</p>
    <p class="pageinput"><input type="file" name="cksumdat" size="30" maxlength="255" /></p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput"><input type="submit" name="submit" value="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','3');echo checksum_lang(array('key' => 'submit'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#3}'; endif;?>
" /></p>
  </div>
</fieldset>
</form>

<br/>
<form action="<?php echo $this->_supers['server']['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
<div>
  <input type="hidden" name="<?php echo $this->_tpl_vars['cms_secure_param_name']; ?>
" value="<?php echo $this->_tpl_vars['cms_user_key']; ?>
" />
  <input type="hidden" name="action" value="download" />
</div>
<fieldset>
  <legend><?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','4');echo checksum_lang(array('key' => 'download_cksum_file'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#4}'; endif;?>
</legend>
  <div class="pageoverflow">
    <p><?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#5}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','5');echo checksum_lang(array('key' => 'info_generate_cksum_file'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#5}'; endif;?>
</p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext">&nbsp;</p>
    <p class="pageinput"><input type="submit" name="submit" value="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:c8894d389a63b95a6ac7d3dbf12f7c27#6}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('c8894d389a63b95a6ac7d3dbf12f7c27','6');echo checksum_lang(array('key' => 'submit'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:c8894d389a63b95a6ac7d3dbf12f7c27#6}'; endif;?>
" /></p>
  </div>
</fieldset>
</form>

</div>