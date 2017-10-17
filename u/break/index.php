<?php
function wVal($min, $max, $suffix='px') {
	return rand($min, $max) . $suffix;
}

$triangles = [
	'count' => 50,
	'brd' => [100, 600],
	'skew' => 45,
	'rotate' => 45,
	'scale' => [1, 20],
	'offset' => 25,
	'opacity' => [1, 4]
];

$variants = [
	'border-left:w1 solid rgba(255,255,255,##);border-top-width:w2;border-bottom-width:w3;',
	'border-right:w1 solid rgba(255,255,255,##);border-top-width:w2;border-bottom-width:w3;',
	'border-top:w1 solid rgba(255,255,255,##);border-left-width:w2;border-right-width:w3;',
	'border-bottom:w1 solid rgba(255,255,255,##);border-left-width:w2;border-right-width:w3;',
];

$style = '';
for ($i=1; $i <= $triangles['count']; $i++) {
	$size = str_replace(['w1', 'w2', 'w3', '##'],[
			wVal($triangles['brd'][0], $triangles['brd'][1]),
			wVal($triangles['brd'][0], $triangles['brd'][1]),
			wVal($triangles['brd'][0], $triangles['brd'][1]),
			intval(wVal($triangles['opacity'][0], $triangles['opacity'][1], '')) / 10
		], $variants[rand(0,count($variants)-1)]
	);

	$skewvals = [wVal(-$triangles['skew'], $triangles['skew'], 'deg'), wVal(-$triangles['skew'], $triangles['skew'], 'deg')];
		$skew = 'skew(' . implode(',', $skewvals) . ')';
	$offsetvals = [wVal(-$triangles['offset'], $triangles['offset'], '%'), wVal(-$triangles['offset'], $triangles['offset'], '%')];
		$offset = 'translate(' . implode(',', $offsetvals) . ')';
	$rotate = 'rotate(' . wVal(-$triangles['rotate'], $triangles['rotate'], 'deg') . ')';
	$scale = 'scale(' . intval(wVal($triangles['scale'][0], $triangles['scale'][1], '')) / 10 . ')';

	$transforms = [$skew, $scale, $rotate];
	$style .= '.t' . $i . '{' . $size . 'transform:' . $offset . '}' ."\n";
	$style .= '.w' . $i . '{transform:' . implode(' ', $transforms) . '}' ."\n";
}
?>
<!DOCTYPE html><html><head><meta charset="utf-8" />
<title>UNFUNKED+</title>
<meta name="description" content="UFDX" />
<meta name="robots" content="noodp" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta property="og:title" content="UNFUNKED" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.unfunked.org/" />
<link rel="image_src" href="http://www.unfunked.org/icon.png" type="image/png" />
<link rel="apple-touch-icon" href="http://www.unfunked.org/icon.png">
<meta property="og:image" content="http://www.unfunked.org/icon.png" />
<meta property="og:image:type" content="image/png" />
<meta property="og:description" content="UFDX" />
<meta property="og:site_name" content="UNFUNKED+" />
<meta property="og:locale" content="en_GB" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="c/ss.css" type="text/css" />
<style type="text/css">
<?php echo $style ?>
</style>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-1321166-1', 'auto');
ga('send', 'pageview');
</script>
</head>
<body id="b">
<?php
for ($i=1; $i <= $triangles['count']; $i++) {
	echo '<div class="w w' . $i . '"><div class="t t' . $i . '"></div></div>' . "\n";
}
?>
<div class="idiot"><div class="idiot"><pre class="stare" id="u">UF
DX</pre></div></div>
<script type="text/javascript">
var e = document.getElementsByClassName('w'),
	l = e.length,
	i=0,
	x = setInterval(function() {
		e.item(i).style.opacity=1;
		if(++i >= l) clearInterval(x);
	}, 50);
</script>
</body></html>
