<?php /* Smarty version 2.6.25, created on 2014-01-30 14:14:00
         compiled from module_file_tpl:Comments%3Bcommentlist.tpl */ ?>
<?php echo '
<script type="text/javascript">
function selectall() {
	checkboxes = document.getElementsByTagName("input");
	for (i=0; i<checkboxes.length ; i++) {
	  if (checkboxes[i].type == "checkbox") checkboxes[i].checked=!checkboxes[i].checked;
	}
}
</script>
'; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['mod']->Lang('filters'); ?>
:&nbsp;</legend>
<?php echo $this->_tpl_vars['filter_formstart']; ?>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['mod']->Lang('page_limit'); ?>
:</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_pagelimit']; ?>
</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><input type="submit" name="<?php echo $this->_tpl_vars['mod']->GetActionId(); ?>
submit" value="<?php echo $this->_tpl_vars['mod']->Lang('submit'); ?>
"></p>
</div>
<?php echo $this->_tpl_vars['filter_formend']; ?>

</fieldset>

<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
<?php if (isset ( $this->_tpl_vars['firstpage_url'] )): ?>
 <a href="<?php echo $this->_tpl_vars['firstpage_url']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('firstpage'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('firstpage'); ?>
</a>
 <a href="<?php echo $this->_tpl_vars['prevpage_url']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('prevpage'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('prevpage'); ?>
</a>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['firstpage_url'] ) || isset ( $this->_tpl_vars['lastpage_url'] )): ?>
  <?php echo $this->_tpl_vars['mod']->Lang('page_of',$this->_tpl_vars['pagenumber'],$this->_tpl_vars['pagecount']); ?>

<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['lastpage_url'] )): ?>
 <a href="<?php echo $this->_tpl_vars['nextpage_url']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('nextpage'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('nextpage'); ?>
</a>
 <a href="<?php echo $this->_tpl_vars['lastpage_url']; ?>
" title="<?php echo $this->_tpl_vars['mod']->Lang('lastpage'); ?>
"><?php echo $this->_tpl_vars['mod']->Lang('lastpage'); ?>
</a>
<?php endif; ?>
<?php echo $this->_tpl_vars['formstart']; ?>

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['datatext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['titletext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['authortext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['activetext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['postdatetext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['modifydatetext']; ?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><?php echo $this->_tpl_vars['checkall']; ?>
</th>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<tr class="<?php echo $this->_tpl_vars['entry']->rowclass; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['entry']->rowclass; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['entry']->rowclass; ?>
';">
			<td><?php echo $this->_tpl_vars['entry']->data; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->title; ?>
</td>
			<td><a href="mailto:<?php echo $this->_tpl_vars['entry']->email; ?>
" title="Click to send email"><?php echo $this->_tpl_vars['entry']->author; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['entry']->active; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->postdate; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->modifydate; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->deletelink; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->massdeletebox; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<div style="text-align:right; padding-right: 37px;"><?php echo $this->_tpl_vars['massdelbutton']; ?>
</div>
<?php echo $this->_tpl_vars['formend']; ?>

<?php else: ?>
<br /><?php echo $this->_tpl_vars['message']; ?>
<br />
<?php endif; ?>