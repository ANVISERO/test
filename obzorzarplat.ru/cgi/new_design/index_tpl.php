<?php //include('/_admin/sql/mysql.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="windows-1251">
	<title><?=$tit?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" href="/new_design/css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="/new_design/css/owl.carousel.min.css" rel="stylesheet" />
	<link type="text/css" href="/new_design/css/owl.theme.default.css" rel="stylesheet" />
	<link type="text/css" href="/new_design/css/jquery-ui.min.css" rel="stylesheet" />
	<link type="text/css" href="/new_design/css/global.css" rel="stylesheet" />
	<script src="/_js/jquery.min.js"></script>
	<script type="text/javascript" src="/new_design/js/jquery-ui.min.js"></script>
	<script type='text/javascript' src='/new_design/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='/new_design/js/owl.carousel.min.js'></script>
	<script src="/_js/jquery.form.js" type="text/javascript"></script>
	<script type='text/javascript' src='/new_design/js/global.js'></script>
</head>
<body>
	<div class="top">
		<div class="container" style="position: relative;height: 100%;">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-3">
					<div class="logo">
						<a href="/"><img src="/new_design/img/logo.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-xs-9">
					<div class="mobile-menu"></div>
					<div class="top-nav">
						<div class="close-mobile-menu"></div>
						<ul>
							<li class="open-submenu"><a href="/">�������</a>
								<ul class="submenu">
									<li><a href="/services/otchet/">������������ �����</a></li>
								</ul>
							</li>
							<li><a href="/news/">�������</a></li>
							<li class="open-submenu"><a href="#">����������� �����</a>
								<ul class="submenu">
									<li><a href="#">������</a>
										<ul>
											<li><a href="/isl/surveys/?survey_type_id=1">���������������������� ������������</a></li>
											<li><a href="/isl/order/ ">������ ������ � ���� ������</a></li>
											<li><a href="/preds/wage-system/">������������ ������� ������ �����</a></li>
											<li><a href="/preds/regulatory-document/">���������� �������������� ����������� ����������</a></li>
										</ul>
									</li>
									<li><a href="/preds/tariffs/">������</a></li>
									<li><a href="/services/job_description/">����������� ����������</a></li>
									<li><a href="/preds/demo/">��������� ����-������</a></li>
								</ul>
							</li>
							<li class="open-submenu"><a href="#">��������� �������</a>
								<ul class="submenu">
									<li><a href="/scoring-online/">��������</a></li>
									<li><a href="#">�������</a>
										<ul>
											<li><a href="/preds/scoring/">������ ������</a></li>
											<li><a href="#">�������� ���� ������</a></li>
											<li><a href="#">���������� �������</a></li>
										</ul>
									</li>
									<li><a href="/preds/demo/">��������� ����-������</a></li>
								</ul>
							</li>
							<li class="open-submenu"><a href="#">�������</a>
								<ul class="submenu">
									<li><a href="/stats/">���������</a></li>
									<li><a href="/isl/salary/">���������</a></li>
									<li><a href="/services/job_description/">����������� ����������</a></li>
									<li><a href="/isl/glossary/">���������</a></li>
								</ul>
							</li>
							<li class="open-submenu"><a href="#">� ���</a>
								<ul class="submenu">
									<li><a href="/about/">��� ��</a></li>
									<li><a href="/isl/surveys/?survey_type_id=1">�������</a></li>
									<li><a href="/comments/">������</a></li>
									<li><a href="/contacts/">��������</a></li>
								</ul>
							</li>
							<li class="login"><a href="http://business.obzorzarplat.ru/login/">���� ��� ��������</a></li>
						</ul>
					</div>
				</div>
			</div>
			
					<div class="express-report">
						<h2>����� ���� ��������!</h2>
						<p>
							������������� ��������� ����������� ���� ������. ������ ���������� ���������� ����� ������!
						</p>
						<p class="select_text">
							�������� ��������� � �����
						</p>
						<form action="" method="post" id="zp" name="zp">
							<div class="form-group">
								<div class="input_block">
									<input type="text" id="place" autocomplete="off" placeholder="���������...">
									<div class="toggle_container" id="jobs_container"></div>
								</div>
								<div class="input_block" style="float: right;">
									<input type="text" id="city" autocomplete="off" placeholder="�����...">
									<div class="toggle_container" id="cities_container"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<input type="hidden" id="jtype_input" name="jtype" value="">
							<input type="hidden" id="job_input" name="job" value="">
							<input type="hidden" id="city_input" name="city" value="">
							<div class="sbmt-button-grp">
								<button type="submit"></button>
								<span>������ ��������</span>
							</div>
							<div id="zpResult"></div>
						</form>
					</div>
					<div class="go-next"></div>
		
			<div class="yakor"></div>
			<a href="#" class="scroll"></a>
		</div>
	</div>
	<div class="container news">
		<div class="row">
			<div class="col-lg-12" style="padding: 0">
				<h2>�������</h2>
				<div class="row items-list owl-carousel owl-theme" style="margin: 0">
					<?php
						function mbCutString($str, $length, $postfix='...', $encoding='UTF-8') {
						    if (mb_strlen($str, $encoding) <= $length) {
						        return $str;
						    }
						 
						    $tmp = mb_substr($str, 0, $length, $encoding);
						    return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
						}
						$mysqli = new mysqli($host,$user,$pass,$db);
						$res = $mysqli->query("select * from for_news where status='1' and lang='0' order by id desc limit 10");
					?>
					<?php if($res && $res->num_rows>0) {?>
						<?php while($row = $res->fetch_object()) {?>
						<?php $anons=implode("", file('../docs/_admin/elements/news/'.$row->id.'_an.txt')); ?>
						<div class="item">
							<div class="date"><?=$row->date?></div>
							<div class="title"><?=mbCutString($row->zag,60,'...','windows-1251')?></div>
							<div class="text"><?=mbCutString(strip_tags($anons),60,'...','windows-1251')?></div>
							<div class="more-link"><a href="/news/view/?id=<?=$row->id?>">���������</a></div>
						</div>
						<?php }?>
					<?php }?>
					<?php $mysqli->close(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container content">
		<div class="row section right-image">
			<div class="col-lg-6 col-md-6 text">
					<h2>�������� � ������: ����� ���������� ����������</h2>
					�������� � ���� �� ����� �������� � ������������ ��������� ��� ��� ���������� � ������. �� ������ ������ � ���� ��������?� ����� ������� ������. ���� ����� ���� �������� ������ ������ ������, ������ �������� ������ ����� ��������, ��� ����� ������� ����������, �� ��������� �������� �����.
	���� �������� ������� ������������.RU � �������������� 
	����� ���������� ���������� � �������� � ������. ��� ����� ������� ������� �� ���������� 15 ��� �������� ������������ ����� ��������: ���������� � ����������, ����� � ����������. � ������������� ������ ��� ��������� ����� 1000 ��������, �������� ���� ���� ������ �� �������� � ������ ����� �����������.<br>
	�� ����� ����� ����� ����� ����� ������ ������� �� ���� ���������, ��������� � ���������� ������������ ��������, � ����� ����������� ���������� �� 3000 ����������.
			</div>
			<div class=" col-lg-6 col-md-6 image">
				<img class="img-responsive" src="/new_design/img/section-image.png">
			</div>
		</div>

		<div class="row section left-image">
			<div class="col-lg-6 col-md-6 text">
				<h2>��� �� ��������?</h2>
			�� �������� ��� ���������� ���������� �� ���������� �����: �������� ����������� ������ � ��������, ��������� ���������� ����� � ����������� ����������.
�������� �������� ������ � ���������� ����� ������� ��� 10, 25, 50, 75 � 90 �����������. ������������.RU �� ������ ������������� ����������� � ������������ �������� ���������� �����, � ��������� ������������� ���������� ����� �� �����������. ����������� � ������������ �������� ������ �������� �������� �������� ������������ �����. ���������� �� ��������� ����������� ������� ������� ������� ��� ������ ��������, ������� ��������������� ���������� �� �������� �������� ������������� ������.
� ��������� ���������� ����� ���������� ���� ��������������� �����: �������� � �������, ������, ��������������� ������� � ������.
� ����������� ���������� �������, ����� ����������� ��������� ��������� �� ������ ��������� � ������ �������� �� ������ ��������.
			</div>
									<div class="col-lg-6 col-md-6 image">
				<img class="img-responsive" src="/new_design/img/section-image2.png">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 adv">
				<button class="bot-button">������ ��������</button>
				<div style="text-align: center;">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/_DHqqXBzJ1s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				<div class="adv-block"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!-- ����� ������ ������� -->

<ins class="adsbygoogle"

     style="display:inline-block;width:980px;height:120px"

     data-ad-client="ca-pub-6865877396098905"

     data-ad-slot="6004021090"></ins>

<script>

(adsbygoogle = window.adsbygoogle || []).push({});

</script> </div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
		<div class="col-lg-4 col-md-4 left">
			<div class="logo">
				<a href="#"><img src="/new_design/img/bottom-logo.png" alt=""></a>
			</div>
			<div class="links">
				<div class="link"><a href="/privacy_policy/">�������� ������������������</a></div>
				<div class="link"><a href="/terms_of_use/">������� �����������</a></div>
				<div class="link"><a href="/user_agreement/">��������� �������-������</a></div>
				<div class="link"><a href="/warranty/">������� ������ � �������� ������������</a></div>
				<div class="link"><a href="https://ru.jooble.org" target="blank">Jooble</a></div>
				<div class="clearfix"></div>
				<div style="margin-top: 10px;">
					<!-- Yandex.Metrika informer -->
<a style="border: none;" href="http://metrika.yandex.ru/stat/?id=4651201&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/4651201/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
style="width:88px; height:31px; border:0;margin-right: 10px;" alt="������.�������" title="������.�������: ������ �� ������� (���������, ������ � ���������� ����������)" /></a>
<!-- /Yandex.Metrika informer -->
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter4651201 = new Ya.Metrika({id:4651201,
                    clickmap:true,
                    trackLinks:true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/4651201" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--LiveInternet counter-->
<script type="text/javascript"><!--
document.write("<a style='border:none;' href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t26.1;r"+
escape(top.document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+";"+Math.random()+
"' alt='' title='LiveInternet: �������� ����� ����������� ��"+
" �������' "+
"border=0 width=88 height=15><\/a>")//--></script><!--/LiveInternet-->
</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 middle">
			<h3>��������</h3>
			+7 (812) 740-18-11<br>
tz@obzorzarplat.ru<br>
�. �����-���������, 
����� ��. �.�., �. 58, 
����� �, ���� 3
		</div>
		<div class="col-lg-5 col-md-5 right">
			<img class="dncye" src="/new_design/img/dncye.png" alt="">
			<div class="clearfix"></div>
			&copy; ��� ����-���������� 1996-<?=date('Y')?><br>
��� ����� �������� � ���������� �������
<div class="payment_systems">
	<img class="img-responsive" src="/new_design/img/pyament_systems.png" alt="">
	</div>
		</div>
	</div>
	</div>
	</div>
	<?php
	if(isset($_GET['pm'])) {
		if(isset($_POST['LMI_SYS_PAYMENT_DATE']) && isset($_POST['LMI_SYS_PAYMENT_ID']) && isset($_POST['JTYPE_ID']) && isset($_POST['ORDER_ID']) && isset($_POST['JOB_ID']) && isset($_POST['CITY_ID'])) {?>
		<script>
			function show_report() {
				$.ajax({
					method: 'POST',
					url: "/services/zp/result/",
					data: { job: "<?=$_POST['JOB_ID']?>", jtype: "<?=$_POST['JTYPE_ID']?>", city: "<?=$_POST['CITY_ID']?>",  lmi_sys_payment_date: "<?=$_POST['LMI_SYS_PAYMENT_DATE']?>", lmi_sys_payment_id: "<?=$_POST['LMI_SYS_PAYMENT_ID']?>", order_id: "<?=$_POST['ORDER_ID']?>"},
        			success: function(data) {
        				$('#zpResult').html(data);
            			$('#zpResult').dialog('open');
            		}
				});
			}
			$(document).ready(function() {
				for($i=1;$i<=2;$i++) {
					show_report();
				}
			});
		</script>
		<?php }
	}
?>
</body>
</html>