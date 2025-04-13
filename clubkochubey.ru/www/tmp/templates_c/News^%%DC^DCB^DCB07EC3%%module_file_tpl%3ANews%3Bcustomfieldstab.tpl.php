<?php /* Smarty version 2.6.25, created on 2014-02-05 12:50:42
         compiled from module_file_tpl:News%3Bcustomfieldstab.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:News;customfieldstab.tpl', 36, false),)), $this); ?>

<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['fielddeftext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['typetext']; ?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	<?php echo smarty_function_cycle(array('values' => "row1,row2",'assign' => 'rowclass'), $this);?>

		<tr class="<?php echo $this->_tpl_vars['rowclass']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
';">
			<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->type; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->uplink; ?>
</td>
	                <td><?php echo $this->_tpl_vars['entry']->downlink; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->editlink; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->deletelink; ?>
</td>
		</tr>
<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php endif; ?>

<div class="pageoptions"><p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p></div>