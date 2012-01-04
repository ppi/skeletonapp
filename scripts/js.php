<?php
$modules = isset($_GET['mod']) ? explode(',', str_replace('../', '', $_GET['mod'])) : array();
$js = '';
foreach($modules as $module) {
        if(file_exists("{$module}.js")) {
                $js .= "/* ---- {$module}.js ---- */ \n\n" . file_get_contents($module . '.js') . "\n\n";
        }
}
if($js !== '') {
	header('Content-type: text/javascript');
	echo $js;
}