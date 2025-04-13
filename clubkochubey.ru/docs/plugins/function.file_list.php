<?php
#File List on Front End for CMS - CMS Made Simple
#(c)2009 by Lewis Stewart (bored.bigtime@gmail.com)
#This project's homepage is: http://dev.cmsmadesimple.org/projects/file-list-table
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#

function smarty_cms_function_file_list($params, $sort, &$smarty)
{

	#Check if user has specified a folder to watch, otherwise use default
	if (isset($params['folder']))
	{
		$folder = rtrim($params['folder'], '/');
		$folder .= '/';
	} else {
		$folder = "uploads/";
	}




	if (isset($params['name']))
	{
		$name = $params['name'];
	} else {
		$name = "Name";
	}if (isset($params['date']))
	{
		$date = $params['date'];
	} else {
		$date = "Date";
	}

	if (isset($params['size']))
	{
		$size = $params['size'];
	} else {
		$size = "Size";
	}

	if (!empty($params['dateformat'])){
		$dateformat =$params['dateformat'];
	}
	else{
		$dateformat = 'Y-m-d';
	}

	if(isset($params['browsesubdirs']))
	{
		$browsesubdirs = $params['browsesubdirs'];
	}
	else $browsesubdirs = 1;

	if(!empty($_GET['file_list'])){
		$subdir = urldecode($_GET['file_list']);
		$subdir = str_replace('..', '', $subdir);
	}
	else{
		$subdir = '';
	}

	$file_names = array();
	$file_types = array();
	$file_dates = array();
	$file_sizes = array();

	if ( !$handle = opendir($folder.$subdir)){
		$handle = opendir($folder);
		$subdir = $_GET['file_list'] = '';
	}
	$fcount = 0;
	while ( false !== ( $entry = readdir($handle) ) )
	{
		if ($entry != "." && $entry != "..")
		{
		#Insert filename, filetype, filetime and filesize into arrays
			$fcount++;
			array_push($file_names, $entry);
			array_push($file_types, filetype($folder .$subdir. $entry) );
			array_push($file_dates, filemtime($folder.$subdir . $entry) );
			array_push($file_sizes, filesize($folder.$subdir . $entry) );
		}
	}
	closedir($handle);
	$fcount--;

	$file_shortnames = array_map('strtolower', $file_names);

	#Check if user has specified sort order
	if (isset($params['sort']))
	{
		$sort = $params['sort']; // line changed as suggested by David in bug 2487 (David)
	} else {
		$sort = "";
	}

	#Change file sort order if needed
	$sort = $sort . "  ";
	if (substr(strtolower($sort),0,1) == "d") {
		if (substr(strtolower($sort),0,2) == "dd") {
			array_multisort($file_dates,SORT_DESC,$file_types, $file_shortnames, $file_names);
		}
		else {
			array_multisort($file_dates,SORT_ASC,$file_types, $file_shortnames, $file_names);
		}
	}
	elseif (substr(strtolower($sort),0,1) == "s") {
		if (substr(strtolower($sort),0,2) == "sd") {
			array_multisort($file_sizes,SORT_DESC,$file_types, $file_shortnames, $file_names);
		}
		else {
			array_multisort($file_sizes,SORT_ASC,$file_types, $file_shortnames, $file_names);
		}
	}

	else { // line changed as suggested by Ernst in bug 2487 (David)
		array_multisort($file_types, $file_shortnames, $file_names);
		}

	echo "<table class=\"file_list_table\">\n"; // line changed by David for feature-request #2462

	#Check if user has specified whether to show column headers
	if (isset($params['colheaders']))
	{
		echo "<tr>\n
		<th></th>\n
		<th>".$name."</th>\n
		<th>".$size."</th>\n
		<th>".$date."</th>\n
		</tr>\n";
	}
	if(!empty($_GET['file_list'])){
		echo "<tr><td> </td><td><a href=\"".recreateUrl($subdir.'../')."\">..</td><td></td><td></td></tr>";
	}
	$total = 0;
	for ($i = 0; $i <= $fcount; $i++) {
		$file_ext = substr($file_names[$i],strrpos($file_names[$i],".")+1);
		$fullname = $folder.$subdir.$file_names[$i];
                if( is_dir ( $fullname )){
                	$href = recreateUrl($file_names[$i]);
                }
                else{
                	$href = urldecode($folder.$subdir) . urldecode($file_names[$i]).'"   target ="_blank ';
                }
                if (  !is_dir ( $fullname ) || $browsesubdirs ){
		echo "<tr>";
		echo "<td><img src=\"" . FileIcon($file_ext) . "\" alt=\"" . $file_ext . "-file\" /></td>";  // line changed as sugested by Rolf in bug 2908 (David)
		echo "<td><a href =\"" . $href . "\" >" . $file_names[$i] . "</a></td>";
		echo "<td align=\"left\">". number_format(filesize($fullname)/1024,0,',','.') . " KB</td>";
		$total += filesize($fullname);
		echo "<td>" . date($dateformat, filemtime($fullname)) . "</td>";
		echo "</tr>\n";
		}
	}

	echo "</table>\n";
}
#Get relevant icon for file extension

function FileIcon($file_ext) {

		$FullPath = "uploads/images/appicons/" . strtoupper($file_ext) . "icon.gif";
	if (!file_exists($FullPath) ) $FullPath ="uploads/images/appicons/" . "UFO" . "icon.gif";

	return $FullPath;
}

function recreateUrl($subdir){
	$subdir = rtrim($subdir, '/');
	$subdir .= '/';
	if (isset( $_GET['file_list'])){
		if(strpos($subdir,  '../') !== FALSE ){
			$subdir  = preg_replace( '/\.{2}(\x2F)$/' , '', urldecode($_GET["file_list"]));
			$subdir  = preg_replace( '/[^\x2F]+(\x2F)$/' , '',$subdir);
			//$subdir  = preg_replace( '/[^\x2F]+\x2F\.{2}\x2F$/' , '', urldecode($_GET["file_list"]));
			if (empty($subdir)){
				$url = str_replace( '&file_list='.urlencode($_GET["file_list"]), '', $_SERVER['REQUEST_URI']);
			}
			else{
				$url = str_replace( 'file_list='.urlencode($_GET["file_list"]), 'file_list='.urlencode($subdir), $_SERVER['REQUEST_URI']);
			}
		}
		else{
			$url = str_replace( 'file_list='.urlencode($_GET["file_list"]), 'file_list='.urlencode($_GET["file_list"].$subdir), $_SERVER['REQUEST_URI']);
		}
	}
	else{
		$url = $_SERVER['REQUEST_URI']."&amp;file_list=".urlencode($subdir);
	}
	return $url;
}


function smarty_cms_help_function_file_list() {
?>
<h3>What does this do?</h3>
<p>Displays a list of files from a folder with file icon, file name, file size and file date</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like <code>{file_list}</code>.</p>
<h3>What parameters does it take?</h3>
<p>
<ul>
<li><em>(optional)</em> <tt>folder</tt> - Folder to list files from (default is "uploads/"). Advise you include this.</li>
<li><em>(optional)</em> <tt>sort</tt> - Sort order: d - sort by date ascending; dd - sort by date descending; s - sort by size ascending; sd - sort by size descending. (default is sort by filetype then file name).</li>
<li><em>(optional)</em> <tt>colheaders</tt> - Show column headers (default is no headers).</li>
<li><em>(optional)</em> <tt>date="Date"</tt> - Column header "Date".</li>
<li><em>(optional)</em> <tt>na<!---->me="Name"</tt> - Column header "Name".</li>
<li><em>(optional)</em> <tt>siz<!---->e="Size"</tt> - Column headers "Size".</li>
<li><em>(optional)</em> <tt>dateformat="Y-m-d"</tt> - <a href="http://php.net/manual/en/function.date.php" target="_blank">Date format</a>.</li>
<li><em>(optional)</em> <tt>browsesubdirs=1</tt> -  Allow browse subdirectories.</li>
</ul>
</p>
<h3>Hints and Tips</h3>
<p>
- Create a new folder within the uploads/ directory for your files instead of using the default uploads/<br />
- File list is independent of upload method. Both FTP and File Manager should work.<br />
- If you know you're only going to use a very limited number of file formats, it is possible to remove unneccessary file icons to save space.<br />
- To create multilingual file list use "<a href='http://dev.cmsmadesimple.org/projects/trmanager' target="_blank">TranslationManager module</a>" <br/>
&nbsp;&nbsp;&nbsp;<em>{capture assign="date"}{tr_key key="date" lang=$lang}{/capture}<br/>
&nbsp;&nbsp;&nbsp;{file_list folder="uploads/audio/" sort="dd" colheaders=1 date=$date name="File name" dateformat="Y/m/d" browsesubdirs=1}</em><br/>
</p>
<?php
}

function smarty_cms_about_function_file_list() {
?>
<p>Author: Lewis Stewart &lt;<a href="mailto:bored.bigtime@gmail.com">bored.bigtime@gmail.com</a>&gt;<br />Thanks to: David Ursem and Andrius Peciura.
</p>
<p>Version 1.0.2</p>
<p>Change History:<br />
1.0a - Alpha version released. <br />
1.0.1 Some sorting issues fixed by David Ursem <br />
1.0.2 Added params "browsesubdirs", "date", "size", "name", "dateformat".
</p>
<?php
}
?>