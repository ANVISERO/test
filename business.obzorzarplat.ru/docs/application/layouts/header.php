 <div id="site_map">
     <div>
         <h3>��� �������������� �������������</h3>
         <h4>� �������� &raquo;</h4>
         <ul>
            <li><a href="/servis/otchet/" class="lk3">������������ ����� � ���������� �����</a></li>
            <li><a href="/servis/zp/" class="lk3">�������� ����� � ���������� �����</a></li>
            <li><a href="/servis/job_description/" class="lk3">����������� ����������</a></li>
            <li><a href="/services/pension/" class="lk3">������ ������� ������</a></li>
            <li><a href="/work/" class="lk3">����� ������</a></li>
         </ul>
         <h4>��������������� ������ &raquo;</h4>
         <ul>
            <li><a href="/servis/lgot/" class="lk3">��������������� �������</a></li>
            <li><a href="/servis/gosgarant/" class="lk3">��������������� �������� � �����������</a></li>
            <li><a href="/servis/nalog/" class="lk3">������ �� ����</a></li>
         </ul>
         <h4>����������� &raquo;</h4>
         <ul>
            <li><a href="/servis/million/" class="lk3">����� �� ������� �����������?</a></li>
            <li><a href="/servis/bigmak/" class="lk3">������� ���-����� � ��� ���������?</a></li>
            <li><a href="/servis/speed/" class="lk3">� ����� ��������� � �����������?</a></li>
         </ul>
     </div>
          <div>
         <h3>��� ������ ���������</h3>
         <ul>
             <li><a href="/preds/" class="lk3">� ������� &raquo;</a></li>
         </ul>
         <h4>������ &raquo;</h4>
         <ul>
            <li><a href="/preds/tarif_standart/" class="lk3">����� &laquo;��������&raquo;</a></li>
            <li><a href="/preds/tarif_profi/" class="lk3">����� &laquo;�����&raquo;</a></li>
            <li><a href="/preds/tarif_unlimited/" class="lk3">����� &laquo;���� �����������&raquo;</a></li>
            <li><a href="/preds/tarif_lite/" class="lk3">����� &laquo;����&raquo;</a></li>
            <!--<li><a href="#" class="lk3">����� &laquo;��������������&raquo;</a></li>-->
          </ul>
          <h4>������ &raquo;</h4>
          <ul>
            <li><a href="/preds/1job-profi/" class="lk3">������������� ����� ���������� ����</a></li>
            <li><a href="/preds/1job-lite/" class="lk3">���������� ����� ���������� ����</a></li>
            <li><a href="/preds/summary/" class="lk3">������� ������������� �����</a></li>
          </ul>
         <ul>
             <li><a href="/business/login/" class="lk2">���� ��� �������� &raquo;</a></li>
             <li><a href="/preds/accessing/" class="lk2">����������� &raquo;</a></li>
             <li><a href="/preds/demo/" class="lk3">����-������ &raquo;</a></li>
             <li><a href="/preds/discount/" class="lk3">������, ����������� ����������� &raquo;</a></li>
         </ul>
     </div>
     <div>
        <h3>� ��������</h3>
        <ul>
            <li><a href="/about/" class="lk3">� ��������</a></li>
            <li><a href="/comments/" class="lk3">������ � ����e</a></li>
            <li><a href="/clients/" class="lk3">�������</a></li>
            <li><a href="/contacts/" class="lk3">��������</a></li>
            <li><a href="http://help.obzorzarplat.ru/" class="lk3">������ ����������� ���������</a></li>
        </ul>
         <h3>������������</h3>
        <ul>
            <li><a href="/isl/metod/" class="lk3">����������� ������������</a></li>
            <li><a href="/isl/struktura/" class="lk3">��������� �������</a></li>
            <li><a href="/isl/basestat/" class="lk3">������������� ����������</a></li>
            <li><a href="/stats/" class="lk3">������</a></li>
            <li><a href="/isl/glossary/" class="lk3">���������</a></li>
        </ul>
<p align="right"><a href="/map/" class="btn-slide lk2">�������</a></p>
     </div>
</div><!--end site_map-->

<div id="header">
<ul class="slide_map">
<!--icons -->
    <li><a href="/"><img onmouseover="this.src='/_img/ico_home_s.gif'" onmouseout="this.src='/_img/ico_home.gif'" src="/_img/ico_home.gif" width="17" height="17" border="0" alt="�������" title="�������"></a></li>
    <li><a href="/search/"><img onmouseover="this.src='/_img/ico_search_s.gif'" onmouseout="this.src='/_img/ico_search.gif'" src="/_img/ico_search.gif" width="17" height="17" border="0" alt="�����" title="�����"></a></li>
    <li><div id="slide_inside"><a href="/map/" class="btn-slide"><img onmouseover="this.src='/_img/ico_map_s.gif'" onmouseout="this.src='/_img/ico_map.gif'" src="/_img/ico_map.gif" width="17" height="17" alt="����� �����" title="����� �����"></a></div></li>
    <li><a href="/contacts/"><img onmouseover="this.src='/_img/ico_contacts_s.gif'" onmouseout="this.src='/_img/ico_contacts.gif'" src="/_img/ico_contacts.gif" width="17" height="17" border="0" alt="��������" title="��������"></a></li>
</ul>
<!--end icons -->

<div class="menu_right">
         <a href="http://obzorzarplat.ru/about/" class="lk1">� ���</a> | <a href="http://obzorzarplat.ru/comments/" class="lk1">������</a> | <a href="http://obzorzarplat.ru/contacts/" class="lk1">��������</a> | <a href="http://obzorzarplat.ru/preds/accessing/" class="lk1">����� ��������</a> |<?php
 if ($_SESSION['logged_in']== FALSE)
 {
     echo('<a href="/" class="lk2">���� ��� ��������&raquo;</a>');
 }
 else
 {
     echo('<a href="/logout/" class="lk2">�����&raquo;</a>');
 }
  ?>
      </div>
<div class="clearfloat"></div>

<ul id="second-line-menu">
    <li id="logo">
        <a href="http://obzorzarplat.ru"><img alt="����� �������" src="/_img/logo_ru.jpg" border="0" /></a>
    </li><li id="yandex-search">
        <div class="yandexform" onclick="return {type: 0, logo: 'rb', arrow: true, webopt: false, websearch: false, bg: '#FFFFFF', fg: '#000000', fontsize: 12, suggest: true, site_suggest: true, encoding: 'windows-1251'}">
    <form action="http://obzorzarplat.ru/search/" method="get">
        <input type="hidden" name="searchid" value="254748"/>
        <input name="text"/><input type="submit" value="�����"/>
    </form>
</div>
<script type="text/javascript" src="http://site.yandex.net/load/form/1/form.js" charset="utf-8"></script>
</li><li id="contacts">
        <ul>
        <li><img alt="����� �������" src="/_img/contact_32x32.png" /></li><li>8 (812) 740 18 11<br>������� ���!</li></ul>
    </li></ul><!--/second-line-menu-->

</div>
<div class="clearfloat"></div>

<!--topmenu-->

<div id="menu">
<ul class="level1">
        <li class="level1-li"><a href="http://obzorzarplat.ru/about/">� ��������<!--[if gte IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

                <ul class="level2">
                        <li><a href="http://obzorzarplat.ru/about/">� ��������</a></li>
            <li><a href="http://obzorzarplat.ru/comments/">������</a></li>
            <li><a href="http://obzorzarplat.ru/clients/">�������</a></li>
            <li><a href="http://obzorzarplat.ru/contacts/">��������</a></li>
            <li><a href="http://help.obzorzarplat.ru/">������ ����������� ���������</a></li>
                </ul>

<!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li class="level1-li"><a href="http://obzorzarplat.ru/preds/tariffs/">������� � ������<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
         <ul class="level2 large">
             <li>
                 <div class="left-column">
                     <dl>
                 <dt>� �������</dt>
                    <dd><a href="http://obzorzarplat.ru/preds/">� �������</a></dd>
                    <dd><a href="/">���� ��� ��������</a></dd>
                <dd><a href="http://obzorzarplat.ru/preds/accessing/">����� ��������</a></dd>
                <dd><a href="http://obzorzarplat.ru/preds/demo/">����-������</a></dd>
                <dd><a href="http://obzorzarplat.ru/preds/discount/">������, ����������� �����������</a></dd>
             </dl>
                     <dl>
                 <dt>������</dt>
            <dd><a href="http://obzorzarplat.ru/preds/tarif_standart/">����� &laquo;��������&raquo;</a></dd>
            <dd><a href="http://obzorzarplat.ru/preds/tarif_profi/">����� &laquo;�����&raquo;</a></dd>
            <dd><a href="http://obzorzarplat.ru/preds/tarif_unlimited/">����� &laquo;���� �����������&raquo;</a></dd>
            <dd><a href="http://obzorzarplat.ru/preds/tarif_lite/">����� &laquo;����&raquo;</a></dd>
            <!--<li><a href="#" class="lk3">����� &laquo;��������������&raquo;</a></li>-->
            </dl>
                 </div>
            <div class="left-column">
                <dl>
                <dt>�������</dt>
            <dd><a href="http://obzorzarplat.ru/preds/1job-profi/">������������� ����� ���������� ����</a></dd>
            <dd><a href="http://obzorzarplat.ru/preds/1job-lite/">���������� ����� ���������� ����</a></dd>
            <dd><a href="http://obzorzarplat.ru/preds/summary/">������� ������������� �����</a></dd>
            </dl>
            </div>
            </li>
          </ul>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li class="level1-li"><a href="/servis/">�������<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
         <ul class="level2 large">
         <li>
             <div class="left-column">
                 <dl>
            <dt>� ��������</dt>
            <dd><a href="http://obzorzarplat.ru/servis/otchet/">������������ ����� � ���������� �����</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/zp/">�������� ����� � ���������� �����</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/job_description/">����������� ����������</a></dd>
            <dd><a href="http://obzorzarplat.ru/services/pension/">������ ������� ������</a></dd>
            <dd><a href="http://obzorzarplat.ru/work/">����� ������</a></dd>
                </dl>
                 <dl>
             <dt>��������������� ������</dt>
            <dd><a href="http://obzorzarplat.ru/servis/lgot/">��������������� �������</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/gosgarant/">��������������� �������� � �����������</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/nalog/">������ �� ����</a></dd>
                </dl>
         </div>
         <div class="left-column">
             <dl>
             <dt>�����������</dt>
            <dd><a href="http://obzorzarplat.ru/servis/million/">����� �� ������� �����������?</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/bigmak/">������� ���-����� � ��� ���������?</a></dd>
            <dd><a href="http://obzorzarplat.ru/servis/speed/">� ����� ��������� � �����������?</a></dd>
            </dl>
         </div>
         </li>
         </ul>
<!--[if lte IE 6]><table><tr><td><![endif]-->
        </li>
        <li class="level1-li"><a href="http://obzorzarplat.ru/isl/">������������<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
         <ul class="level2">
            <li><a href="http://obzorzarplat.ru/isl/metod/">����������� ������������</a></li>
            <li><a href="http://obzorzarplat.ru/isl/struktura/">��������� �������</a></li>
            <li><a href="http://obzorzarplat.ru/isl/basestat/">������������� ����������</a></li>
            <li><a href="http://obzorzarplat.ru/stats/">������</a></li>
            <li><a href="http://obzorzarplat.ru/isl/glossary/">���������</a></li>
         </ul>
        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <li class="level1-li"><a href="http://obzorzarplat.ru/servis/zp/">�������� ������</a></li>
    </ul>
</div>
<!--/topmenu-->
<div class="clearfloat"></div>