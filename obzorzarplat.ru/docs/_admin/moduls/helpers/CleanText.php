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
?>