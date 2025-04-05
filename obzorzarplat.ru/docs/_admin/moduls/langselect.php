<script type="text/JavaScript">
<!--
function MM_jumpMenuLang(targ,selObj,restore){ //v3.0
  eval(targ+".location='/"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
&nbsp;<br>
<form name="langselect" action="">
<select name="langs" onChange="MM_jumpMenuLang('parent',this,0)" class="text">
<?
$lang_temp_test=$temp;

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$lang_query=mysqli_query($link,"select * from for_langs order by pos");
$lang_select='';
while($row=mysqli_fetch_array($lang_query))
{
$lang_name=$row["name"];
$lang_url=$row["url"];
$lang_temps=$row["temps"];
$lang_temps_arr=implode(",",$lang_temps);
for($gg=0; $gg<=count($lang_temps_arr); $gg++)
{
	if($lang_temps_arr[$gg]==$lang_temp_test){$lang_select='selected';}
}
echo('<option value="'.$lang_url.'" '.$lang_select.'>'.$lang_name.'</option>');
$lang_select='';
}
?>
</select>
</form>