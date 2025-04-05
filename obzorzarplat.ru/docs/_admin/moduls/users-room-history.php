<h1 class="title"><img src="/_img/arr_01" width="8" height="7">&nbsp;&nbsp;История платежей и зачислений</h1>
<br>
<table width="560" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="130"><strong>Дата</strong></td>
    <td width="30" align="center"><strong>*</strong></td>
    <td width="110" align="right"><strong>Сумма, руб</strong>&nbsp;&nbsp;</td>
    <td width="290"><strong>Название</strong></td>
  </tr>
<?
$result=mysqli_query($link,"select * from for_schethistory where user='$user_id' order by date desc");
while($row=mysqli_fetch_array($result))
{
if($row["pm"]=='-'){$p_m='/_admin/_adminfiles/ico_minus.gif'; $p_m_alt='Расход'; $color='cc0000';}
if($row["pm"]=='+'){$p_m='/_admin/_adminfiles/ico_plus.gif'; $p_m_alt='Приход'; $color='44A600';}
echo('
  <tr>
    <td style="border-top:1px solid #ddd">'.$row["date"].'</td>
    <td style="border-top:1px solid #ddd" align="center"><img src="'.$p_m.'" alt="'.$p_m_alt.'" width="16" height="16"></td>
    <td style="border-top:1px solid #ddd; color:#'.$color.'" align="right">'.sprintf("%.2f",$row["sum"]).' руб.&nbsp;&nbsp;</td>
    <td style="border-top:1px solid #ddd">'.$row["name"].'</td>
  </tr>
');
}
?>
</table>