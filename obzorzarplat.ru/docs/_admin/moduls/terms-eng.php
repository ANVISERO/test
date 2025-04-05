<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!isset($_GET['str'])){$str='0-9';}
if(isset($_GET['str'])){$str=$_GET['str'];}
$col_elements=mysqli_result(mysqli_query($link,"select COUNT(*) from for_terms"),0,0);

if($str=='0-9'){$select="select * from for_terms where 
			name LIKE '0%' OR 
			name LIKE '1%' OR 
			name LIKE '2%' OR 
			name LIKE '3%' OR 
			name LIKE '4%' OR 
			name LIKE '5%' OR 
			name LIKE '6%' OR 
			name LIKE '7%' OR 
			name LIKE '8%' OR 
			name LIKE '9%' order by name_eng";}
if($str<>'0-9'){$select="select * from for_terms where name_eng LIKE '$str%' order by name_eng";}
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
                                27 => '0-9'
				);
//echo('Terms: <b>'.$col_elements.'</b>, Page <b>'.$str.'</b>');				
echo('<br><br>eng:');
for($jj=1; $jj<=count($buk_eng); $jj++)
{
	if($buk_eng[$jj]==$str)
	{echo('[<b>'.$buk_eng[$jj].'</b>]');}
	if($buk_eng[$jj]<>$str)
	{echo('[<a href="?str='.$buk_eng[$jj].'">'.$buk_eng[$jj].'</a>]');}
}
echo('</center><hr>');
$result=mysqli_query($link,$select);
while($row=mysqli_fetch_array($result))
{
echo('
<h3 class="terms">'.$row['name_eng'].'</h3>
<p class="terms">'.$row['value_eng'].'</p>');
}
?>