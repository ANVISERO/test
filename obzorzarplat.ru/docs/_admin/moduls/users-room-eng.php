<?
if(!isset($_GET['page'])){$page='bay';}
if(isset($_GET['page'])){$page=$_GET['page'];}
?>

<table width="100%" height="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td width="200" height="200" valign="top" style="border-right:1px solid #DBDBDB"><? include($folder.'_admin/moduls/users-room-menu-eng.php');?></td>
    <td height="200" valign="top"><? include($folder.'_admin/moduls/users-room-eng-'.$page.'.php');?></td>
  </tr>
</table>
