<?php

function isActual($cacheFile, $props=array())
{
	$config=array(
		'age'	=>	86400
	);
	$config=array_merge($config, $props);
	$cacheAgeLimit=$config['age'];
	
    $fNeedNewCache=false;
    if(is_file($cacheFile))
    {
        $filetime= filemtime($cacheFile);
        $curtime=time();
        $cacheFilenameAge=$curtime-$filetime;
        //print $cacheFilenameAge;
        if($cacheFilenameAge>$cacheAgeLimit) $fNeedNewCache=true;
    }
    else $fNeedNewCache=true;

    return !$fNeedNewCache;	
}

function getCache($cacheFile){
	$cacheContent=file_get_contents($cacheFile);
	return $cacheContent;
}

function saveCache($cacheFile, $content)
{
	// Открытие текстовых файлов
	$fhCache = fopen($cacheFile, "w");
	$locked = flock($fhCache, LOCK_EX | LOCK_NB);
	if(!$locked) {
		echo 'Не удалось получить блокировку';
		exit(-1);
	}
    $res=fwrite($fhCache, $content);
    return $res;
}
