<?php
//http://javascript.html.it/script/vedi/552/textarea-con-bbcode
if(!isset($gCms)) exit;

if(!empty($gCms->variables['formcount'])) $_formcount = $gCms->variables['formcount'];
else $_formcount = 1;

$_FormId = $id.'moduleform_'.$_formcount;
$_TextareaId = $id.'post_body';
$_TextColor = $this->Lang('toolbar_textcolor');
$_ModulePath = $this->ModuleData['ImageUrl'];

$bbcodejs = <<<EOT
<script type="text/javascript">
var isMozilla=(navigator.userAgent.toLowerCase().indexOf('gecko')!=-1) ? true : false;
var regexp=new RegExp("[\\r]","gi");
function storeCaret(selec_start, selec_end)
{
	if (isMozilla)
	{
		oField=document.forms['{$_FormId}'].elements['{$_TextareaId}'];
		objectValue=oField.value;
		deb=oField.selectionStart;
		fin=oField.selectionEnd;

		objectValueDeb=objectValue.substring(0,oField.selectionStart);
		objectValueFin=objectValue.substring(oField.selectionEnd,oField.textLength);
		objectSelected=objectValue.substring(oField.selectionStart,oField.selectionEnd);
		oField.value=objectValueDeb + "[" + selec_start + "]" + objectSelected + "[/" + selec_end + "]" + objectValueFin;
		oField.selectionStart=strlen(objectValueDeb);
		oField.selectionEnd=strlen(objectValueDeb + "[" + selec_start + "]" + objectSelected + "[/" + selec_end + "]");
		oField.focus();
		oField.setSelectionRange(objectValueDeb.length + selec_start.length + 2,objectValueDeb.length + selec_end.length + 2);
	}
	else
	{
		oField=document.forms['{$_FormId}'].elements['{$_TextareaId}'];
		var str=document.selection.createRange().text;

		if (str.length>0)
		{
			//Si on a selectionné du texte
			var sel=document.selection.createRange();
			sel.text="[" + selec_start + "]" + str + "[/" + selec_end + "]";
			sel.collapse();
			sel.select();
		}
		else
		{
			oField.focus(oField.caretPos);
			oField.focus(oField.value.length);
			oField.caretPos=document.selection.createRange().duplicate();

			var bidon = "%~%";
			var orig=oField.value;
			oField.caretPos.text=bidon;
			var i=oField.value.search(bidon);
			oField.value=orig.substr(0,i) + "[" + selec_start + "][/" + selec_end + "]" + orig.substr(i, oField.value.length);
			var r=0;
			for(n=0; n<i; n++) {if(regexp.test(oField.value.substr(n,2)) == true){r++;}};
			pos = i + 2 + selec.length - r;
			var r=oField.createTextRange();
			r.moveStart('character',pos);
			r.collapse();
			r.select();
		}
	}
}
</script>
<a href="javascript:void(0);" onclick="storeCaret('b','b');return false;"><img src="{$_ModulePath}toobar_bold.gif" alt="Bold" title="Bold" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('i','i');return false;"><img src="{$_ModulePath}toobar_italic.gif" alt="Italic" title="Italic" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('u','u');return false;"><img src="{$_ModulePath}toobar_under.gif" alt="Under" title="Under" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('quote','quote');return false;"><img src="{$_ModulePath}toobar_quote.gif" alt="Quote" title="Quote" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('url','url');return false;"><img src="{$_ModulePath}toobar_url.gif" alt="URL" title="URL" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('center','center');return false;"><img src="{$_ModulePath}toobar_center.gif" alt="Center" title="Center" style="margin:1px; background-image:url({$_ModulePath}bbc_bg.gif);" /></a>
<select onchange="storeCaret('color=' + this.options[this.selectedIndex].value.toLowerCase(),'color'); this.selectedIndex=0;" style="margin-bottom:7px; background-color:white;">
	<option value="" selected="selected">{$_TextColor}</option>
	<option value="Black">Black</option>
	<option value="Red">Red</option>
	<option value="Yellow">Yellow</option>
	<option value="Pink">Pink</option>
	<option value="Green">Green</option>
	<option value="Orange">Orange</option>
	<option value="Purple">Purple</option>
	<option value="Blue">Blue</option>
	<option value="Beige">Beige</option>
	<option value="Brown">Brown</option>
	<option value="Teal">Teal</option>
	<option value="Navy">Navy</option>
	<option value="Maroon">Maroon</option>
	<option value="LimeGreen">Lime Green</option>
</select>
EOT;
?>
