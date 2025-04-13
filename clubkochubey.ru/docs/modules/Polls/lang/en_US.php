<?php
$lang["friendlyname"]="Polls Made Simple";
$lang["moddescription"]="This module provides simple voting functionality to the frontend users";
$lang["permission"]="Administrate Polls";
$lang["postinstall"]="Polls version %s was successfully installed";

$lang["upgraded"]="Polls was successfully upgraded to version %s";

$lang["really_uninstall"]="Are you sure you want to uninstall Polls and erase all gathered data?";
$lang["postuninstall"]="Polls was successfully uninstalled";

$lang["help_poll_id"]="Use this to specify the id another poll than the one set as active";

$lang["showwhatpoll"]="Show";
$lang["activepoll"]="Active poll";
$lang["randompoll"]="Randomly chosen open poll";

$lang["pollname"]="Poll name";
$lang["pollstatus"]="Poll status";
$lang["activepoll"]="Active";
$lang["edit"]="Edit";
$lang["delete"]="Delete";
$lang["pollstartdate"]="Start date";
$lang["pollclosedate"]="Close date";
$lang["pollinfo"]="Poll info";

$lang["pollranfor"]="Poll ran for";
$lang["pollhasbeenrunningfor"]="Poll has been running for";
$lang["days"]="days";

$lang["open"]="Open";
$lang["closed"]="Closed";
$lang["confirmclosepoll"]="Are you sure this poll should be closed?";

$lang["pollwasclosed"]="The poll was closed";

$lang["addpoll"]="Add poll";

$lang["addnewpoll"]="Add new poll";
$lang["addandaddoptions"]="Add poll and options";
$lang["pollnamerequired"]="A name for the poll is required";
$lang["polladded"]="The poll was added";
$lang["add"]="Add";

$lang["cancel"]="Cancel";
$lang["confirmdeletepoll"]="Are you sure this poll should be deleted?";
$lang["polldeleted"]="The poll was deleted";

$lang["confirmresetpoll"]="Are you sure you want to reset votes for this poll?";
$lang["optionnamerequired"]="A name for the option is required";
$lang["addoption"]="Add option";
$lang["votes"]="Votes";
$lang["votepercent"]="%";
$lang["confirmdeleteoption"]="Are you sure you want to delete this option?";
$lang["editoptions"]="Edit options";
$lang["addingto"]="Adding to: ";
$lang["optionadded"]="The option was added";
$lang["optiondeleted"]="The option was deleted";
$lang["addnewoption"]="Add option";

$lang["editpoll"]="Edit poll";
$lang["resetpoll"]="Reset poll";
$lang["pollreset"]="The votes of this poll was reset";
$lang["optionname"]="Option name";
$lang["template"]="Template";

$lang["polls"]="Polls";

$lang["showpeekbutton"]="Show peek-button";

$lang["settings"]="Settings";
$lang["savesettings"]="Save settings";
$lang["settingssaved"]="Settings was saved";
$lang["polltemplate"]="Poll template";
$lang["resulttemplate"]="Result template";
$lang["listtemplate"]="Poll list template";

$lang["return"]="Return";
$lang["ok"]="OK";
$lang["resettodefault"]="Reset to default template";
$lang["confirmtemplate"]="Are you sure you want to reset to default template?";
$lang["templatesaved"]="The template was saved";
$lang["templatereset"]="The template was reset to default";

$lang["votetext"]="vote";
$lang["votestext"]="votes";
$lang["totalvotes"]="Total votes";
$lang["vote"]="Vote";
$lang["peekresult"]="Peek result";
$lang["returntovote"]="Goto voting";


$lang["pollcontenthelp"]="
Parameters available:<br/><br/>
{\$pollname}<br/>
{\$pollid}<br/>
{\$totalvotestext}<br/>
{\$totalvotes}<br/>
{\$voteform} - a button to return to voteform when peeking<br/>
<br/>
{\$option->label} - the optiontext<br/>
{\$option->uniqueid} - a unique text-id<br/>
{\$option->value} - the value that should be returned
";


$lang["resultcontenthelp"]="
Parameters available:<br/><br/>
{\$pollid}<br/>
{\$pollname}<br/>
<br/>
{\$option->label} - the optiontext<br/>
{\$option->votes} - The number of votes<br/>
{\$option->percent} - The percent of this option
";


$lang["changelog"]="
<ul>
<li>
<p>Version 0.2.0</p>
<p>Multiple polls on same page</p>
<p>Added help for template params</p>
<p>Cleaned up default templates, added labels</p>
</li>
<li>
<p>Version 0.1.7</p>
<p>Cleaned up smarty names</p>
<p>Added number of votes and total votes to params passed to templates</p>
</li>
<li>
<p>Version 0.1.6</p>
<p>Added a poll_id for controlling multiple polls (thank pumuklee)</p>
</li>
<li>
<p>Version 0.1.4</p>
<p>Really added the option for hiding peek button (don't know what went wrong i 0.1.3)</p>
<p>Fixed a bug with default result template</p>
<p>Fixed a syntax bug in the poll form</p>
<p>Cut down on the ajax-code if peekbutton was disabled</p>
</li>
<li>
<p>Version 0.1.3</p>
<p>Added an option for hiding the peek button</p>
</li>
<li>
<p>version 0.1.0</p>
<p>First usable version</p>
</li>
</ul>
";
$lang["help"]="
<b>What does this module do?</b>
<br/>
This module provides an easy way to show Ajax-powered polls on your page. The look polls are easily customized using the
templates and css. 
<br/>
<b>How do I use this module?</b>
<br/>
Basically you install the module, access it's administration interface and creates a poll, you add options to it
and activates it.
<br/>
In you page content or template you then insert something like:
<pre>
{cms_module module='polls' <i>params</i>}
</pre>
and your activat poll should emerge there.

";
?>