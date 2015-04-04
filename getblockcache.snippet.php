<?php
$props = array(
	'class'		=> 'modChunk',
	'element'	=> 'test',
);
$props = array_merge($props, $scriptProperties);
$resourceID=$modx->resource->get('id');

$base_path = MODX_CORE_PATH.'components/getblockcache/';
require_once($base_path.'getblockcache.php');

$cache_file = MODX_CORE_PATH.'cache/getblockcache/'.$props['class'].'&element='.$props['element'].'&res_id='.$resourceID;
$cache_file .= '.cache.php';

$cache_file_actual = isActual($cache_file, $props);
if($_GET['re']==$resourceID) $cache_file_actual = false;
if($cache_file_actual) return getCache($cache_file);

$content='';
switch($props['class'])
{
	case 'modChunk':
	$content=$modx->getChunk($props['element'], $props);
	saveCache($cache_file, $content);
	break;
	case 'modSnippet':
	$content=$modx->runSnippet($props['element'], $props);
	saveCache($cache_file, $content);
	break;
}

return $content;