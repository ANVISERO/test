{* 
NOTE, Please do not hesitate to suggest improvements to these default templates!
I know these are not the nicest of designs, but I'm not a designer, so I really hope
some will jump in and help me making them useful and pretty.
*}

<!-- * HEAD * -->
<script type="text/javascript" language="javascript" src="{$moduleurl}/subsystems/lytebox/lytebox.js"></script>
<link rel="stylesheet" href="{$moduleurl}/subsystems/lytebox/lytebox.css" type="text/css" media="screen" />

{literal}
<style type="text/css">
.clear:after {content: ".";
display: block;
height: 0;
clear: both;
visibility: hidden;
} 
* html .clear {height: 1%;} 
.clear {display: block;} 

img.lyteboximage {
  border:0px;  
}

.lyteimagediv {
  width:100px;
  height:100px;
  border: 1px gray solid;
  border-right: 3px gray solid;
  border-bottom: 3px gray solid; 
  margin:5px;
  float:left;  
  text-align:center; 
}
.NeoGallery{
text-align:center;
}
.NeoGallery a{
cursor:pointer;
}
</style>
{/literal}
<!-- * BODY * -->

{if $lastpage>1}

<div class="NeoGallery clear">
<!-- navigation -->
<a href="{$firstpageurl}">&lt;&lt;</a>
&nbsp;&nbsp;
<a href="{$previouspageurl}">&lt;</a>
&nbsp;&nbsp;
<a href="{$nextpageurl}">&gt;</a>
&nbsp;&nbsp;
<a href="{$lastpageurl}">&gt;&gt;</a>
</div>
<br/>

{/if}
<div class="NeoGallery clear">
{foreach from=$images item=image}
{if $image->show=="1"}

  <div class="lyteimagediv">
  <a href="{$image->url}" rel="lytebox[{$uniquename}]" title="{$image->description}">
    <img alt="{$image->description}" title="{$image->description}" class='lyteboximage' src='{$image->thumbnailurl}' />
 </a> <br/>{$image->description}
 </div>

{else}
<a href="{$image->url}" rel="gb_imageset[{$uniquename}]" title="{$image->description}" style="visibility:hidden;">
</a>
{/if}

{/foreach}
</div>


