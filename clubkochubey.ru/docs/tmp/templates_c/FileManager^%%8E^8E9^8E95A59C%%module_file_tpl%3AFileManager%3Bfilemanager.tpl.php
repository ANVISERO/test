<?php /* Smarty version 2.6.25, created on 2013-03-18 18:08:41
         compiled from module_file_tpl:FileManager%3Bfilemanager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:FileManager;filemanager.tpl', 45, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['currentpath']; ?>
 <?php echo $this->_tpl_vars['path']; ?>
</h2>

<div>
  <?php echo $this->_tpl_vars['dirformstart']; ?>

  <?php echo $this->_tpl_vars['hiddenpath']; ?>

  <?php echo $this->_tpl_vars['newdirnametext']; ?>
 <?php echo $this->_tpl_vars['newdirnameinput']; ?>

  <?php echo $this->_tpl_vars['dirsubmit']; ?>

  <?php echo $this->_tpl_vars['dirformend']; ?>

</div>
<br/>
<fieldset>
<div>
  <?php echo $this->_tpl_vars['formstart']; ?>

  <?php echo $this->_tpl_vars['hiddenpath']; ?>

  <?php echo '
  <script type="text/javascript">
  // <![CDATA[
  function selectall() {
  	checkboxes = document.getElementsByTagName("input");
	  for (i=0; i<checkboxes.length ; i++) {
	    if (checkboxes[i].type == "checkbox") checkboxes[i].checked=!checkboxes[i].checked;
	  }
  }
  // ]]>
  </script>
  '; ?>

  
  <table width="100%" class="pagetable" cellspacing="0">
  <thead>
  <tr>
    <th class="pageicon">&nbsp;</th>
    <th><?php echo $this->_tpl_vars['filenametext']; ?>
</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['fileinfotext']; ?>
</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['fileownertext']; ?>
</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['filepermstext']; ?>
</th>
    <th class="pageicon" style="text-align:right;"><?php echo $this->_tpl_vars['filesizetext']; ?>
</th>
    <th class="pageicon">&nbsp;</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['filedatetext']; ?>
</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['actionstext']; ?>
</th>
    <th class="pageicon"><?php echo $this->_tpl_vars['tagallinput']; ?>
</th>
  </tr>
  </thead>
  <tbody>
  <?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
	<?php echo smarty_function_cycle(array('values' => "row1,row2",'assign' => 'rowclass'), $this);?>

  <tr class="<?php echo $this->_tpl_vars['rowclass']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
';">
    
    <td valign="middle"><?php if (isset ( $this->_tpl_vars['file']->thumbnail ) && $this->_tpl_vars['file']->thumbnail != ''): ?><?php echo $this->_tpl_vars['file']->thumbnail; ?>
<?php else: ?><?php echo $this->_tpl_vars['file']->iconlink; ?>
<?php endif; ?></td>
    <td valign="middle"><?php echo $this->_tpl_vars['file']->txtlink; ?>
</td>
    <td style="padding-right:8px;" valign="middle"><?php echo $this->_tpl_vars['file']->fileinfo; ?>
</td>
    <td style="padding-right:8px;" valign="middle"><?php if (isset ( $this->_tpl_vars['file']->fileowner )): ?><?php echo $this->_tpl_vars['file']->fileowner; ?>
<?php else: ?>&nbsp;<?php endif; ?></td>
    <td style="padding-right:8px;" valign="middle"><?php echo $this->_tpl_vars['file']->filepermissions; ?>
</td>
    <td style="padding-right:2px;text-align:right;" valign="middle"><?php echo $this->_tpl_vars['file']->filesize; ?>
</td>
    <td style="padding-right:8px;" valign="middle"><?php if (isset ( $this->_tpl_vars['file']->filesizeunit )): ?><?php echo $this->_tpl_vars['file']->filesizeunit; ?>
<?php else: ?>&nbsp;<?php endif; ?></td>
    <td style="padding-right:8px;" valign="middle"><?php echo $this->_tpl_vars['file']->filedate; ?>
</td>
    <td valign="middle">
    
    <table cellspacing="0" border="0">
    <tr>    
    <td valign="middle"><?php echo $this->_tpl_vars['file']->renameaction; ?>
</td>
    <td valign="middle"><?php echo $this->_tpl_vars['file']->chmodaction; ?>
</td>
    <td valign="middle"><?php echo $this->_tpl_vars['file']->deleteaction; ?>
</td>
    <td valign="middle"><?php echo $this->_tpl_vars['file']->writeprotected; ?>
</td>
    </tr>
    </table>
    
    </td>
    <td>
    <?php echo $this->_tpl_vars['file']->checkbox; ?>

    </td>
  
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="7"><?php echo $this->_tpl_vars['countstext']; ?>
</td>
  </tr>
  </tbody>
  </table>
  <?php echo $this->_tpl_vars['actiondropdown']; ?>
<?php echo $this->_tpl_vars['targetdir']; ?>
<?php echo $this->_tpl_vars['okinput']; ?>

  <?php echo $this->_tpl_vars['formend']; ?>

</div>

</fieldset>
  