<script type="text/javascript" src="/_js/jquery/zp1.js"></script>

<script src="http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js" type="text/javascript"></script>
<script src="/_js/jquery.form.js" type="text/javascript"></script>

    <form name="zp" id="zp" method="post" action="">
        <table border="0" align="left">

            <!--Должностная группа-->

            <tr>
                <td align="left">
                    <select name="jtype" id="jtype" class="text_1">
                        <option value="">--- Выберите должностную группу ---</option>
                        <?php $result = mysqli_query($link,"select * from base_jtype order by name");
                        $ch = "";
                        while($row=mysqli_fetch_array($result))
                        {
                            echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
                            $ch = "";
                        } ?>
                    </select>
                </td>
            </tr>

            <!--Должность-->
            <tr>
                <td align="left">
                    <div id='jobdiv'>
                        <select name='job' id="job" class="text_1">
                            <option value="">--- Выберите должность ---</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">
                    <div id="job_descript">
                        <span class="not_link">Описание должности</span>
                    </div>
                </td>
            </tr>

            <!--Город-->
            <tr>
                <td align="left">
                    <div id='citydiv'>
                        <select name='city' id="city" class="text_1">
                            <option value="">--- Выберите город ---</option>
                        </select>
                        <p align="center"><input type="submit" value="Зарплата &raquo;" class="submit" ></p>
                    </div>
                </td>
            </tr>
        </table>

        <div id="zpResult"></div>
    </form>


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display: inline-block;width:250px;height:280px" data-ad-client="ca-pub-6865877396098905"
     data-ad-slot="3916271672">
</ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>


<div style="display: block; float: left;">
    <p><i><font style="color:#000; font-size:12px;">* Вы можете посмотреть информацию по своей должности 1 раз в течение одного календарного месяца.</font></i></p>
</div>
