<?php
$lang['addlink']		= 'Add a link';
$lang['editlink']		= 'Edit link';
$lang['addtemplate']		= 'Add a template';
$lang['addcategory']		= 'Add a category';
$lang['editcategory']		= 'Edit category';
$lang['areyousure']		= 'Are you sure?';
$lang['changessaved']		= 'Your changes have been successfully saved.';
$lang['delete']			= 'Delete entry';
$lang['friendlyname'] 		= 'Link Manager';
$lang['header_name']		= 'Site Name';			  
$lang['template_header_name']	= 'Template Name';			  
$lang['header_url']		= 'Site URL';
$lang['header_img']		= 'Image';
$lang['header_category']	= 'Category';			  
$lang['moddescription']		= 'LinkMgr is used to manage external links.';
$lang['modlinkslisting']	= 'LinkMgr: Modify, add or delete links';
$lang['modtemplates']		= 'LinkMgr: Modify, add or delete templates';
$lang['needpermission']		= 'You are not allowed to make use of the "%s" permission. ' .
				  'Please ask the administrator for further information.';
$lang['no_link_name']		= 'No Link Name given. Please enter one.';
$lang['no_category']		= 'No Category given. Please enter one.';
$lang['no_link_url']		= 'No URL given. Please enter one.';
$lang['no_link_desc']		= 'No Description given. Please enter one.';
$lang['no_template_name']	= 'No Name given. Please enter one.';
$lang['no_template_text']	= 'No template code given. Please enter code.';
$lang['no_img']			= 'No Image';
$lang['nosuchid']		= 'There is no entry with the given ID (%u).';
$lang['nocatfixes']		= 'No links were using this Category.';
$lang['catfixes']		= 'Some links that used this Category need fixing.';
$lang['postdelete']		= 'The entry has been successfully deleted.';
$lang['postdeletecat']		= 'Category has been deleted - make sure you update any links that used it.';
$lang['postinstall']		= 'LinkMgr has successfully been installed.';
$lang['postuninstall']		= 'LinkMgr has successfully been removed.';
$lang['uninstalled'] 		= 'Module Uninstalled.';
$lang['installed'] 		= 'Module version %s installed.';
$lang['upgraded'] 		= 'Module upgraded to version %s.';
$lang['prompt_desc']		= 'Link Description';
$lang['prompt_url']		= 'Link URL';
$lang['prompt_img']		= 'Image';
$lang['note_img']		= 'Note: images must be uploaded to the /uploads/images/linkmgr directory.'; 
$lang['prompt_name']		= 'Link Name';
$lang['prompt_template_name']	= 'Template Name';
$lang['prompt_template_code']	= 'Template Code';
$lang['prompt_link_category']	= 'Category';
$lang['links']			= 'Links';
$lang['status']			= 'Status:';
$lang['template']		= 'Templates';
$lang['categories']		= 'Categories';
$lang['help_category']		= 'Specifies the category of links to display. If not specified, all categories are displayed';
$lang['changelog'] 		= '
<dl>
	<dt>1.0</dt>
	<dd>Module published for the first time.</dd>
	<dt>1.1</dt>
	<dd>Added Categories.</dd>
	<dt>1.2</dt>
	<dd>Fixed xml install.</dd>
	<dt>1.3</dt>
	<dd>Clean parameters.</dd>
	<dt>1.4</dt>
	<dd>Changed CSS for divs from ids to classes.</dd>
	<dt>1.5</dt>
	<dd>Added ability to specify images to use for the links.</dd>
</dl>';

$lang['help'] 			= '
<h3>About</h3>
<p>This module provides a simple link management interface.</p>

<h3>Usage</h3>
<p>Simply add links in the LinkMgr admin page (Contents->Link Manager), on the "Links" tab. 
You have to specify a link name (up to 255 characters), a link URL (up to 255 characters) 
and a short description (up to 255 characters).<br />
Note: URLs can be entered with or without the "http://" prefix.</p>
<p>To show the links, place this code in your page:</p>
<code>{cms_module module="LinkMgr"}</code>
<p>To show the links for a specific category, use this code in your page:</p>
<code>{cms_module module="LinkMgr" category="General"}</code>
<p>To show the links with a specific template, use this code in your page:</p>
<code>{cms_module module="LinkMgr" template="mytemplate"}</code>

<h3>Template</h3>
<p>In the template, the following variables are defined:</p>
<dl>
	<dt>$items</dt>
	<dd>The entries. Associative array (<strong>Caution!</strong> access with ".",
	not "->") with the following elements:<dl>
		<dt>link_name</dt><dd>Link Name</dd>
		<dt>link_url</dt><dd>Link URL</dd>
		<dt>link_img</dt><dd>Link Image - image filename prepended with "your_image_uploads_url/linkmgr/"</dd>
		<dt>link_category</dt><dd>Link Category</dd>
		<dt>link_desc</dt><dd>Link Description</dd> 
	</dl></dd>
</dl>
<p><strong>Note:</strong> to use images for links, you must first upload them to the uploads/images/linkmgr directory. The "Add Link" and "Edit Link" functions will automatically create a select list from the images in that directory.</p>

<h3>Support</h3>
<p>This module does not contain any commercial support. If you have problems, ask in the
<a href="http://forum.cmsmadesimple.org">forums</a>, the 
<a href="irc://irc.freenode.net/cms"><abbr title="Internet Relay Chat">IRC</abbr> chat</a> or write an email to
<a href="mailto:nmcgran@telus.net?subject=LinkMgr">me</a>.<p>';

$lang['help param template'] = 
'<p id="param_template">Specifies the name of a template used to format the Data. Templates can be added, edited or deleted in the "Template" tab of the LinkMgr admin panel. If not specified, the value of this parameter is "default" which is the default template created during installation.</p>';
?>
