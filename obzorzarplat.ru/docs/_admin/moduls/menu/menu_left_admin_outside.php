<script type="text/javascript">
    $(document).ready(function(){
    //toggle message body
    $(".down").click(function()
    {
        $(this).next(".business_body").slideToggle(500)
        return false;
    });

});
</script>
<link rel="stylesheet" href="/_css/menu/menu_left_business.css" type="text/css">
<div class="menu_left_business">
        <ul id="nav_business">
            <li><a href="/preds/" class="lk1">О системе&raquo;</a></li>
            <li><a href="/clients/" class="lk1">Клиенты &raquo;</a></br>
                <?php include($folder.'_admin/moduls/clients-random.php');?></li>
            <li><a href="/comments/" class="lk1">Отзывы &raquo;</a></li>
         <li class="p1 down">Тарифы &#187;</li>
             <div class="business_body">
         <ul>
            <li><a href="/preds/tarif_standart/">Тариф &laquo;Стандарт&raquo;</a></li>
            <li><a href="/preds/tarif_profi/">Тариф &laquo;Профи&raquo;</a></li>
            <li><a href="/preds/tarif_unlimited/">Тариф &laquo;Лайт Безлимитный&raquo;</a></li>
            <li><a href="/preds/tarif_lite/">Тариф &laquo;Лайт&raquo;</a></li>
         </ul>
                 </div>
         
         <li><a href="/preds/accessing/" class="lk1">Подключение &raquo;</a></li>
         <li><a href="/preds/agreements/" class="lk1">Договоры &raquo;</a></li>
         <li class="p1 down">Продукт (примеры отчетов) &raquo;</li>
         <div class="business_body">
         <ul>
            <li><a href="/preds/1job-profi/">Аналитический обзор заработных плат</a></li>
            <li><a href="/preds/1job-lite/">Упрощенный аналитический обзор заработных плат</a></li>
            <li><a href="/preds/summary/">Сводный аналитический отчет</a></li>
         </ul>
         </div>
         <li><a href="/business/login/" class="lk1">Вход для партнеров &raquo;</a></li>
         <li><a href="/preds/demo/" class="lk1">Демо-доступ &raquo;</a></li>
         <li><a href="/preds/discount/" class="lk1">Скидки, специальные предложения &raquo;</a></li>
    </ul>
</div>