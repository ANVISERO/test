<a href="?page=companies">��� ��������</a>
<div id="company_data"></div>
<?php
if(isset($_GET['id'])){
    $id=intval($_GET['id']);

    $company_q=mysqli_query($link,"select name,age_id,personal_id,coeff_id,
    turnover,turnover_id,capital_id,evolution_id,region_id,payment_id,period_id,assortment_id,
    freq_id,currency_id,currencyFrequency_id,holidays_id,date
    from base_companies where id='$id'");

while($row=mysqli_fetch_array($company_q)){
    $name=$row["name"];
    $age_id=$row["age_id"];
    $personal_id=$row["personal_id"];
    $coeff_id=$row["coeff_id"];
    $turnover=$row["turnover"];
    $turnover_id=$row["turnover_id"];
    $capital_id=$row["capital_id"];
    $evolution_id=$row["evolution_id"];
    $region_id=$row["region_id"];
    $payment_id=$row["payment_id"];
    $period_id=$row["period_id"];
    $assortment_id=$row["assortment_id"];
    $freq_id=$row["freq_id"];
    $currency_id=$row["currency_id"];
    $currencyFrequency_id=$row["currencyFrequency_id"];
    $holidays_id=$row["holidays_id"];
    $date=$row["date"];

}
}else{
    $company_id_last=mysqli_result(mysqli_query($link,"select max(id) from base_companies"),0,0);
    $id=$company_id_last+1;

    $name="";
    $age_id="";
    $personal_id="";
    $coeff_id="";
    $turnover="";
    $turnover_id="";
    $capital_id="";
    $evolution_id=3;
    $region_id="";
    $payment_id=3;
    $period_id=3;
    $assortment_id="";
    $freq_id=3;
    $currency_id=1;
    $currencyFrequency_id=3;
    $holidays_id=2;
    $date=date('Y-m-d');
}
?>


<h2>����� ������� � ��������</h2>
<form id="add_company" name="add_company" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$id;?>" />
<table class="zebra-table">
    <tr>
        <td width="40%">�������� ��������</td>
        <td width="60%"><input class="text" type="text" name="name" value='<?php echo($name);?>'></td>
    </tr>
    <tr>
        <td>�����/������</td>
        <td><select name="regions" class="text">
            <option value="1" selected>�����-���������</option>
            <option>------------------------</option>
<?php
$result=mysqli_query($link,"select id,name from base_regions order by name");
$ch_3="";
while($row=mysqli_fetch_array($result))
{
if($row["id"]==$region_id){$ch_3="selected";}
echo('<option '.$ch_3.' value="'.$row["id"].'">'.$row["name"].'</option>');
$ch_3="";
}
?>
        </select>
        <p class="right_links"><a href="" id="addRegion">�������� ������</a></p>
        <div class="hiddenInfo" id="newRegion">
            <form id="newRegionForm" name="newRegionFormName" action="">
                <p><input type="text" name="regionName" class="text" title="�����" value=""></p>
                <p><input type="text" name="regionNamePartitive" class="text" title="�������� � �����. ������ (�����-����������)" value=""></p>
                <p><input type="text" name="regionNameEng" class="text" title="�������� �� ����������" value=""></p>
                <p class="right_links"><input type="button" id="newRegionSubmit" value="�������" class="submit"></p>
            </form>
        </div>
        </td>
    </tr>
    <tr>
        <td>������� ��������:</td>
        <td><select class="text" name="age">
<?php
$result=mysqli_query($link,"select id,title from base_ages order by id");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$age_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["title"].'</option>');
    $ch_1="";
}
?>
        </select></td>
    </tr>
    <tr>
        <td>���������� ������� � ��������:</td>
        <td><select class="text" name="personal">
            <option value="0">�� ��������</option>
<?php
$result=mysqli_query($link,"select id,title from base_personal order by id");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$personal_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["title"].'</option>');
    $ch_1="";
}
?>
        </select></td>
    </tr>
    <tr>
        <td>����������� ��������� ������ � �������� (�������������� ���������� �� ���, %):</td>
        <td><select class="text" name="coeff">
            <option value="0">�� ��������</option>
<?php
$result=mysqli_query($link,"select id,title from base_coefficients order by id");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$coeff_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["title"].'</option>');
    $ch_1="";
}
?>
        </select></td>
    </tr>
    <tr>
        <td>����������� �������� (��� �������� � ���������������� ��������, ���������� �������)</td>
        <td>
            <select class="text" name="assortment">
                <option value="">�� ��������</option>
                <?php
                $result=mysqli_query($link,"select id,title from base_assortment order by id");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$turnover_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["title"].'</option>');
    $ch_1="";
}
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>������ �������� �� �������� ��� (���. ���. � ���)</td>
        <td><select class="text" name="turnover_id">
            <option value="0">�� ��������</option>
<?php
$result=mysqli_query($link,"select id,title from base_turnover order by id");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$turnover_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["title"].'</option>');
    $ch_1="";
}
?>
        </select></td>
    </tr>
    <tr>
        <td>������ ���.���/���</td>
        <td><input class="text" type="text" name="turnover" value="<?php echo $turnover;?>"></td>
    </tr>
    <tr>
        <td>�����, ���.���/���:</td>
        <td><input class="text" type="text" name="margin" value=""></td>
    </tr>
    <tr>
        <td>�������, ���.���/���:</td>
        <td><input class="text" type="text" name="overheads" value=""></td>
    </tr>
    <tr>
        <td>������ ������� ������������ �������� ��������</td>
        <td><select name="evolution" class="text">
            <option value="0">�� ��������</option>
<?php
$result=mysqli_query($link,"select id,name from base_evolution order by name");
$ch_2="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$evolution_id){$ch_2="selected";}
    echo('<option '.$ch_2.' value="'.$row["id"].'">'.$row["name"].'</option>');
    $ch_2="";
}
?>
        </select></td>
    </tr>
    <tr>
        <td>������������� ��������:</td>
        <td><select name="capital" class="text">
            <option value="0">�� ��������</option>
<?php
$result=mysqli_query($link,"select id,name from base_capital order by name");
$ch_1="";
while($row=mysqli_fetch_array($result)){
    if($row["id"]==$capital_id){$ch_1="selected";}
    echo('<option '.$ch_1.' value="'.$row["id"].'">'.$row["name"].'</option>');
    $ch_1="";
}
?>	
        </select></td>
    </tr>
    <tr>
        <td>����������� �� ����� ���������� ���������� ���� � �������� � ��������� ����?</td>
        <td>
            <input type="radio" name="salaryIncreasing" value="1" checked>�����������<br>
            <input type="radio" name="salaryIncreasing" value="0">�� �����������<br>
        </td>
    </tr>
    <tr>
        <td><a href="" id="companySphere">C���� ������������ ��������</a></td>
        <td><div id="companySphereDiv"></div></td>
    </tr>
    <tr>
        <td>���� ����������</td>
        <td><input type="text" name="date" value="<?=$date;?>"></td>
    </tr>
</table>

<p align="right"><input type="submit" class="submit" value="���������"></p>

<h2>������� ���������� �����</h2>
    <table class="zebra-table">
        <tr>
            <td width="40%">������� ���������� ���������� ����� / ��������� ������</td>
            <td width="60%"><select name="salaryFrequency" class="text">
                    <?php
                    $result=mysqli_query($link,"select id,title from base_freq order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$freq_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>�������� �������� ������� �������</td>
            <td><select name="currencyPolitics" class="text">
                    <?php
                    $result=mysqli_query($link,"select id,title from base_currency order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$currency_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>������������� ���������� / ����������� ����������� ���������� ��������� �����</td>
            <td><select name="currencyFrequency" class="text">
                    <option value="">--�������--</option>
                    <?php
                    $result=mysqli_query($link,"select id,title from base_freq order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$currencyFrequency_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>����� ������ ������</td>
            <td><select name="salaryPayment" class="text">
                    <option value="">--�������--</option>
                    <?php
                    $result=mysqli_query($link,"select id,name from base_payment order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$payment_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>������������� ������ ������</td>
            <td><select name="salaryPeriod" class="text">
                    <option value="">--�������--</option>
                    <?php
                    $result=mysqli_query($link,"select id,name from base_period order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$period_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>�������� ���������</td>
            <td><select name="holidaysBase" class="text">
                    <option value="">--�������--</option>
                    <?php
                    $result=mysqli_query($link,"select id,name from base_holidays order by id");
                    $ch="";
                    while($row=mysqli_fetch_array($result)){
                        if($row["id"]==$holidays_id){$ch="selected";}
                        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
                        $ch="";
                    }
                    ?>
                </select></td>
        </tr>
    </table>
    <p align="right"><input type="submit" class="submit" value="���������"></p>
</form>


<!--��-->
<h2>���������� �����</h2>
<form name="company-salaries" action="" enctype="multipart/form-data">
    <input type="file" name="slariesCSV" size="chars"><br />
    <input type="submit" value="���������" class="submit">
</form>
<div id="peopleSalaryDiv">
<h3><a class="h3-click" id="peopleSalary">�� - ����������</a></h3>
</div>

<!--�� �����-->
<div id="peopleSalaryArchiveDiv">
<h3><a class="h3-click" id="peopleSalaryArchive">�� - �����</a></h3>
</div>

<div id="editedRowDiv"></div>

<script type="text/javascript" src="/_js/lib/jquery.form.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.metadata.min.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.tableFormSynch.documented.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.bgiframe.js"></script>
<script type="text/javascript" src="/_js/jquery/companies-save.js"></script>