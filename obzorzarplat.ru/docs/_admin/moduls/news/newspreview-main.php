<div class="news">
        <div class="boxbody">
<ul id="all_news">
<?php
class MyHelper {
    var $text = '';


    function MyHelper($text){
        $this->text = $text;
    }

    function getimg_from_tag(){
        $matches=array();
        $regex = '#<img[^>]*src=(["\'])([^"\']*)\1[^>]*>#is';
         if(preg_match($regex, $this->text, $matches)){
             $img =  $matches[0];
             return $img;
         }
         else{
            return '<img src="images/noimage.jpg" />';
         }

    }

    function clean_text($words){
        $this->text = preg_replace('#<.*?>#is', '' , $this->text);
        $this->text = preg_replace('/{([a-zA-Z0-9\-_]*)\s*(.*?)}/i', '', $this->text);
        $this->text = implode(" ", array_slice(preg_split("/\s+/", $this->text), 0, $words)).'...';
        return $this->text;
    }
}

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
$limit=5; //количество новостей на странице

$query_quick="select * from for_news where status='1' and lang='0' order by date desc, id desc limit $limit";
$result_quick = mysqli_query($link, $query_quick);
$schet=0;
while($row=mysqli_fetch_array($result_quick))
{
$id=$row["id"];
$filefolder=$folder.'_admin/elements/news/';
$anons=implode("", file($filefolder.$id.'_an.txt'));
$helper=new MyHelper($anons);
$text=$helper->clean_text(20);
$date=$row["date"];
list($year,$monthId,$day)=implode('[-,/,.]',$row["date"]);
echo('<li>
'.$day.'.'.$monthId.'.'.$year.' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a class="link1" href="/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
<a href="/news/view/?id='.$row["id"].'" class="link2">'.$text.'</a>
<p align="right"><a href="/news/view/?id='.$row["id"].'" class="link3">ѕодробнее &#187;</a></p>
</li>
');
$schet++;
}
?>
    </ul>
        </div>
</div>

<script type="text/javascript">
    $('.news ul#all_news').newsScroll({
        speed: 2000,
        delay: 5000
    });
</script>
