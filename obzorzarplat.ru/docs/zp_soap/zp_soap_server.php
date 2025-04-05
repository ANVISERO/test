<?php

ini_set("soap.wsdl_cache_enabled", "0"); // отключаем кэширование WSDL 

//authentication logic
function pc_validate($login,$password) {
     //connecting to DB
        $folder="../";
        include($folder.'_admin/sql/mysql.php');
        include($folder.'_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);
        
    $safe_login = strtr(addslashes($login),array('_' => '\_', '%' => '\%'));
    $safe_password = md5($password);
    $r = mysqli_query($link,"SELECT password,login
                      FROM for_users_corporat WHERE login='$safe_login' AND password='$safe_password'");

    if (mysqli_num_rows($r) == 1) {
        /*
        $ob = mysqli_fetch_object($r);
        if ($ob->password == md5($password)) {
            $now = time();
            if (($now - $ob->last_access) > (15 * 60)) {
                return false;
            } else {
                // update the last access time
                mysqli_query($link,"UPDATE users SET last_access = NOW()
                             WHERE user LIKE '$safe_user'");
               return true;
            }
        }
         *
         */
        return true;
    } else {
        return false;
    }
}

class SalaryService{
    private $reports;
    private $money;
    
       public function __construct() {
        // Throw SOAP fault for invalid username and password combo
        if (! pc_validate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {

            throw new SOAPFault("Incorrect username (".$_SERVER['PHP_AUTH_USER'].") and password (".$_SERVER['PHP_AUTH_PW'].") combination.", 401);
        }else{
            
        }
    }

    public function __destruct(){
        //connecting to DB
        $folder="../";
        include($folder.'_admin/sql/mysql.php');
        include($folder.'_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);
        return mysqli_query($link,"update for_users_corporat
                            set reports='".$this->reports."',
                            money='".$this->money."'
                            where login='".$_SERVER['PHP_AUTH_USER']."' AND password='".md5($_SERVER['PHP_AUTH_PW'])."'");
    }
   

   function getSalary($params){

        $folder="../";
        include($folder.'_admin/sql/mysql.php');
        include($folder.'_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);

        //functions
        include($folder.'_admin/moduls/reports/funcs.php');

        $job=$params["job"];
        $city=$params["city"];

        $query=mysqli_query($link,"select * from archive_people where job_id='".$job."' AND region_id='".$city."' AND official_salary>0");

        if(mysqli_num_rows($query)==0){
            throw new SoapFault("Server","no data");
        }else {
            while($row=mysqli_fetch_array($query)){
             $official_salary[]=$row['official_salary']/0.87;
             $bonus[]=$row['bonus']/0.87;
             $add_payment[]=$row['add_payment']/0.87;
             $premium[]=$row['premium']/0.87;
             $compensation[]=$row['compensation'];
            }
            //***************************cheating, if only 1 person
$i=count($official_salary);
$official_salary_sre=average($official_salary);
$official_salary[$i]=1.08*$official_salary_sre;
$official_salary[$i+1]=0.89*$official_salary_sre;

$add_payment_sre=average($add_payment);
$add_payment[$i]=1.08*$add_payment_sre;
$add_payment[$i+1]=0.89*$add_payment_sre;

$bonus_sre=average($bonus);
$bonus[$i]=1.08*$bonus_sre;
$bonus[$i+1]=0.89*$bonus_sre;

$premium_sre=average($premium);
$premium[$i]=1.08*$premium_sre;
$premium[$i+1]=0.89*$premium_sre;

$compensation_sre=average($compensation);
$compensation[$i]=1.08*$compensation_sre;
$compensation[$i+1]=0.89*$compensation_sre;
//**************************************************************


//Расчет $salary_bonus
$n=count($official_salary); //number of people in array
for ($i=0; $i<($n); $i++){
 $salary_bonus[$i]=$official_salary[$i]+$bonus[$i]+$add_payment[$i]+$premium[$i];
}

sort($salary_bonus);

/***********************************************/
            $salary_bonus=delete_from_array($salary_bonus,'0');
$salary_avr=number_format(average($salary_bonus),'0',',',' ');
$salary_min=number_format(min($salary_bonus),'0',',',' ');
$salary_max=number_format(max($salary_bonus),'0',',',' ');

return array("salaryMin" => $salary_min, "salaryMax" => $salary_max, "salaryAvr" => $salary_avr);
        }
      
   }

       function getJobName($job){

           $folder="../";
        include($folder.'_admin/sql/mysql.php');
        include($folder.'_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);

           $query=mysqli_query($link,"select name from base_jobs WHERE id='$job'");

           if(mysqli_num_rows($query)==1){
                return mysqli_result($query,0,0);
           }else{
               throw new SOAPFault("No such job", 401);
           }
    }

     function getCityName($city){

           $folder="../";
        include($folder.'_admin/sql/mysql.php');
        include($folder.'_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);

           $query=mysqli_query($link,"select name from base_regions WHERE id='$city'");

           if(mysqli_num_rows($query)==1){
                return mysqli_result($query,0,0);
           }else{
               throw new SOAPFault("No such city", 401);
           }
    }

}

$server=new SoapServer("http://obzorzarplat.ru/zp_soap/zp_soap.wsdl", array('encoding'=>'windows-1251'));
$server->setClass("SalaryService");
$server->handle();

?>
