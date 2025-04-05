<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!isset($_GET['str'])){$str='А';}
if(isset($_GET['str'])){$str=$_GET['str'];}
$col_elements=mysqli_result(mysqli_query($link,"select COUNT(*) from base_jobs"),0,0);

$buk = array(
      1 => 'А',
      2 => 'Б',
      3 => 'В',
			4 => 'Г',
			5 => 'Д',
			6 => 'Е',
			7 => 'Ё',
			8 => 'Ж',
			9 => 'З',
			10 => 'И',
			11 => 'Й',
			12 => 'К',
			13 => 'Л',
			14 => 'М',
			15 => 'Н',
			16 => 'О',
			17 => 'П',
			18 => 'Р',
			19 => 'С',
			20 => 'Т',
			21 => 'У',
			22 => 'Ф',
			23 => 'Х',
			24 => 'Ц',
			25 => 'Ч',
			26 => 'Ш',
			27 => 'Щ',
			28 => 'Э',
			29 => 'Ю',
			30 => 'Я'
			);
$buk_eng= array(
				1 => 'A',
				2 => 'B',
				3 => 'C',
				4 => 'D',
				5 => 'E',
				6 => 'F',
				7 => 'G',
				8 => 'H',
				9 => 'I',
				10 => 'J',
				11 => 'K',
				12 => 'L',
				13 => 'M',
				14 => 'N',
				15 => 'O',
				16 => 'P',
				17 => 'Q',
				18 => 'R',
				19 => 'S',
				20 => 'T',
				21 => 'U',
				22 => 'V',
				23 => 'W',
				24 => 'X',
				25 => 'Y',
				26 => 'Z',
				);
			
echo('<hr><center>рус:');
for($jj=1; $jj<=count($buk); $jj++)
{
	if($buk[$jj]==$str)
	{echo('[<font color="#f00"><b>'.$buk[$jj].'</b></font>]');}
	if($buk[$jj]<>$str)
	{echo('[<a href="?str='.$buk[$jj].'">'.$buk[$jj].'</a>]');}
if($str<>'0-9'){$select="select * from base_jobs where name LIKE '$str%' order by name";}
}
echo('<br><br>eng:');
for($jj=1; $jj<=count($buk_eng); $jj++)
{
	if($buk_eng[$jj]==$str)
	{echo('[<font color="#cc0000"><b>'.$buk_eng[$jj].'</b></font>]');}
	if($buk_eng[$jj]<>$str)
	{echo('[<a href="?str='.$buk_eng[$jj].'" class="link_3">'.$buk_eng[$jj].'</a>]');}

}
echo('</center><hr>');
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td valign="top">

<?php
if(in_array($str,$buk)){
  $select="select * from base_jobs where name LIKE '$str%' order by name";
  $result=mysqli_query($link,$select);
  while($row=mysqli_fetch_array($result))
    {
      echo('
      <p><a class="terms" href="/services/job_description/view/?id='.$row['id'].'&lang=0">'.$row['name'].'</a></p>
      ');
    }
}else{
  $select="select * from base_jobs where name_eng LIKE '$str%' order by name_eng";
  $result=mysqli_query($link,$select);
  while($row=mysqli_fetch_array($result))
    {
      echo('
      <p><a class="terms" href="/services/job_description/view/?id='.$row['id'].'&lang=1">'.$row['name_eng'].'</a></p>
      ');
    }
}

?>
</td>
<td width="200" valign="top" style="border-left:1px dashed #DBDBDB"><? //include($folder.'_admin/moduls/resources1.php'); ?></td>
</tr>
</table>