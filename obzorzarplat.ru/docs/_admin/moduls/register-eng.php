<?
if(!isset($_GET['step']) or ($_GET['step']==0))
{include($folder.'_admin/moduls/register-form-eng.php');}

if(isset($_GET['step']))
{
	if($_GET['step']==1)
	{
	include($folder.'_admin/moduls/register-start-eng.php');
	}

}
?>
