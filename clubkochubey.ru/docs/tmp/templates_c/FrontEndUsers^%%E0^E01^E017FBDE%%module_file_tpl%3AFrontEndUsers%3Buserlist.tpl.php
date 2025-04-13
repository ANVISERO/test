<?php /* Smarty version 2.6.25, created on 2013-03-18 17:30:20
         compiled from module_file_tpl:FrontEndUsers%3Buserlist.tpl */ ?>
<?php echo '
<script type="text/javascript">
/*<![CDATA[*/
function select_all()
{
  cb = document.getElementsByName(\''; ?>
<?php echo $this->_tpl_vars['feuactionid']; ?>
selected[]<?php echo '\');
  el = document.getElementById(\'selectall\');
  st = el.checked;
  for( i = 0; i < cb.length; i++ )
  {
    if( cb[i].type == "checkbox" )
    {
      cb[i].checked=st;
    }
  }
}

function confirm_delete()
{
  var cb = document.getElementsByName(\''; ?>
<?php echo $this->_tpl_vars['feuactionid']; ?>
selected[]<?php echo '\');
  var count = 0;
  for( i = 0; i < cb.length; i++ )
  {
     if( cb[i].checked )
     {
       count++;
     }
  }

  if( count > 250 )
  {
     alert(\''; ?>
<?php echo $this->_tpl_vars['mod']->Lang('error_toomanyselected'); ?>
<?php echo '\');
     return false;
  }
  return confirm(\''; ?>
<?php echo $this->_tpl_vars['mod']->Lang('confirm_delete_selected'); ?>
<?php echo '\');
}

/*]]> */
</script>
'; ?>


<?php echo $this->_tpl_vars['startform']; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['prompt_filter']; ?>
:</legend>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_group']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_group']; ?>
</p>
</div>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_userfilter']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_regex']; ?>
</p>
</div>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_propertyfiltersel']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_propertysel']; ?>
</p>
</div>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_propertyfilter']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_property']; ?>
</p>
</div>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_loggedinonly']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_loggedinonly']; ?>
</p>
</div>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_limit']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_limit']; ?>
</p>
</div>
</fieldset>

<fieldset>
<legend><?php echo $this->_tpl_vars['prompt_sort']; ?>
:</legend>
<div class="pageoverflow">
 <p class="pagetext"><?php echo $this->_tpl_vars['prompt_sortby']; ?>
</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['filter_sortby']; ?>
</p>
</div>
</fieldset>

<div class="pageoverflow">
 <p class="pagetext">&nbsp;</p>
 <p class="pageinput"><?php echo $this->_tpl_vars['input_select']; ?>
<?php echo $this->_tpl_vars['input_hidden']; ?>
</p><br/>
</div>

<div class="pageoverflow">
 <p><?php echo $this->_tpl_vars['numusers']; ?>
&nbsp;<?php echo $this->_tpl_vars['usersingroup']; ?>
</p>
 <p><?php echo $this->_tpl_vars['itemcount']; ?>
&nbsp;<?php echo $this->_tpl_vars['usersfound']; ?>
</p>
</div>
<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
<table cellspacing="0" class="pagetable cms_sortable tablesorter">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['usernametext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['createdtext']; ?>
</th>
			<th><?php echo $this->_tpl_vars['expirestext']; ?>
</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
">&nbsp;</th>
			<th class="pageicon <?php echo '{sorter: false}'; ?>
"><input id="selectall" type="checkbox" name="junk" onclick="select_all();"/></th>
		</tr>
	</thead>
	<tbody>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['entry']->username; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->created; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->expires; ?>
</td>
			<td><?php if (isset ( $this->_tpl_vars['entry']->logoutlink )): ?><?php echo $this->_tpl_vars['entry']->logoutlink; ?>
<?php endif; ?></td>
			<td><?php echo $this->_tpl_vars['entry']->historylink; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->editlink; ?>
</td>
			<td><?php if (isset ( $this->_tpl_vars['entry']->deletelink )): ?><?php echo $this->_tpl_vars['entry']->deletelink; ?>
<?php endif; ?></td>
			<td><input type="checkbox" name="<?php echo $this->_tpl_vars['feuactionid']; ?>
selected[]" value="<?php echo $this->_tpl_vars['entry']->id; ?>
"/></td>
		</tr>	 
<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php endif; ?>
<div class="pageoverflow">
 <div style="float: left;"><?php echo $this->_tpl_vars['addlink']; ?>
</div>
 <div style="float: right;"><?php if (isset ( $this->_tpl_vars['perm_removeusers'] ) && $this->_tpl_vars['perm_removeusers'] == 1): ?><input type="submit" name="<?php echo $this->_tpl_vars['feuactionid']; ?>
bulkdelete" value="<?php echo $this->_tpl_vars['mod']->Lang('delete_selected'); ?>
" onclick="return confirm_delete();"/><?php endif; ?></div>
</div>
<?php echo $this->_tpl_vars['endform']; ?>
