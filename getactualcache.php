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
	for($i=0; $i<10; $i++)
	{
		// Открытие текстовых файлов
		$fhCache = fopen($cacheFile, "w");
		$locked = flock($fhCache, LOCK_EX | LOCK_NB);
		if($locked){
			break;
		}
		else
		{
			mkdir(dirname($cacheFile), 0775, true);
		}
		if($i>=9) {die("Не удалось получить блокировку\n");}
	}
	if($locked){
		$res=fwrite($fhCache, $content);
	}
    return $res;
}
