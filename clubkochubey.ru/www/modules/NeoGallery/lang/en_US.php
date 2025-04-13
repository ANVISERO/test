<?php
$lang["friendlyname"]="Neo Gallery";
$lang["description"]="An easy to use gallery depending on subsystems like Greybox, Lytebox etc.";
$lang["postinstall"]="The NeoGallery module was successfully installed";
$lang["installed"]="The NeoGallery modules was installed - version %s";
$lang["postuninstall"]="The module was uninstalled";
$lang["uninstalled"]="The module was uninstalled";
$lang["really_uninstall"]="Are you sure you want to uninstall NeoGallery?";
$lang["permission"]="Administrate NeoGallery";

$lang["nogalleriestext"]="No galleries available";
$lang["addgallery"]="Add gallery";
$lang["galleryadded"]="Gallery added";
$lang["galleryupdated"]="Gallery updated";
$lang["deletegallery"]="Delete gallery";
$lang["gallerydeleted"]="Gallery deleted";
$lang["confirmdeletegallery"]="Are you sure this gallery should be deleted? This will not affect the images it shows...";
$lang["setasdefault"]="Set as default";
$lang["editgallery"]="Edit gallery";
$lang["galleries"]="Galleries";
$lang["settings"]="Settings";
$lang["savesettings"]="Save settings";
$lang["settingssaved"]="Settings saved";

$lang["name"]="Name";
$lang["textid"]="Shorter text ID";
$lang["optional"]="optional";
$lang["path"]="Path";
$lang["subsystem"]="Sub system";

$lang["namemissing"]="A name for the gallery should be provided";
$lang["duplicatename"]="Another gallery already has this name or textid";
$lang["pathmissing"]="An image path should be selected";
$lang["duplicatetextid"]="Another template already has this textid";

$lang["images"]="Images";
$lang["noimagestext"]="No images found";

$lang["selecttargetdir"]="Select target dir";
$lang["dropdown_greybox"]="GreyBox";
$lang["dropdown_lytebox"]="LyteBox";

$lang["imagesperpage"]="Images per page";

$lang["template"]="Template";
$lang["templates"]="Templates";
$lang["addtemplate"]="Add template";

$lang["edittemplate"]="Edit template";

$lang["templateadded"]="Template added";
$lang["templateupdated"]="Template updated";
$lang["updatetemplate"]="Update template";
$lang["deletetemplate"]="Delete template";
$lang["copytemplate"]="Copy template";
$lang["templatedeleted"]="Template deleted";
$lang["confirmdeletetemplate"]="Are you sure this template should be deleted?";
$lang["notemplates"]="No template defined";
$lang["templatetextid"]="Text ID";
$lang["textidmissing"]="A text ID should be provided";
$lang["templatecontent"]="Template content";


$lang["defaultgalleryset"]="Default gallery set";
$lang["defaulttemplateset"]="Default template set";
$lang["default"]="Default";

$lang["imagename"]="Filename";
$lang["imagedescription"]="Description";
$lang["imageinfo"]="Info";
$lang["imagehidden"]="Hidden";
$lang["imagepropssaved"]="Image properties saved";

$lang["readonly"]="(Read-only)";
$lang["default"]="Default";
$lang["singledefault"]="Single image default";

$lang["actions"]="Actions";
$lang["update"]="Update";
$lang["submit"]="Submit";
$lang["add"]="Add";
$lang["apply"]="Apply";
$lang["cancel"]="Cancel";
$lang["back"]="Back";

$lang["malformedtemplate"]="Warning! Malformed template, please consult the help page";
$lang["pathnotwritable"]="Warning! The currently selected image path does not seem to be writable. 
Please note that thumbnails probably cannot be saved and will be generated on the fly each time the gallery is shown. 
This may slow down the user experience.";

$lang["helpgallery"]="Specifies which gallery should be shown. Can be a numeric id, a textid or the complete name. Defaults to the gallery selected as default";
$lang["helptemplate"]="Specifies which template should be used to show the images. Can be a numeric id, or the textid. Defaults to the template selected for the current gallery.";
$lang["helpimagesperpage"]="Specifies how many images should be shown per page. Defaults to the setting in the gallery setup.";

$lang["helpimage"]="This enabled a single image to be shown instead of a gallery. Can be used to display images inside content in the fancy greybox/lytebox way";
$lang["helpsubsystem"]="This chooses a subsystem for which you wish to use the default template display the image. Specifying a specifik template overrides this. <i>Applies only to singleimage showing</i>."; 
$lang["helpdescription"]="This specifies a description for the image. <i>Applies only to singleimage showing</i>.";
$lang["helpfloat"]="This helps making the thumbnail blend in better with the text by styling it to float either to the right or the left of the surrounding text. Allowed values are 'right' and 'left'. <i>Applies only to singleimage showing</i>";
$lang["helpsize"]="This forces an alternative size to the thumbnail instead of the default. <i>Applies only to singleimage showing</i>";
$lang["helpaddstyle"]="This specifies any additional style elements to be added to the inline-styletag. Note that these cannot be entered using the addtext-parameter as it would be overridden by the float-parameter. <i>Applies only to singleimage showing</i>.";
$lang["helpaddtext"]="This specifies any additional parameters that should be added to the <img>-tag. <i>Applies only to singleimage showing</i>.";

$lang["help"]="
This module is a new approach to a gallery for CMS Made Simple. It's goal is to be extremely fast to setup,
and to look good at once. It therefore relies solely on javascript imageviewers like lytebox and greybox (others
may be added later).
<br/>
It's philosophy is, choose a directory with images and show them. As simple as that. Presently it relies on the
images being uploaded from FileManager or another upload-module (please check out the 'Multi Upload'- and/or 
'Image Upload'-modules). This may change in the future, but it will always be kept very simple to setup and use.
<br/>
To use is probably as simple as putting
<code>
{NeoGallery}
</code>
in your page content. This will show the gallery selected as default using the template selected. A few parameters for 
changing this behavior can be seen below.

<br/>
<br/>
If you have any suggestions for how to improve this module or you have encountered a bug or problem please catch
me in IRC, or post a ticket in the development forge.
<br/>
<br/>
";
?>