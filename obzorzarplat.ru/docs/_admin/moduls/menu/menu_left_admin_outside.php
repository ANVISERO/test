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
            <li><a href="/preds/" class="lk1">� �������&raquo;</a></li>
            <li><a href="/clients/" class="lk1">������� &raquo;</a></br>
                <?php include($folder.'_admin/moduls/clients-random.php');?></li>
            <li><a href="/comments/" class="lk1">������ &raquo;</a></li>
         <li class="p1 down">������ &#187;</li>
             <div class="business_body">
         <ul>
            <li><a href="/preds/tarif_standart/">����� &laquo;��������&raquo;</a></li>
            <li><a href="/preds/tarif_profi/">����� &laquo;�����&raquo;</a></li>
            <li><a href="/preds/tarif_unlimited/">����� &laquo;���� �����������&raquo;</a></li>
            <li><a href="/preds/tarif_lite/">����� &laquo;����&raquo;</a></li>
         </ul>
                 </div>
         
         <li><a href="/preds/accessing/" class="lk1">����������� &raquo;</a></li>
         <li><a href="/preds/agreements/" class="lk1">�������� &raquo;</a></li>
         <li class="p1 down">������� (������� �������) &raquo;</li>
         <div class="business_body">
         <ul>
            <li><a href="/preds/1job-profi/">������������� ����� ���������� ����</a></li>
            <li><a href="/preds/1job-lite/">���������� ������������� ����� ���������� ����</a></li>
            <li><a href="/preds/summary/">������� ������������� �����</a></li>
         </ul>
         </div>
         <li><a href="/business/login/" class="lk1">���� ��� ��������� &raquo;</a></li>
         <li><a href="/preds/demo/" class="lk1">����-������ &raquo;</a></li>
         <li><a href="/preds/discount/" class="lk1">������, ����������� ����������� &raquo;</a></li>
    </ul>
</div>