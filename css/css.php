<?php
$modules = isset($_GET['mod']) ? explode(',', str_replace('../', '', $_GET['mod'])) : array();
$css = '';
foreach($modules as $module) {
	if(file_exists("{$module}.css")) {
		$css .= "/* ---- {$module}.css ---- */ \n\n" . file_get_contents($module . '.css') . "\n\n";
	}
}
if($css !== '') {
	header('Content-type: text/css');
	echo $css;
}