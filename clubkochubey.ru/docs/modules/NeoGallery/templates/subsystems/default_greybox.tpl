{* 
NOTE, Please do not hesitate to suggest improvements to these default templates!
I know these are not the nicest of designs, but I'm not a designer, so I really hope
some will jump in and help me making them useful and pretty.
*}

<!-- * HEAD * -->
<script type="text/javascript">
    var GB_ROOT_DIR = "{$moduleurl}/subsystems/greybox/";
</script>
<script type="text/javascript" src="{$moduleurl}/subsystems/greybox/AJS.js"></script>
<script type="text/javascript" src="{$moduleurl}/subsystems/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="{$moduleurl}/subsystems/greybox/gb_scripts.js"></script>
<link href="{$moduleurl}/subsystems/greybox/gb_styles.css" rel="stylesheet" type="text/css" />

{literal}
<style type="text/css" >
.clear:after {content: ".";
display: block;
height: 0;
clear: both;
visibility: hidden;
} 
* html .clear {height: 1%;} 
.clear {display: block;} 

img.greyboximage {
  border:0px;  
}

.greyboximagediv {
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
<div class="NeoGallery">
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
<div class="NeoGallery  clear">
{foreach from=$images item=image}
{if $image->show=="1"}

  <div class="greyboximagediv">
  <a href="{$image->url}" rel="gb_imageset[{$uniquename}]" title="{$image->description}">
    <img alt="{$image->description}" title="{$image->description}" class="greyboximage" src="{$image->thumbnailurl}" />
 </a> </div>

{else}
<a href="{$image->url}" rel="gb_imageset[{$uniquename}]" title="{$image->description}" style="visibility:hidden;">
</a>
{/if}

{/foreach}
</div>

