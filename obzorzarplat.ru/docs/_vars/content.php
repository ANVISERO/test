<?php include($folder.'_admin/classes/TextHelper.php'); ?>
<div style="text-align: center; height: 25px; vertical-align: middle;"><a href="/scoring-online" style="font-size: 16px; text-transform:uppercase;">Кредитный скоринг онлайн</a></div>
<div class="anythingSlider">
          <div class="wrapper1">
<ul>
<li>
<h2>Средняя заработная плата в России в 2017 году</h2>
<div id="personal-report">
    <p align="center"><a class="h3_title" href="/services/otchet/">Персональный отчет</a></p>
    <div class="attention-image"><img src="/_img/main/examples64.png"></div>
    <div>
        <p>Закажите Персональный отчет, чтобы получить более детальную информацию по Вашей должности.</p>
        <p align="right"><a href="/services/otchet/">отчет &raquo;</a></p>
    </div>
</div>
    <div id="salary-on-main">
    <?php include($folder.'../cgi/moduls/services/zp/salary-form.php');?>
</div><!--end salary_on_main-->

</li>
<li>
   <h2>Решения и тарифы</h2>
    <p>Команда портала obzorzarplat.ru</b> проводит регулярное общеотраслевое исследование.
    Результаты исследования могут быть получены Вами при подключении к базе данных портала
    в любое время суток по интересующим Вас должностям.</p>
    <ul class="inline-4">
        <li><img alt="2150 должности" src="/_img/main/briefcase_64.png" /><br>2150</b> должности<br>49</b> должностных групп</li>
        <li><img alt="135 города России" src="/_img/main/globe_64.png" /><br>Все</b> города/регионы России</li>
        <li><img alt="24 часа" src="/_img/main/clock_64.png" /><br>он-лайн доступ 24</b> часа в сутки</li>
        <li><img alt="Аналитика" src="/_img/main/statistics_64.png" /><br>развернутая аналитика</li>
    </ul>
 <div style="position: relative;top: 10%; left: 0%;"><p align="right"><a href="/preds/tariffs/">Тарифы &raquo;</a></p></div>
</li>
<li id="services">
    <h2>Сервисы</h2>
<p>Команда портала obzorzarplat.ru предлагает Вашему вниманию разнообразные сервисы,
    касающиеся заработной платы, рачета будущей пенсии, государственных гарантий, льгот и некоторые другие.</p>

<ul class="inline-2">
         <li>
                 <dl>
            <dt>О зарплате</dt>
            <dd><a href="/services/otchet/">Персональный отчет о заработной плате</a></dd>
            <dd><a href="/services/zp/">Экспресс отчет о заработной плате</a></dd>
            <dd><a href="/services/job_description/">Должностные инструкции</a></dd>
            <dd><a href="/services/pension/">Расчет будущей пенсии</a></dd>
            <dd><a href="/work/">Поиск работы</a></dd>
                </dl>
             </li>
             <li>
                 <dl>
             <dt>Государственные льготы</dt>
            <dd><a href="/services/lgot/">Государственные пособия</a></dd>
            <dd><a href="/services/gosgarant/">Государственные гарантии и компенсации</a></dd>
            <dd><a href="/services/nalog/">Льготы по НДФЛ</a></dd>
                </dl>
                <dl>
             <dt>Развлечения</dt>
            <dd><a href="/services/million/">Когда вы станете миллионером?</a></dd>
            <dd><a href="/services/bigmak/">Сколько Биг-Маков я уже заработал?</a></dd>
            <dd><a href="/services/speed/">С какой скоростью я зарабатываю?</a></dd>
                </dl>
         </li>
         </ul>
	<div style="position: relative;top: 10%; left: 0%;"><p align="right"><a href="/services/">Все сервисы &raquo;</a></p></div>
</li>
<li>
    <h2>Кредитный скоринг онлайн</h2>
    <p>Компания ООО «АНТ-Менеджмент» в рамках проекта ОбзорЗарплат.ру осуществляет кредитный банковский скоринг, основанный на данных по реальным заработным платам в городах и регионах России, в режиме онлайн.</p><br/>
    <p>Скоринговая система, созданная на базе данных проекта ОбзорЗарплат.ру – это легкий и быстрый способ оценить риски, связанные с кредитованием. Скоринговая система от ОбзорЗарплат.ру основана на реальных данных по заработным платам, полученным из фактических платежных ведомостей, предоставляемых компаниями-партнерами. Статистическая база данных представляет собой информационный массив, собираемый на протяжении 18 лет. Данные более, чем по 50, городам и регионам России регулярно обновляются и актуализируются на фоне изменения ситуации на рынке труда.</p>
     <div style="position: relative;top: 10%; left: 0%;"><p align="right"><a href="/scoring-online/">Подробнее &raquo;</a></p></div>
</li>
</ul>

    </div><!--end wrapper1-->
</div>
<div id="newsletter">
    <div id="news-menu"><a href="/news/">Все новости</a> <a href="/news/rss/"><img src="/_img/main/rss_32.png"></a></div>
<ul id="news1">
<?php
$limit=5; //количество новостей на странице
$query_quick="select id, zag, date from for_news where status='1' and lang='0' order by date desc, id desc limit $limit";
$result = mysqli_query($link, $query_quick);
while($news=mysqli_fetch_object($result)){
    list($year,$monthId,$day) = preg_split("/[\-\/\,\.]+/", $news->date);
    $zag=new TextHelper($news->zag);
    echo('<li>'.$day.'.'.$monthId.'.'.$year.' <a href="/news/view/?id='.$news->id.'">'.$zag->clean_text(8).'</a></li>');
}
?>
</ul>
</div>
<div class="clearfloat"></div>

<ul id="second-line-blocks">
    <li>
        <h3>Корпоративным клиентам</h3>
        <dl>
            <dt>Тарифы</dt>
            <dd><a href="/preds/tarif_standart/">Стандарт</a></dd>
            <dd><a href="/preds/tarif_profi/">Профи</a></dd>
            <dd><a href="/preds/tarif_unlimited/">Лайт Безлимитный</a></dd>
            <dd><a href="/preds/tarif_lite/">Лайт</a></dd>
            <!--<dd>Индивидуальный</dd>-->
        </dl>
        <dl>
            <dt>Аналитические отчеты</dt>
            <dd><a href="/preds/1job-lite/">Экспресс отчет</a></dd>
            <dd><a href="/preds/summary/">Сводный отчет</a></dd>
            <dd><a href="/preds/1job-profi/">Аналитический отчет</a></dd>
            <dd><a href="/preds/scoring/">Скоринговая система</a></dd>
            <!--<dd>Отчет по премиям и компенсациям</dd>-->
        </dl>
        <p><a href="/preds/tariffs/">Выбрать тариф</a></p>
    </li>
    <li>
        <h3>Обзоры заработных плат</h3>
        <dl>
            <dt>Общеотраслевой обзор</dt>
            <dd><a href="/isl/struktura/">Структура данных</a></dd>
            <dd><a href="/isl/metod/">Методология исследования</a></dd>
            <dd><a href="/isl/membership/">Принять участие в исследовании</a></dd>
        </dl>
        <dl>
            <dt>Отраслевые обзоры</dt>
            <?php include($folder.'_admin/moduls/business/surveys/surveys-list.php'); ?>
        </dl>
        <p><a href="/isl/surveys/?survey_type_id=1">Отраслевые обзоры</a></p>
        <dl>
            <dt>Исследования на заказ</dt>
            <dd><a href="/isl/order/">Условия проведения исследований</a></dd>
        </dl>
        <p><a href="/isl/order/">Заказать исследование</a></p>
    </li>
    <li>
        <h3>Сервисы</h3>
         <dl>
            <dt>О зарплате</dt>
            <dd><a href="/services/otchet/">Персональный отчет о заработной плате</a></dd>
            <dd><a href="/services/zp/">Экспресс отчет о заработной плате</a></dd>
            <dd><a href="/services/job_description/">Должностные инструкции</a></dd>
            <dd><a href="/services/pension/">Расчет будущей пенсии</a></dd>
            <dd><a href="/work/">Поиск работы</a></dd>
                </dl>
                 <dl>
             <dt>Государственные льготы</dt>
            <dd><a href="/services/lgot/">Государственные пособия</a></dd>
            <dd><a href="/services/gosgarant/">Государственные гарантии и компенсации</a></dd>
            <dd><a href="/services/nalog/">Льготы по НДФЛ</a></dd>
                </dl>
                <dl>
             <dt>Развлечения</dt>
            <dd><a href="/services/million/">Когда вы станете миллионером?</a></dd>
            <dd><a href="/services/bigmak/">Сколько Биг-Маков я уже заработал?</a></dd>
            <dd><a href="/services/speed/">С какой скоростью я зарабатываю?</a></dd>
                </dl>
        <p><a href="/services/">Все сервисы</a></p>
    </li>
    <li></li>
    <li>
        <h3>Потребительская корзина в <?=date("Y")?> году</h3>
        <a href="/isl/basestat/">
            <img src="/_img/main/full_shopping_cart256.png" alt="потребительская корзина населения в <?=date("Y")?> году" />
        </a>
        <p><a href="/isl/basestat/">экономические показатели</a></p>
    </li>
</ul><!--/second-line-blocks-->
<div class="clearfloat"></div>

<ul id="third-line-blocks">
    <li id="job-search">
        <h3>Опрос</h3>

        <!-- Put this script tag to the <head> of your page -->
		<!-- 
        <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script>
        <script type="text/javascript">
            VK.init({apiId: 3135077, onlyWidgets: true});
        </script> -->
        <!-- Put this div tag to the place, where the Poll block will be -->
        <!-- <div id="vk_poll"></div>
        <script type="text/javascript">
            VK.Widgets.Poll("vk_poll", {width: "200"}, "52233767_e20e992b01ae42efaf");
        </script>
		-->
			
			<!-- poll pollservice.ru begin -->
				<script type="text/javascript" src="http://pollservice.ru/js/w/4.0/base.js"></script>
				<div class="pollservice-poll" data-key="e26owugvya" style="width: 300px;"></div>
			<!-- poll pollservice.ru end -->
        <?php /*
        <script type="text/javascript">
  VK.init({apiId: 1995478, onlyWidgets: true});
</script>
        <div id="vk_poll"></div>
<script type="text/javascript">
VK.Widgets.Poll("vk_poll", {width: "200"}, "8361694_b5c8a79fa068ef962f");
</script>
 */ ?>
        <!--
<form action="http://www.jobrapido.ru/" name="f" method="post" onsubmit="return form_jobrapido_submit();" target="_blank">
<table>
    <tr><th><img src="http://www.jobrapido.net/images/logowhite.gif" width="73" height="20" alt="Вакансии"/></th></tr>
    <tr><td>
            <input class="input-text" size="15" type="text" name="w" value="Должность, навыки, компания"
                   onfocus="if(this.value=='Должность, навыки, компания'){this.value=''};"
                   onblur="if(this.value==''){this.value='Должность, навыки, компания'};">
        </td></tr>
    <tr><td>
            <input class="input-text" size="15" type="text" name="l" value="Город, регион, округ"
                   onfocus="if(this.value=='Город, регион, округ'){this.value=''};"
                   onblur="if(this.value==''){this.value='Город, регион, округ'};">
        </td></tr>
    <tr><td><input class="submit" type="button" onclick="window.open('http://www.jobrapido.ru/?w='+encodeURIComponent(document.f.w.value)+'&l='+encodeURIComponent(document.f.l.value),'jobrapidowindow');"  value="Найти работу"></td></tr>
    <tr><td><span style="font-size:11px; font-weight:bold;">
			<a href="http://www.jobrapido.ru/" style="color:#3E7FC2; text-decoration: none;">Вакансии</a>
	<br><span style="color:gray">powered by Jobrapido</span>
		</span></td></tr>
</table>
</form>
-->
</li><!--/job-search-->
<li id="clients">
    <h3>Клиенты</h3>
    <ul id="mycarousel" class="jcarousel-skin-tango">
<?php
$client_q=mysqli_query($link,"select logo,title from for_clients limit 20,40");

while($client=mysqli_fetch_array($client_q)){ ?>
    <li><a href="/clients/"><img src="/_img/clients/<?php echo($client["logo"]);?>" alt="<?php $client["title"] ?>" width="91" height="auto" /></a></li>
<?php } ?>
  </ul>
<p align="right"><a href="/clients/">все клиенты</a></p>

</li><!--/clients-->
<li id="comments">
    <div id="comments-body">
        <?php include($folder.'_admin/moduls/users/comment-on-main.php'); ?>
    </div>
    <p align="right"><a href="/comments/">Все отзывы о сайте</a></p>
</li>
</ul><!--/third-line-blocks-->

<h3>Сколько зарабатывают и тратят в странах мира (в долларах США)</h3>
<table style="display: table; border-collapse: collapse; border-spacing: 2px; border-color: gray;" class="sal">
		<TR>
			<TD></TD>
			<TD>Ежемесячная средняя ЗП (после уплаты налогов)</TD>
			<TD>Местное пиво (0,5 л)</TD>
			<TD>Транспорт (проездной на месяц)</TD>
			<TD>Брендовые джинсы</TD>
			<TD>Аренда 3-комнатной квартиры в центре города (в месяц)</TD>
			<TD>Абонемент в фитнес-зал (1 месяц)</TD>
			<TD>Билет в кино</TD>
			<TD>Обед в ресторане быстрого питания</TD>
		</TR>
		<TR>
			<TD>БРАЗИЛИЯ</TD>
			<TD>729,65</TD>
			<TD>1,79</TD>
			<TD>55,78</TD>
			<TD>84,79</TD>
			<TD>446,27</TD>
			<TD>44,63</TD>
			<TD>8,03</TD>
			<TD>7,54</TD>
		</TR>
		<TR>
			<TD>КАНАДА</TD>
			<TD>2892,12</TD>
			<TD>4,82</TD>
			<TD>81,61</TD>
			<TD>53,02</TD>
			<TD>964,04</TD>
			<TD>48,20</TD>
			<TD>11,57</TD>
			<TD>7,71</TD>
		</TR>
		<TR>
			<TD>ЧИЛИ</TD>
			<TD>1000,00</TD>
			<TD>1,63</TD>
			<TD>43,40</TD>
			<TD>68,26</TD>
			<TD>427,03</TD>
			<TD>58,51</TD>
			<TD>7,80</TD>
			<TD>6,34</TD>
		</TR>
		<TR>
			<TD>КИТАЙ</TD>
			<TD>652,20</TD>
			<TD>1,30</TD>
			<TD>18,50</TD>
			<TD>113,97</TD>
			<TD>570,67</TD>
			<TD>40,76</TD>
			<TD>13,04</TD>
			<TD>4,89</TD>
		</TR>
		<TR>
			<TD>КОЛУМБИЯ</TD>
			<TD>406,77</TD>
			<TD>1,29</TD>
			<TD>45,13</TD>
			<TD>80,00</TD>
			<TD>258,46</TD>
			<TD>40,00</TD>
			<TD>5,17</TD>
			<TD>7,00</TD>
		</TR>
		<TR>
			<TD>ЧЕХИЯ</TD>
			<TD>1024,03</TD>
			<TD>1,38</TD>
			<TD>27,72</TD>
			<TD>102,40</TD>
			<TD>512,02</TD>
			<TD>40,96</TD>
			<TD>7,68</TD>
			<TD>6,14</TD>
		</TR>
		<TR>
			<TD>ЭКВАДОР</TD>
			<TD>300,00</TD>
			<TD>1,00</TD>
			<TD>15,00</TD>
			<TD>60,00</TD>
			<TD>400,00</TD>
			<TD>35,00</TD>
			<TD>4,50</TD>
			<TD>5,00</TD>
		</TR>
		<TR>
			<TD>ФИНЛЯНДИЯ</TD>
			<TD>2778,88</TD>
			<TD>6,62</TD>
			<TD>60,74</TD>
			<TD>112,48</TD>
			<TD>926,29</TD>
			<TD>79,40</TD>
			<TD>15,22</TD>
			<TD>9,26</TD>
		</TR>
		<TR>
			<TD>ФРАНЦИЯ</TD>
			<TD>2646,55</TD>
			<TD>6,62</TD>
			<TD>63,52</TD>
			<TD>115,13</TD>
			<TD>860,13</TD>
			<TD>66,16</TD>
			<TD>12,57</TD>
			<TD>9,26</TD>
		</TR>
		<TR>
			<TD>ГРЕЦИЯ</TD>
			<TD>992,46</TD>
			<TD>5,29</TD>
			<TD>52,93</TD>
			<TD>119,09</TD>
			<TD>396,98</TD>
			<TD>52,93</TD>
			<TD>10,59</TD>
			<TD>7,94</TD>
		</TR>
		<TR>
			<TD>ГВАТЕМАЛА</TD>
			<TD>562,50</TD>
			<TD>2,00</TD>
			<TD>17,50</TD>
			<TD>44,76</TD>
			<TD>334,86</TD>
			<TD>42,38</TD>
			<TD>4,86</TD>
			<TD>5,00</TD>
		</TR>
		<TR>
			<TD>НИДЕРЛАНДЫ</TD>
			<TD>2646,55</TD>
			<TD>5,29</TD>
			<TD>92,63</TD>
			<TD>119,09</TD>
			<TD>1058,62</TD>
			<TD>46,31</TD>
			<TD>11,91</TD>
			<TD>8,72</TD>
		</TR>
		<TR>
			<TD>ВЕНГРИЯ</TD>
			<TD>617,75</TD>
			<TD>1,59</TD>
			<TD>44,12</TD>
			<TD>88,25</TD>
			<TD>286,81</TD>
			<TD>44,12</TD>
			<TD>6,62</TD>
			<TD>6,18</TD>
		</TR>
		<TR>
			<TD>ИТАЛИЯ</TD>
			<TD>2117,24</TD>
			<TD>5,29</TD>
			<TD>46,31</TD>
			<TD>119,09</TD>
			<TD>793,97</TD>
			<TD>72,78</TD>
			<TD>10,59</TD>
			<TD>9,26</TD>
		</TR>
		<TR>
			<TD>ЮЖНАЯ КОРЕЯ</TD>
			<TD>1901,08</TD>
			<TD>2,59</TD>
			<TD>35,65</TD>
			<TD>78,21</TD>
			<TD>604,89</TD>
			<TD>51,85</TD>
			<TD>6,91</TD>
			<TD>5,01</TD>
		</TR>
		<TR>
			<TD>МЕКСИКА</TD>
			<TD>750,36</TD>
			<TD>1,50</TD>
			<TD>26,64</TD>
			<TD>48,74</TD>
			<TD>262,62</TD>
			<TD>37,52</TD>
			<TD>4,50</TD>
			<TD>4,88</TD>
		</TR>
		<TR>
			<TD>ПЕРУ</TD>
			<TD>539,96</TD>
			<TD>1,58</TD>
			<TD>25,00</TD>
			<TD>36,00</TD>
			<TD>375,00</TD>
			<TD>50,00</TD>
			<TD>5,40</TD>
			<TD>5,40</TD>
		</TR>
		<TR>
			<TD>ПОРТУГАЛИЯ</TD>
			<TD>1058,62</TD>
			<TD>1,98</TD>
			<TD>46,31</TD>
			<TD>105,86</TD>
			<TD>529,31</TD>
			<TD>62,19</TD>
			<TD>7,94</TD>
			<TD>7,28</TD>
		</TR>
		<TR>
			<TD>ПУЭРТО-РИКО</TD>
			<TD>1920,00</TD>
			<TD>1,50</TD>
			<TD>35,00</TD>
			<TD>40,00</TD>
			<TD>600,00</TD>
			<TD>35,00</TD>
			<TD>6,75</TD>
			<TD>6,50</TD>
		</TR>
		<TR>
			<TD>РОССИЯ*</TD>
			<TD>700,12</TD>
			<TD>1,52</TD>
			<TD>68,00</TD>
			<TD>106,54</TD>
			<TD>744,40</TD>
			<TD>60,88</TD>
			<TD>9,13</TD>
			<TD>7,61</TD>
		</TR>
		<TR>
			<TD>ШВЕЦИЯ</TD>
			<TD>3053,48</TD>
			<TD>7,63</TD>
			<TD>106,11</TD>
			<TD>135,88</TD>
			<TD>916,04</TD>
			<TD>45,80</TD>
			<TD>16,79</TD>
			<TD>9,92</TD>
		</TR>
		<TR>
			<TD>США</TD>
			<TD>3200,00</TD>
			<TD>3,00</TD>
			<TD>68,00</TD>
			<TD>40,00</TD>
			<TD>900,00</TD>
			<TD>40,00</TD>
			<TD>10,00</TD>
			<TD>6,00</TD>
		</TR>
		<TR>
			<TD>АНГЛИЯ</TD>
			<TD>2557,74</TD>
			<TD>4,65</TD>
			<TD>86,81</TD>
			<TD>77,51</TD>
			<TD>1007,60</TD>
			<TD>62,01</TD>
			<TD>12,40</TD>
			<TD>7,75</TD>
		</TR>
			
</TABLE><br>
* Санкт-Петербург<br>
Источник: Газета Metro 28.10.13 Статья &quot;Что почем&quot;

<div style="clear:both;"></div>