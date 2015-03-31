<?php
$props = array(
	'class'		=> 'modChunk',
	'element'	=> 'test',
);
$props = array_merge($props, $scriptProperties);

$base_path = MODX_CORE_PATH.'components/getactualcache/';
$cache_file = $base_path.'cache/'.$props['class'].'-'.$props['element'];
$cache_file .= '.cache.php';

require_once($base_path.'getactualcache.php');

$cache_file_actual = isActual($cache_file, $props);
if($cache_file_actual) return getCache($cache_file);

$content='';
switch($props['class'])
{
	case 'modChunk':
	$content=$modx->getChunk($props['element'], $props);
	saveCache($cache_file, $content);
	break;
}

return $content;