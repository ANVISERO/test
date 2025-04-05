<?php
class RSS {
    public $folder="../../";

    public function __construct(){
        require_once $this->folder.'_admin/sql/connect.php';
    }

    private function dbConnect()
	{
		DEFINE ('LINK', mysql_connect (DB_HOST, DB_USER, DB_PASSWORD));
	}

    public function GetFeed()
	{
		return $this->getItems();
	}


private function getItems()
	{
		$this->dbConnect();
                mysqli_query($link,"SET character_set_client='cp1251'",LINK);
                mysqli_query($link,"SET character_set_connection='cp1251'",LINK);
                mysqli_query($link,"SET character_set_results='cp1251'",LINK);
                mysqli_query($link,"SET NAMES 'cp1251'",LINK);
                $items = '';
                $items.='<?xml version="1.0" encoding="windows-1251" ?><rss version="2.0">
					<channel>
						<title>Новости с сайта obzorzarplat.ru</title>
						<link>http://obzorzarplat.ru/</link>
                                                <language>ru</language>
						<description>Все о заработных платах и компенсациях</description>';

		$query = "SELECT id,date,zag,lang FROM for_news WHERE lang='0' order by date desc limit 10";
		$result = mysql_query ($query, LINK);
		while($row = mysqli_fetch_array($result))
		{
                    $date=strtotime($row["date"]);
                    //анонс новости
                    if(file_exists($this->folder.'_admin/elements/news/'.$row["id"].'_an.txt')){
                        $anons=implode("", file($this->folder.'_admin/elements/news/'.$row["id"].'_an.txt'));
                    }else{
                        $anons='';

                    }

                    $pubDate=date(DATE_RSS,$date);


                    $items .= '<item>
				<title>'. htmlspecialchars($row["zag"],ENT_QUOTES) .'</title>
				<link>http://obzorzarplat.ru/news/view/?id='.$row["id"]  .'</link>
                                <guid>http://obzorzarplat.ru/news/view/?id='.$row["id"]  .'</guid>
                                <pubDate>'.$pubDate.'</pubDate>
				<description>'. htmlspecialchars(strip_tags($anons),ENT_QUOTES) .'</description></item>';
		}
		$items .= '</channel>
				</rss>';
		return $items;
	}

}
?>
