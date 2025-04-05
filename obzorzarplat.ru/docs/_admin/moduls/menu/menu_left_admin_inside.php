<script type="text/javascript">
/* ================================================================
This copyright notice must be untouched at all times.
Copyright (c) 2008 Stu Nicholls - stunicholls.com - all rights reserved.
=================================================================== */

$(document).ready(function() {
$("li.p1:has(ul)").children().slideUp(100);

$("li.p1:has(ul)").click(function(event){
if (this == event.target) {
$("ul:first", $(this)).slideToggle(400);
}
});
});
</script>
    <div id="nav">
        <ul>
        <li class="p1 down">База данных
         <ul>
            <li><a href="?page=people">Анкеты</a></li>
            <li><a href="?page=jobs">Должности</a></li>
            <li><a href="?page=otrasli-type">Типы отраслей</a></li>
            <li><a href="?page=otrasli">Отрасли</a></li>
            <li><a href="?page=sfera-type">Типы сфер деятельности</a></li>
            <li><a href="?page=sfera">Сферы деятельности</a></li>
            <li><a href="?page=kapital">Происхождение капитала</a></li>
            <li><a href="?page=razvitie">Стадии развития</a></li>
            <li><a href="?page=regions">Города</a></li>
            <li><a href="?page=companies">Компании</a></li>
            <li><a href="?page=jtype">Функциональные типы должностей</a></li>
            <li><a href="?page=period">Периодичность выплат</a></li>
            <li><a href="?page=payment">Методы выплат</a></li>
            <li><a href="?page=otchet">Отчеты - тарифы</a></li>
            <li><a href="?page=users">Пользователи</a></li>
            <li><a href="?page=terms">Словарь терминов</a></li>
            <li><a href="?page=catalog">Каталог сайтов</a></li>
         </ul>
         </li>
        <li class="p1 down">Страницы сайта
         <ul>
            <li><a href="?page=folders">Загрузка файлов</a></li>
            <li><a href="?page=temps">Шаблоны страниц</a></li>
            <li><a href="?page=pages">Страницы сайта</a></li>
            <li><a href="?page=structura">Структура выборки</a></li>
            <li><a href="?page=zarplata">Статистика средней заработной платы в Санкт-Петеребурге</a></li>
            <li><a href="?page=salary">Средняя заработная плата по должностям</a></li>
         </ul>
         </li>
         <li class="p1 down">Продажи
         <ul>
            <li><a href="?page=job_cost">Стоимость отчетов (по должностям)</a></li>
            <li><a href="?page=indiv_report_buy">Индивидуальные отчеты</a></li>
            <li><a href="?page=express_report_buy">Экспресс отчеты</a></li>
         </ul>
         </li>
         <li class="p1 down">Новости / статьи / контакты
         <ul>
            <li><a href="?page=news">Новости</a></li>
            <li><a href="?page=articles">Статьи</a></li>
            <li><a href="?page=massmedia">Публикации о нас в прессе</a></li>
            <li><a href="?page=comments">Комментарии о сайте</a></li>
            <li><a href="?page=contacts">Контактные лица</a></li>
         </ul>
         </li>
         <li class="p1 down">Кадровый клуб "Кочубей"
         <ul>
            <li><a href="?page=hrclub">Спикеры "Кочубея"</a></li>
            <li><a href="?page=hrclub-session">Заседания "Кочубея"</a></li>
         </ul>
         </li>
         <li class="p1 down">Статистика
         <ul>
            <li><a href="?page=jobs-review">Просмотры должностей</a></li>
            <!--<li><a href="?page=statistics-all">Общая статистика БД</a></li>-->
            <li><a href="?page=statistics-jobs">Статистика БД по должностям</a></li>
            <li><a href="?page=statistics-job-types">Статистика БД по группам должностей</a></li>
            <li><a href="?page=statistics-cities">Статистика БД по городам</a></li>
         </ul>
         </li>
         <li class="p1 down">Клиенты
         <ul>
            <li><a href="?page=users-b2b">Корпоративные клиенты</a></li>
         </ul>
         </li>
         <li class="p1 down">Пользователи
         <ul>
            <li><a href="?page=users-b2b">Другие пользователи</a></li>
         </ul>
         </li>
         <li class="p1 down">Другое
         <ul>
            <li><a href="?page=langs">Языки</a></li>
            <li><a href="?page=settings">Нвстройки</a></li>
            <li><a href="?page=stats">Статистика</a></li>
        </ul>
         </li>
         <li><a href="/_admin/logout/">Выход</a></li>
    </ul>
        </div>