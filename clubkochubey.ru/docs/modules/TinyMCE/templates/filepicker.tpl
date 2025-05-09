<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$filepickertitle}</title>
<link rel="stylesheet" type="text/css" href="{$rooturl}/modules/TinyMCE/filepicker.css" />
<script language="javascript" type="text/javascript" src="{$rooturl}/modules/TinyMCE/tinymce/jscripts/tiny_mce/tiny_mce_popup.js"></script>
{literal}
<script language="javascript" type="text/javascript">

function SubmitElement(filename) {
  var URL = filename;
  var win = tinyMCEPopup.getWindowArg("window");

  // insert information now
  win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
{/literal}
  
  {if $isimage=='1'}
  // for image browsers: update image dimensions
  if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
  if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(URL);
  {/if} 
  
{literal}
   // close popup window
  tinyMCEPopup.close();
}
{/literal}
</script>
</head>
<body>
<div id="full-fp">

<div class="header">

{if isset($messagefail) && $messagefail!=""}
<fieldset class="fp-error">
<legend>{$errortext}</legend>
{$messagefail}
</fieldset>
{/if}

{if isset($messagesuccess) && $messagesuccess!=""}
<fieldset class="fp-success">
<legend>{$successtext}</legend>
{$messagesuccess}
</fieldset>
{/if}

<fieldset>
<legend>{$youareintext}</legend>
<h2><img src="{$rooturl}/modules/TinyMCE/images/dir.gif" title="{$subdir}" alt="{$subdir}" />/{$subdir}</h2>
</fieldset>

{if isset($formstart) && $formstart!=''}
<fieldset>
<legend>{$fileoperations}</legend>
{$formstart}
<div>{$securityfield}</div>
<table width="100%">
<tr>
<td align="left" valign="top">
{$fileuploadtext}: {$fileuploadinput}{$fileuploadsubmit}
{if isset($resizeto)}
<br/>
{$resize_on}{$resizeto}{$resize_x}&nbsp;x&nbsp;{$resize_y}
{/if}
</td>
<td align="right" valign="top">
{$newdirtext}: {$newdirinput}{$newdirsubmit}
</td>
</tr>
</table>

{$formend}
</fieldset>
{/if}

</div>
<div class="filelist">
<table width="100%">
<thead>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td width="1%" align="right" style="white-space:nowrap;"><b>{$dimensionstext}</b></td>
<td width="1%" align="right" style="white-space:nowrap;"><b>{$sizetext}</b></td>
</tr>
</thead>
  {foreach from=$files item=file}
  <tr>
  {if $file->isdir=="1"}
    <td width="1%" align="center"><img src="{$rooturl}/modules/TinyMCE/images/dir.gif" title="Dir" alt="Dir" /></td> 
    <td>{$file->namelink} </td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="1%">{$file->deletelink}</td>
  {else}
    <td align="right">
    {if $filepickerstyle=="filename"}
      {if $file->isimage=="1"}
      <img src="{$rooturl}/modules/TinyMCE/images/images.gif" title="{$file->name}" alt="{$file->name}" />
      {elseif $file->fileicon!=""}
        {$file->fileicon}{*<img src="{$file->fileicon}" title="{$file->name}" alt="{$file->name}" />*}
      {else}

      <img src="{$rooturl}/modules/TinyMCE/images/fileicon.gif" title="{$file->name}" alt="{$file->name}" />
      {/if}
    {else}
      <div class="thumbnail">
      <a title="{$file->name}" href='#' onclick='SubmitElement("{$file->fullurl}")'>
      {if isset($file->thumbnail) && $file->thumbnail!=''}
      
        {$file->thumbnail}
      {else}
      
        {if $file->isimage=="1"}        
        <img src="{$rooturl}/modules/TinyMCE/images/images.gif" title="{$file->name}" alt="{$file->name}" />
        {elseif $file->fileicon!=""}
        {$file->fileicon}{*<img src="{$file->fileicon}" title="{$file->name}" alt="{$file->name}" />*}
        {else}
        <img src="{$rooturl}/modules/TinyMCE/images/fileicon.gif" title="{$file->name}" alt="{$file->name}" />
        {/if}
      {/if}
      </a>
      </div>
    {/if}
    </td>
    <td align="left">
       <a  title="{$file->name}" href='#' onclick='SubmitElement("{$file->fullurl}")'>
     {$file->name}
       </a>
    </td>
    <td width="1%" align="right">{$file->dimensions}</td>
    <td width="1%" align="right">{$file->size}</td>
    <td width="1%" align="right">{$file->deletelink}</td>
  {/if}
  </tr>
  {/foreach}
<tr><td colspan="4">&nbsp;</td></tr>
</table>
</div>
</div><!--end full-fp-->
</body>
</html>
