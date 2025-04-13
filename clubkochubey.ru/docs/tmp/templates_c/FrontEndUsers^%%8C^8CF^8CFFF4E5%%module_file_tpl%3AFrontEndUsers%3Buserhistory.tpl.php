<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Buserhistory.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'module_file_tpl:FrontEndUsers;userhistory.tpl', 84, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['message'] )): ?>
  <?php if (isset ( $this->_tpl_vars['error'] )): ?>
    <font color="red"><h4><?php echo $this->_tpl_vars['message']; ?>
</h4></font>
  <?php else: ?>
    <h4><?php echo $this->_tpl_vars['message']; ?>
</h4>
  <?php endif; ?>
<?php endif; ?>

<?php if (! isset ( $this->_tpl_vars['multiuser'] )): ?>
<h4><?php echo $this->_tpl_vars['title_userhistory']; ?>
&nbsp;<?php echo $this->_tpl_vars['for']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_username']; ?>
</h4>
<?php endif; ?>
<?php echo $this->_tpl_vars['formstart']; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['title_legend_filter']; ?>
</legend>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_filter_eventtype']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_filter_eventtype']; ?>
</p>
  </div>
<?php if (isset ( $this->_tpl_vars['multiuser'] )): ?>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_username_regex']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_username_regex']; ?>
</p>
  </div>
<?php endif; ?>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_filter_date']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_filter_date']; ?>
</p>
  </div>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_pagelimit']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_pagelimit']; ?>
</p>
  </div>
</fieldset>
<fieldset>
<legend><?php echo $this->_tpl_vars['title_legend_groupsort']; ?>
</legend>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_group_ip']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_group_ip']; ?>
</p>
  </div>
  <div class="pageoverflow">
     <p class="pagetext"><?php echo $this->_tpl_vars['prompt_sortorder']; ?>
:</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['input_sortorder']; ?>
</p>
  </div>
</fieldset>
  <div class="pageoverflow">
     <p class="pagetext">&nbsp;</p>
     <p class="pageinput"><?php echo $this->_tpl_vars['submit']; ?>
&nbsp;<?php echo $this->_tpl_vars['reset']; ?>
</p>
  </div>
<?php echo $this->_tpl_vars['formend']; ?>


<p><?php echo $this->_tpl_vars['recordcount']; ?>
&nbsp;<?php echo $this->_tpl_vars['prompt_recordsfound']; ?>
</p>
<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
<?php if ($this->_tpl_vars['pagecount'] > 1): ?>
  <p>
<?php if ($this->_tpl_vars['pagenumber'] > 1): ?>
<?php echo $this->_tpl_vars['firstpage']; ?>
&nbsp;<?php echo $this->_tpl_vars['prevpage']; ?>
&nbsp;
<?php endif; ?>
<?php echo $this->_tpl_vars['pagenumber']; ?>
&nbsp;<?php echo $this->_tpl_vars['oftext']; ?>
&nbsp;<?php echo $this->_tpl_vars['pagecount']; ?>

<?php if ($this->_tpl_vars['pagenumber'] < $this->_tpl_vars['pagecount']): ?>
&nbsp;<?php echo $this->_tpl_vars['nextpage']; ?>
&nbsp;<?php echo $this->_tpl_vars['lastpage']; ?>

<?php endif; ?>
</p>
<?php endif; ?>
<br/>
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
<?php if (isset ( $this->_tpl_vars['multiuser'] )): ?>
	<th><?php echo $this->_tpl_vars['prompt_username']; ?>
</th>
<?php endif; ?>
	<th><?php echo $this->_tpl_vars['prompt_ipaddress']; ?>
</th>
	<th><?php echo $this->_tpl_vars['prompt_action']; ?>
</th>
	<th><?php echo $this->_tpl_vars['prompt_refdate']; ?>
</th>
    </tr>
  </thead>
  <tbody>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
  <tr class="<?php echo $this->_tpl_vars['entry']->rowclass; ?>
">
<?php if (isset ( $this->_tpl_vars['multiuser'] )): ?>
        <td><?php echo $this->_tpl_vars['entry']->username; ?>
</td>
<?php endif; ?>
	<td><?php echo $this->_tpl_vars['entry']->ipaddress; ?>
</td>
	<td><?php echo $this->_tpl_vars['entry']->action; ?>
</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->refdate)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y - %X") : smarty_modifier_date_format($_tmp, "%b %e, %Y - %X")); ?>
</td>
  </tr>	 
<?php endforeach; endif; unset($_from); ?>
  </tbody>
</table>
<?php endif; ?>