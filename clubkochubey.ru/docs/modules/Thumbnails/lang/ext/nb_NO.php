<?php
$lang['friendlyname'] = 'Thumbnails ';
$lang['description'] = 'Thumbnails er en modul som tilbyr miniatyrbilde(thumbnails) -funksjonalitet til andre moduler gjennom et enkelt API.';
$lang['postinstall'] = 'Thumbnails modulen ble installert';
$lang['postuninstall'] = 'Modelen ble avinstallert';
$lang['really_uninstall'] = 'Er du sikker p&aring; du vil avinstallere denne modulen?';
$lang['tools'] = 'Verkt&oslash;y';
$lang['settings'] = 'Innstillinger';
$lang['savesettings'] = 'Lagre innstillinger';
$lang['settingssaved'] = 'Innstillinger lagret';
$lang['thumbnailsize'] = 'Miniatyrbilde st&oslash;rrelse';
$lang['thumbnailformat'] = 'Miniatyrbilde format';
$lang['jpgquality'] = 'JPG kvalitet (100 er best)';
$lang['defaulticon'] = 'Standard ikon';
$lang['help'] = '
This module is a developer-only module providing thumbnail functionality for other modules.
It presents a simple API for retrieving thumbnail-urls, complete <img>-tags or whole GD-image-objects
representing the corrent thumbnails for a given image.
<br/>
Behind the scenes it generates the thumbnail and saves it in the correct place. 
<br/>
<br/>
(no need to translate the following)<br/>
Future plans include cleaning up obsolete thumbnails, checking image-size for changes, allowing different 
thumbnail-file style (saving in .thumbnails instead of in the same dir as the image is represents).
<br/><br/>
<strong>Usage</strong>
<br/>
To use the module you need to call methods inside it from you own module. You do it like this:
<br/>
<pre>
$thumbnails=$this->GetModuleInstance(&#039;Thumbnails&#039;&#039;);
return $thumbnails->GetThumbnailImageTag($file,$path,true);
</pre>
<br/>
<strong>API-methods</strong><br/>
<code>$filename</code> is always the filename of the image you want to handle the thumbnails for
<br/>
<code>$relpath</code> is the path of the image relativ to your cms $config[&#039;root_path&#039;]. The concanation of the path is handled by the module.
<br/><br/>

<code>GetThumbnailImageTag($filename=string,$relpath=string,$forcesize=&#039;&#039;,$addtext=&#039;&#039;)</code>
<br/>
&nbsp;&nbsp;Returns an img-tag pointing either to the saved thumbanail file or to the on-the-fly thumbnail generator used if saving is not allowed.
<br/>
&nbsp;&nbsp;The $forcesize-parameter specifies a size which should be forced through the <img>-tag. The largest of the thumbnail&#039;s height/width will be set to this.
<br/>
&nbsp;&nbsp;The $addtext-parameter will simply be added to the <img>-tag.
<br/><br/>
GetThumbnailImageUrl($filename,$relpath, $createifallowed=true, $forcesize=false, $checkdimensions=false)</code>
<br/>
&nbsp;&nbsp;Returns only the url of the thumbnail. Either a direct url to the saved thumbnail, or to the on-the-fly thumbnail generator used if saving is not allowed.
<br/><br/>

<code>SetCreateIfAllow($create=boolean)</code> 
<br/>
&nbsp;&nbsp;Manages whether the thumbnail should be saved if your permissions allows this (&#039;Modify Files&#039;). Default: true
<br/><br/>
<code>SetCheckDimensions($check=boolean)</code>
<br/>
&nbsp;&nbsp;handles whether the module should check the dimensions of the thumbnail, so changes to the thumbnail settings is applied to already saved thumbnails
<br/><br/>
Other methods exist, but are only partly implemented. And I will not promise that this API is locked for good.
<br/>
Feel free to comment or suggest improvements!
<br/><br/>';
$lang['utmz'] = '156861353.1214509297.178.9.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/';
$lang['utma'] = '156861353.179052623084110100.1210423577.1216498029.1216502052.259';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.1.10.1216502052';
?>