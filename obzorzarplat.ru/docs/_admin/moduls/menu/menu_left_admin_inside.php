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
        <li class="p1 down">���� ������
         <ul>
            <li><a href="?page=people">������</a></li>
            <li><a href="?page=jobs">���������</a></li>
            <li><a href="?page=otrasli-type">���� ��������</a></li>
            <li><a href="?page=otrasli">�������</a></li>
            <li><a href="?page=sfera-type">���� ���� ������������</a></li>
            <li><a href="?page=sfera">����� ������������</a></li>
            <li><a href="?page=kapital">������������� ��������</a></li>
            <li><a href="?page=razvitie">������ ��������</a></li>
            <li><a href="?page=regions">������</a></li>
            <li><a href="?page=companies">��������</a></li>
            <li><a href="?page=jtype">�������������� ���� ����������</a></li>
            <li><a href="?page=period">������������� ������</a></li>
            <li><a href="?page=payment">������ ������</a></li>
            <li><a href="?page=otchet">������ - ������</a></li>
            <li><a href="?page=users">������������</a></li>
            <li><a href="?page=terms">������� ��������</a></li>
            <li><a href="?page=catalog">������� ������</a></li>
         </ul>
         </li>
        <li class="p1 down">�������� �����
         <ul>
            <li><a href="?page=folders">�������� ������</a></li>
            <li><a href="?page=temps">������� �������</a></li>
            <li><a href="?page=pages">�������� �����</a></li>
            <li><a href="?page=structura">��������� �������</a></li>
            <li><a href="?page=zarplata">���������� ������� ���������� ����� � �����-�����������</a></li>
            <li><a href="?page=salary">������� ���������� ����� �� ����������</a></li>
         </ul>
         </li>
         <li class="p1 down">�������
         <ul>
            <li><a href="?page=job_cost">��������� ������� (�� ����������)</a></li>
            <li><a href="?page=indiv_report_buy">�������������� ������</a></li>
            <li><a href="?page=express_report_buy">�������� ������</a></li>
         </ul>
         </li>
         <li class="p1 down">������� / ������ / ��������
         <ul>
            <li><a href="?page=news">�������</a></li>
            <li><a href="?page=articles">������</a></li>
            <li><a href="?page=massmedia">���������� � ��� � ������</a></li>
            <li><a href="?page=comments">����������� � �����</a></li>
            <li><a href="?page=contacts">���������� ����</a></li>
         </ul>
         </li>
         <li class="p1 down">�������� ���� "�������"
         <ul>
            <li><a href="?page=hrclub">������� "�������"</a></li>
            <li><a href="?page=hrclub-session">��������� "�������"</a></li>
         </ul>
         </li>
         <li class="p1 down">����������
         <ul>
            <li><a href="?page=jobs-review">��������� ����������</a></li>
            <!--<li><a href="?page=statistics-all">����� ���������� ��</a></li>-->
            <li><a href="?page=statistics-jobs">���������� �� �� ����������</a></li>
            <li><a href="?page=statistics-job-types">���������� �� �� ������� ����������</a></li>
            <li><a href="?page=statistics-cities">���������� �� �� �������</a></li>
         </ul>
         </li>
         <li class="p1 down">�������
         <ul>
            <li><a href="?page=users-b2b">������������� �������</a></li>
         </ul>
         </li>
         <li class="p1 down">������������
         <ul>
            <li><a href="?page=users-b2b">������ ������������</a></li>
         </ul>
         </li>
         <li class="p1 down">������
         <ul>
            <li><a href="?page=langs">�����</a></li>
            <li><a href="?page=settings">���������</a></li>
            <li><a href="?page=stats">����������</a></li>
        </ul>
         </li>
         <li><a href="/_admin/logout/">�����</a></li>
    </ul>
        </div>