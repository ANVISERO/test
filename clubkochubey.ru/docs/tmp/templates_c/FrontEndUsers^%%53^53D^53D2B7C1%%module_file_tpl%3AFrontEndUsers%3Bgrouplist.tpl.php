<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Bgrouplist.tpl */ ?>

<?php if (! isset ( $this->_tpl_vars['itemcount'] )): ?>
<p>0&nbsp;<?php echo $this->_tpl_vars['groupsfound']; ?>
</p>
<?php else: ?>
<p><?php echo $this->_tpl_vars['itemcount']; ?>
&nbsp;<?php echo $this->_tpl_vars['groupsfound']; ?>
</p>
<table cellspacing="0" class="pagetable cms_sortable tablesorter">
	<thead>
		<tr>
			<th width="5%"><?php echo $this->_tpl_vars['idtext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['nametext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['desctext']; ?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<tr class="<?php echo $this->_tpl_vars['entry']->rowclass; ?>
">
			<td><?php echo $this->_tpl_vars['entry']->id; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->desc; ?>
</td>
			<td><?php if (isset ( $this->_tpl_vars['entry']->exportlink )): ?><?php echo $this->_tpl_vars['entry']->exportlink; ?>
<?php endif; ?></td>
			<td><?php echo $this->_tpl_vars['entry']->editlink; ?>
</td>
			<td><?php if (isset ( $this->_tpl_vars['entry']->deletelink )): ?><?php echo $this->_tpl_vars['entry']->deletelink; ?>
<?php endif; ?></td>
		</tr>
<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php endif; ?>

<p class="pageoverflow">
<?php if ($this->_tpl_vars['propcount'] > 0): ?><?php echo $this->_tpl_vars['addlink']; ?>
&nbsp;<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['exportlink'] )): ?><?php echo $this->_tpl_vars['exportlink']; ?>
&nbsp;<?php endif; ?>
<?php echo $this->_tpl_vars['importlink']; ?>

</p>