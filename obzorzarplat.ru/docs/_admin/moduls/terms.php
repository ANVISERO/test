<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!isset($_GET['str'])){$str='0-9';}
if(isset($_GET['str'])){$str=$_GET['str'];}
$col_elements=mysqli_result(mysqli_query($link,"select COUNT(*) from for_terms"),0,0);

$buk = array(
1 => '0-9',2 => 'А',3 => 'Б',4 => 'В',
			5 => 'Г',
			6 => 'Д',
			7 => 'Е',
			8 => 'Ё',
			9 => 'Ж',
			10 => 'З',
			11 => 'И',
			12 => 'Й',
			13 => 'К',
			14 => 'Л',
			15 => 'М',
			16 => 'Н',
			17 => 'О',
			18 => 'П',
			19 => 'Р',
			20 => 'С',
			21 => 'Т',
			22 => 'У',
			23 => 'Ф',
			24 => 'Х',
			25 => 'Ц',
			26 => 'Ч',
			27 => 'Ш',
			28 => 'Щ',
			29 => 'Э',
			30 => 'Ю',
			31 => 'Я'
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
        27=>'9-0'
				);
			
echo('<hr><center>рус:');
for($jj=1; $jj<=count($buk); $jj++)
{
	if($buk[$jj]==$str)
	{echo('[<font color="#cc0000"><b>'.$buk[$jj].'</b></font>]');}
	if($buk[$jj]<>$str)
	{echo('[<a href="?str='.$buk[$jj].'" class="link_3">'.$buk[$jj].'</a>]');}
if($str<>'0-9'){$select="select * from for_terms where name LIKE '$str%' order by name";}
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


if(in_array($str,$buk)){
  $select="select * from for_terms where name LIKE '$str%' order by name";
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
			name LIKE '9%' order by name";}
  $result=mysqli_query($link,$select);
  while($row=mysqli_fetch_array($result))
    {
      echo('
      <h3 class="terms">'.$row['name'].'</h3>
      <p class="terms">'.$row['value'].'</p>
      <hr>
      ');
    }
}else{
  $select="select * from for_terms where name_eng LIKE '$str%' order by name_eng";
    if($str=='9-0'){$select="select * from for_terms where 
			name_eng LIKE '0%' OR 
			name_eng LIKE '1%' OR 
			name_eng LIKE '2%' OR 
			name_eng LIKE '3%' OR 
			name_eng LIKE '4%' OR 
			name_eng LIKE '5%' OR 
			name_eng LIKE '6%' OR 
			name_eng LIKE '7%' OR 
			name_eng LIKE '8%' OR 
			name_eng LIKE '9%' order by name_eng";}
  $result=mysqli_query($link,$select);
  while($row=mysqli_fetch_array($result))
    {
      echo('
      <h3 class="terms">'.$row['name_eng'].'</h3>
      <p class="terms">'.$row['value_eng'].'</p>
      <hr>
      ');
    }
}

?>