<?php
$props = array(
	'class'		=> 'modChunk',
	'element'	=> 'test',
);
$props = array_merge($props, $scriptProperties);

$base_path = MODX_CORE_PATH.'components/getactualcache/';
require_once($base_path.'getactualcache.php');

$cache_file = MODX_CORE_PATH.'cache/getactualcache/'.$props['class'].'-'.$props['element'];
$cache_file .= '.cache.php';

$cache_file_actual = isActual($cache_file, $props);
if($_GET['re']==$modx->resource->get('id')) $cache_file_actual = false;
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