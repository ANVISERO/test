<?php /* Smarty version 2.6.25, created on 2013-03-07 15:28:40
         compiled from module_db_tpl:NMS%3Bpost_email_confirm_message */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cms_date_format', 'module_db_tpl:NMS;post_email_confirm_message', 1, false),)), $this); ?>
Ваш адрес <?php echo $this->_tpl_vars['email']; ?>
 подтвержден <?php echo ((is_array($_tmp=$this->_tpl_vars['dateconfirmed'])) ? $this->_run_mod_handler('cms_date_format', true, $_tmp) : smarty_cms_modifier_cms_date_format($_tmp)); ?>
.  
Ваш индивидуальный код - <?php echo $this->_tpl_vars['uniqueid']; ?>
.