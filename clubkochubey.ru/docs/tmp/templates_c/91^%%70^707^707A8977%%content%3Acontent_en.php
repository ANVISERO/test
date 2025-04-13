<?php /* Smarty version 2.6.25, created on 2013-03-07 16:42:35
         compiled from content:content_en */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'file_list', 'content:content_en', 2, false),)), $this); ?>
<?php $this->_cache_serials['/var/www/clubkochubey.ru/docs/tmp/templates_c/91^%%70^707^707A8977%%content%3Acontent_en.inc'] = 'ebf56a7e658e479cd6c90635b42fc899'; ?><h2>Аудио архив</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:ebf56a7e658e479cd6c90635b42fc899#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('ebf56a7e658e479cd6c90635b42fc899','0');echo smarty_cms_function_file_list(array('folder' => "uploads/audio/",'colheaders' => '1','name' => "Файл",'size' => "Размер",'date' => "Дата"), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:ebf56a7e658e479cd6c90635b42fc899#0}'; endif;?>
 <br /><br />
<h2>Видео архив</h2>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:ebf56a7e658e479cd6c90635b42fc899#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('ebf56a7e658e479cd6c90635b42fc899','1');echo smarty_cms_function_file_list(array('folder' => "uploads/video/",'colheaders' => '1','name' => "Файл",'size' => "Размер",'date' => "Дата"), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:ebf56a7e658e479cd6c90635b42fc899#1}'; endif;?>