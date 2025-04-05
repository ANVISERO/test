<script type="text/javascript" src="/_js/express_report/lists.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="/_js/lib/jquery.bgiframe.js" type="text/javascript"></script>
<!--
<script src="/_js/lib/jquery.tooltip.min.js" type="text/javascript"></script>
<script src="/_js/lib/jquery.dimensions.js" type="text/javascript"></script>
-->

<script src="http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js" type="text/javascript"></script>

<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>
<script src="/_js/jquery.form.js" type="text/javascript"></script>


<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
<link href="/_css/express_report/salary.css" rel="stylesheet" type="text/css" />

<div align="center">
    <form name="zp" id="zp" method="post" action="">
        <table border="0">

            <!--Должностная группа10-->

            <tr>
                <td align="left">
                    <select name="jtype" class="text_1" onChange="getJob(this.value)">
                        <option value="">--- Выберите должностную группу ---</option>
                        <?php
                        $link = mysqli_connect($host,$user,$pass);
                        mysqli_select_db($link,$db);
                        $result=mysqli_query($link,"select * from base_jtype order by name");
                        $ch="";
                        while($row=mysqli_fetch_array($result))
                        {
                            echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
                            $ch="";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <!--Должность-->
            <tr>
                <td align="left">
                    <div id='jobdiv'>
                        <select name='job' class="text_1">
                            <option value="">--- Выберите должность ---</option>
                        </select>
                    </div>
                    <div id="loading_job" style="display:none">
                        <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">
                    <div id="job_descript">
                        <?php
                        /*
                            if(isset($_POST["job"]))
                            {
                                echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">Описание должности</a>');
                            }
                            else
                            {
                         *
                         */
                        echo('<span class="not_link">Описание должности</span>');
                        //  }
                        ?>
                    </div>
                    <div id="loading_job_descript" style="display:none">
                        <span class="not_link">Описание должности</span>
                    </div>
                </td>
            </tr>

            <!--Город-->
            <tr>
                <td align="left">
                    <div id='citydiv'>
                        <select name='city' class="text_1">
                            <option value="">--- Выберите город ---</option>
                        </select>
                        <p align="center"><input type="submit" value="Зарплата &raquo;" class="submit" ></p>
                    </div>
                    <div id="loading_city" style="display:none">
                        <img src="/_img/loader.gif" width="16" height="16" align="absmiddle" alt="Загрузка">&nbsp;Загрузка...
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <p><i><font style="color:#000; font-size:12px;">* Вы можете посмотреть информацию по своей должности 1 раз в течение одного календарного месяца.</font></i></p>

    <div id="zpResult"></div>
</div><!--end center-->

<script type="text/javascript">
// готовим объект
var options_social = {
  target: "#zpResult",
  url: "/_admin/moduls/express_report/express-step2.php",
  success: function() {
    //alert("OK");
       $('#zpResult').dialog('open');
  },
  error:function(){
      alert('oops!');
  }
};

// передаем опции в  ajaxSubmit
$("#zp").ajaxForm(options_social);

 $('#zpResult').dialog({
		autoOpen: false,
                modal:true,
		width: 700,
                buttons: {
                        "Закрыть": function() {
				$(this).dialog("close");
			}
                }
	});

</script>