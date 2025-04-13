<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Bpropertiesform.tpl */ ?>
<?php echo $this->_tpl_vars['title']; ?>

<?php if (isset ( $this->_tpl_vars['message'] )): ?>
  <?php if (isset ( $this->_tpl_vars['error'] )): ?>
    <p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>
  <?php else: ?>
    <p><?php echo $this->_tpl_vars['message']; ?>
</p>
  <?php endif; ?>
<?php endif; ?>
<div class="pageoverflow">
<p><?php echo $this->_tpl_vars['propcount']; ?>
&nbsp;<?php echo $this->_tpl_vars['propsfound']; ?>
</p>
<?php if ($this->_tpl_vars['propcount'] > 0): ?>
<br/>
<table cellspacing="0" class="pagetable cms_sortable tablesorter">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['nametext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['prompttext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['typetext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['lengthtext']; ?>
</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php $_from = $this->_tpl_vars['props']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prope']):
?>
		<tr class="<?php echo $this->_tpl_vars['prope']->rowclass; ?>
">
			<td><?php echo $this->_tpl_vars['prope']->name; ?>
</td>
			<td><?php echo $this->_tpl_vars['prope']->prompt; ?>
</td>
			<td><?php echo $this->_tpl_vars['prope']->type; ?>
</td>
			<td><?php echo $this->_tpl_vars['prope']->length; ?>
</td>
			<td><?php echo $this->_tpl_vars['prope']->editlink; ?>
</td>
			<td><?php if (isset ( $this->_tpl_vars['prope']->deletelink )): ?><?php echo $this->_tpl_vars['prope']->deletelink; ?>
<?php endif; ?></td>
		</tr>
<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php endif; ?>
</div>
<br/>
<p><?php echo $this->_tpl_vars['addlink']; ?>
</p>