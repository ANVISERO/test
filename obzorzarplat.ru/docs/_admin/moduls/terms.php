<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!isset($_GET['str'])){$str='0-9';}
if(isset($_GET['str'])){$str=$_GET['str'];}
$col_elements=mysqli_result(mysqli_query($link,"select COUNT(*) from for_terms"),0,0);

$buk = array(
1 => '0-9',2 => '�',3 => '�',4 => '�',
			5 => '�',
			6 => '�',
			7 => '�',
			8 => '�',
			9 => '�',
			10 => '�',
			11 => '�',
			12 => '�',
			13 => '�',
			14 => '�',
			15 => '�',
			16 => '�',
			17 => '�',
			18 => '�',
			19 => '�',
			20 => '�',
			21 => '�',
			22 => '�',
			23 => '�',
			24 => '�',
			25 => '�',
			26 => '�',
			27 => '�',
			28 => '�',
			29 => '�',
			30 => '�',
			31 => '�'
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
			
echo('<hr><center>���:');
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