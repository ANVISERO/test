<?php
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');
include($folder.'../cgi/pages/companies-red/company_people_show.php');

$id=intval($_POST['company_id']);
?>
<div id="spheresChkb">
<?php
//сферы деятельности компании
$company_sphere_q=mysqli_query($link,"select sphere_id from base_company_sphere where company_id='$id'");
while($row=mysqli_fetch_array($company_sphere_q)){
    $company_sphere[]=$row["sphere_id"];
}

$result3=mysqli_query($link,"select id, name from base_sphere order by name");
$ch="";
while($row3=mysqli_fetch_array($result3)){
    if(in_array($row3['id'],$company_sphere)){$ch="checked";}
    else{$ch="";}
    echo('<input name="spheres[]" type="checkbox" value="'.$row3['id'].'" id="spheres_'.$row3["id"].'" '.$ch.'> <label for="spheres_'.$row3["id"].'">'.$row3['name'].'</label><br>');
}
?>
</div>
    <p class="right_links"><a href="" id="addSphere">Добавить сферу</a></p>
    <div class="hiddenInfo" id="newSphere">
            <form id="newSphereForm" name="newSphereFormName" action="">
                <p><input type="text" name="sphereName" class="text" title="Сфера" value=""></p>
                <p class="right_links"><input type="button" id="newSphereSubmit" value="Создать" class="submit"></p>
            </form>
    </div>