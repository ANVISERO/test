<?php
# SDPays 2008
# Скрипт для ответа на запрос Биллинга

# Вывод ошибок нежелателен
ini_set('display_errors', 0);
error_reporting(0);

# Задаем ключ (идентификатор) проекта, который указан в разделе 'Список проектов' в вашем аккаунте
$project_md5 = "dc148b4e62ecc6453545df6234a031df";

# Проверяем наличие данных
if (!isset($_POST['_md5_hash']) || !isset($_POST['_session_code']) || !isset($_POST['_sms_id']) || !isset($_POST['_sms_number']) || !isset($_POST['_sms_operator']) || !isset($_POST['_sms_phone']) || !isset($_POST['_sms_message']) || !isset($_POST['_sms_price'])) return_result("err void", true);

if (!$_POST['_md5_hash'] || !$_POST['_session_code'] || !$_POST['_sms_id'] || !$_POST['_sms_number'] || !$_POST['_sms_operator'] || !$_POST['_sms_phone']) return_result("err false", true);

# Проверяем целостность данных
$_md5hash = md5($project_md5.$_POST['_session_code'].$_POST['_sms_id'].$_POST['_sms_number'].$_POST['_sms_operator'].$_POST['_sms_phone'].stripslashes($_POST['_sms_message']).$_POST['_sms_price']);
if ($_md5hash != $_POST['_md5_hash']) return_result("err hash", true);

if ($_md5hash == $_POST['_md5_hash'])
	{
		function genpass($min, $max)
			{
				$pwd="";
				for($i=0;$i<rand($min,$max);$i++)
					{
						$numt[1]=rand(48,57);
						$numt[2]=rand(65,90);
						$numt[3]=rand(97,122);
						$nums=rand(1,3);
						$num=$numt[$nums];
						
						$pwd.=chr($num);
					}
				return $pwd;
			}
		
		$user_code=genpass(8,8);
		
		
		$folder="../../../_admin/";

		$host=implode("", file($folder.'settings/mysql_host'));
		$db=implode("", file($folder.'settings/mysql_db'));
		$user=implode("", file($folder.'settings/mysql_user'));
		$pass=implode("", file($folder.'settings/mysql_pass'));
		
		$link = mysqli_connect($host,$user,$pass);
		mysqli_select_db($link,$db);
		
		$date = $_POST['_sms_date'];
		$msg = $_POST['_sms_message']; 
		
		$message_text = rawurldecode($_POST['_sms_plain']); // Убрать URL-кодирование
		$message_text = base64_decode($message_text); // Перевести данные из MIME base64
		$message_text = iconv("utf-8", "cp1251", $message_text); // Поменять кодировку с utf-8 на cp1251
		$message_text = stripslashes($message_text); // Удалить возможные слэш символы
		$msg_trans = $message_text;
		
		
		$operator_id = $_POST['_sms_operator'];
		$user_id = $_POST['_sms_phone'];
		$smsid = $_POST['_sms_id'];
		$cost_rur = $_POST['_sms_price'];
		$cost = $_POST['_sms_exchrate'];
		$num = $_POST['_sms_number'];
		$skey = $_POST['_md5_hash'];
		$sign = $_POST['_session_code'];
		$ran = $_POST['_sms_trusted'];
		
		$query = "insert into inbox VALUES('','$date','$msg','$msg_trans','$operator_id','$user_id', '$smsid','$cost_rur','$cost','','$num', '$skey','$sign','$ran','','0','$user_code')";
		$result = mysqli_query($link,$query );
		
		if($result) return_result("Usluga express otchet portala http://obzorzarplat.ru/ oplachena.\nVash kod: " . $user_code);
		else return_result($query, true);;
	}


function return_result($message, $is_error = false) {
	if ($is_error) exit("<SMSDERR>".stripslashes($message)."</SMSDERR>");
	exit("<SDSUCCESS>".stripslashes($message)."</SDSUCCESS>");
}
?>