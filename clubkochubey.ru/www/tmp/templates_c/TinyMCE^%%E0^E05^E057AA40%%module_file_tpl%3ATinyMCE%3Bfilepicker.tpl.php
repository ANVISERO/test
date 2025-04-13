<?php /* Smarty version 2.6.25, created on 2014-02-06 13:48:07
         compiled from module_file_tpl:TinyMCE%3Bfilepicker.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['filepickertitle']; ?>
</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/filepicker.css" />
<script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/tinymce/jscripts/tiny_mce/tiny_mce_popup.js"></script>
<?php echo '
<script language="javascript" type="text/javascript">

function SubmitElement(filename) {
  var URL = filename;
  var win = tinyMCEPopup.getWindowArg("window");

  // insert information now
  win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
'; ?>

  
  <?php if ($this->_tpl_vars['isimage'] == '1'): ?>
  // for image browsers: update image dimensions
  if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
  if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(URL);
  <?php endif; ?> 
  
<?php echo '
   // close popup window
  tinyMCEPopup.close();
}
'; ?>

</script>
</head>
<body>
<div id="full-fp">

<div class="header">

<?php if (isset ( $this->_tpl_vars['messagefail'] ) && $this->_tpl_vars['messagefail'] != ""): ?>
<fieldset class="fp-error">
<legend><?php echo $this->_tpl_vars['errortext']; ?>
</legend>
<?php echo $this->_tpl_vars['messagefail']; ?>

</fieldset>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['messagesuccess'] ) && $this->_tpl_vars['messagesuccess'] != ""): ?>
<fieldset class="fp-success">
<legend><?php echo $this->_tpl_vars['successtext']; ?>
</legend>
<?php echo $this->_tpl_vars['messagesuccess']; ?>

</fieldset>
<?php endif; ?>

<fieldset>
<legend><?php echo $this->_tpl_vars['youareintext']; ?>
</legend>
<h2><img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/dir.gif" title="<?php echo $this->_tpl_vars['subdir']; ?>
" alt="<?php echo $this->_tpl_vars['subdir']; ?>
" />/<?php echo $this->_tpl_vars['subdir']; ?>
</h2>
</fieldset>

<?php if (isset ( $this->_tpl_vars['formstart'] ) && $this->_tpl_vars['formstart'] != ''): ?>
<fieldset>
<legend><?php echo $this->_tpl_vars['fileoperations']; ?>
</legend>
<?php echo $this->_tpl_vars['formstart']; ?>

<div><?php echo $this->_tpl_vars['securityfield']; ?>
</div>
<table width="100%">
<tr>
<td align="left" valign="top">
<?php echo $this->_tpl_vars['fileuploadtext']; ?>
: <?php echo $this->_tpl_vars['fileuploadinput']; ?>
<?php echo $this->_tpl_vars['fileuploadsubmit']; ?>

<?php if (isset ( $this->_tpl_vars['resizeto'] )): ?>
<br/>
<?php echo $this->_tpl_vars['resize_on']; ?>
<?php echo $this->_tpl_vars['resizeto']; ?>
<?php echo $this->_tpl_vars['resize_x']; ?>
&nbsp;x&nbsp;<?php echo $this->_tpl_vars['resize_y']; ?>

<?php endif; ?>
</td>
<td align="right" valign="top">
<?php echo $this->_tpl_vars['newdirtext']; ?>
: <?php echo $this->_tpl_vars['newdirinput']; ?>
<?php echo $this->_tpl_vars['newdirsubmit']; ?>

</td>
</tr>
</table>

<?php echo $this->_tpl_vars['formend']; ?>

</fieldset>
<?php endif; ?>

</div>
<div class="filelist">
<table width="100%">
<thead>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td width="1%" align="right" style="white-space:nowrap;"><b><?php echo $this->_tpl_vars['dimensionstext']; ?>
</b></td>
<td width="1%" align="right" style="white-space:nowrap;"><b><?php echo $this->_tpl_vars['sizetext']; ?>
</b></td>
</tr>
</thead>
  <?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
  <tr>
  <?php if ($this->_tpl_vars['file']->isdir == '1'): ?>
    <td width="1%" align="center"><img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/dir.gif" title="Dir" alt="Dir" /></td> 
    <td><?php echo $this->_tpl_vars['file']->namelink; ?>
 </td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="1%"><?php echo $this->_tpl_vars['file']->deletelink; ?>
</td>
  <?php else: ?>
    <td align="right">
    <?php if ($this->_tpl_vars['filepickerstyle'] == 'filename'): ?>
      <?php if ($this->_tpl_vars['file']->isimage == '1'): ?>
      <img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/images.gif" title="<?php echo $this->_tpl_vars['file']->name; ?>
" alt="<?php echo $this->_tpl_vars['file']->name; ?>
" />
      <?php elseif ($this->_tpl_vars['file']->fileicon != ""): ?>
        <?php echo $this->_tpl_vars['file']->fileicon; ?>
      <?php else: ?>

      <img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/fileicon.gif" title="<?php echo $this->_tpl_vars['file']->name; ?>
" alt="<?php echo $this->_tpl_vars['file']->name; ?>
" />
      <?php endif; ?>
    <?php else: ?>
      <div class="thumbnail">
      <a title="<?php echo $this->_tpl_vars['file']->name; ?>
" href='#' onclick='SubmitElement("<?php echo $this->_tpl_vars['file']->fullurl; ?>
")'>
      <?php if (isset ( $this->_tpl_vars['file']->thumbnail ) && $this->_tpl_vars['file']->thumbnail != ''): ?>
      
        <?php echo $this->_tpl_vars['file']->thumbnail; ?>

      <?php else: ?>
      
        <?php if ($this->_tpl_vars['file']->isimage == '1'): ?>        
        <img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/images.gif" title="<?php echo $this->_tpl_vars['file']->name; ?>
" alt="<?php echo $this->_tpl_vars['file']->name; ?>
" />
        <?php elseif ($this->_tpl_vars['file']->fileicon != ""): ?>
        <?php echo $this->_tpl_vars['file']->fileicon; ?>
        <?php else: ?>
        <img src="<?php echo $this->_tpl_vars['rooturl']; ?>
/modules/TinyMCE/images/fileicon.gif" title="<?php echo $this->_tpl_vars['file']->name; ?>
" alt="<?php echo $this->_tpl_vars['file']->name; ?>
" />
        <?php endif; ?>
      <?php endif; ?>
      </a>
      </div>
    <?php endif; ?>
    </td>
    <td align="left">
       <a  title="<?php echo $this->_tpl_vars['file']->name; ?>
" href='#' onclick='SubmitElement("<?php echo $this->_tpl_vars['file']->fullurl; ?>
")'>
     <?php echo $this->_tpl_vars['file']->name; ?>

       </a>
    </td>
    <td width="1%" align="right"><?php echo $this->_tpl_vars['file']->dimensions; ?>
</td>
    <td width="1%" align="right"><?php echo $this->_tpl_vars['file']->size; ?>
</td>
    <td width="1%" align="right"><?php echo $this->_tpl_vars['file']->deletelink; ?>
</td>
  <?php endif; ?>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
<tr><td colspan="4">&nbsp;</td></tr>
</table>
</div>
</div><!--end full-fp-->
</body>
</html>