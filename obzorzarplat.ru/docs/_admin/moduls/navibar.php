<?php
$url=$_SERVER['PHP_SELF'];
$url_abs=implode("", file('_vars/folder.txt'));
$col=substr_count($url_abs,"/");
echo('/<a href="/">www.obzorzarplat.ru</a>&nbsp;');

$tec_folder="";
$tec_title[0]=implode("", file('_vars/zag.txt'));

for($jj=1; $jj<=$col; $jj++)
{
    if ((is_file($tec_folder.'_vars/zag.txt')))
        $tec_title[$jj]= implode("", file($tec_folder.'_vars/zag.txt'));

    $tec_folder.='../';
}
$tec_url='';
for($mm=$col; $mm>=2; $mm--)
{
 for($gg=1; $gg<=($mm-1); $gg++){$tec_url.='../';}
    if (isset($tec_title[$mm]))
        echo('/ <a href="'.$tec_url.'">'.$tec_title[$mm].'</a>');
$tec_url='';
}
echo(' / <b>');
if(isset($tit)){echo $title_raz;}
elseif(isset($tec_title[1])){echo($tec_title[1]);}
else{echo($tec_title[0]);}
echo('</b>');
?>