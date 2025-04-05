<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$resl=mysqli_query($link,"select * from for_files where id='$fil_id'");
$fil_name=mysqli_result($resl,0,2);
$fil_fil=mysqli_result($resl,0,3);
$fil_size=round((filesize($folder.'_admin/elements/downloads/'.$fil_fil)/1000000),2);
$fil_ext=mysqli_result($resl,0,4);
$fil_ico='ico_'.$fil_ext.'.gif';
echo('
<a href="/_admin/moduls/download.php?id='.$fil_id.'" target="_blank">
<img src="/_admin/_adminfiles/icons/'.$fil_ico.'" width="16" height="16" alt="'.$fil_name.'" align="absmiddle"  style="border:0"></a>
<a href="/_admin/moduls/download.php?id='.$fil_id.'" target="_blank">
'.$fil_name.' ( '.$fil_ext.', '.$fil_size.' Ìב )</a>
');
?>