<?php
function google_ext_encode($dec) {
	if($dec === false) return '__';

	$e = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.
		'abcdefghijklmnopqrstuvwxyz0123456789-.';
	$m = strlen($e); // == 63
	$res = '';

	do {
		$r = $dec % $m;
		$dec = (int)($dec / $m);
		$res = $e[$r].$res;
	} while($dec > 0);

	$res = sprintf("%'A2s", $res);
	return $res;
}

function chart_html($type, $width,
	$height, $data, $labels = false, $colors = false, $alt = '') {

	$edata = implode('', (array_map("google_ext_encode", $data)));
	$url = 'http://chart.apis.google.com/chart?cht='.$type.
		'&chd=e:'.$edata.'&chs='.$width.'x'.$height;

	if(is_array($colors) && count($colors))
		$url .= '&chco='.implode(',', $colors);

	if(is_array($labels) && count($labels)){
foreach($labels as $label){utf8_encode('$label');}

		$url .= '&chl='.implode('|', (array_map("urlencode", $labels)));
print(implode('|', (array_map("urlencode", $labels))));
}

	return '<img src="'.$url.'" width="'.$width.'" height="'.$height.
		'" alt="'.$alt.'" />';
}

$width = 300;
$height = 100;
$data = array(95.38,4.62);
$labels = array('российский капитал', 'иностранный капитал');

echo chart_html('p', 500, 200, $data, $labels, false,
	'Google Chart Test').'<br />';
?>

<img src="http://chart.apis.google.com/chart?cht=p&chd=t:95.38,4.62&chs=500x200&chl=%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB|%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%BD%D1%8B%D0%B9%20%D0%BA%D0%B0%D0%BF%D0%B8%D1%82%D0%B0%D0%BB" alt="" />
