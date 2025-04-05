<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
//Корень
$root='Shop';

$cat=$root;

$query="select * from for_category where root='$cat' order by pos";
$result=mysqli_query($link,$query);
$col=mysqli_num_rows($result);
if($col>0)
{
while($row=mysqli_fetch_array($result))
{
$cat_2=$row["name"];
$cat_id_2=$row["id"];

$eh='
  <tr>
    <td height="20" width="20" valign="bottom"><img src="/_img/arr_03.gif" style="border:0"></td>
    <td height="20" valign="bottom"><b>'.$row["name"].'</b></td>
  </tr>
';
echo($eh);
			
//И еще раз
$query2="select * from for_category where root='$cat_2' order by pos";
$result2=mysqli_query($link,$query2);
$col2=mysqli_num_rows($result2);
if($col2>0)
{
while($row2=mysqli_fetch_array($result2))
{
$cat_3=$row2["name"];
$cat_id_3=$row2["id"];
$eh='

<tr>
    <td height="20" width="20" valign="top">&nbsp;</td>
    <td height="20" valign="top" style="border-bottom:solid 1px #171717"><a href="/shop/?id='.$cat_id_3.'" class="category">'.$row2["name"].'</a></td>
  </tr>
';
echo($eh);

}}}}

?>
</table>