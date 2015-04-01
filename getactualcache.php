<?php

function isActual($cacheFile, $props=array())
{
	$config=array(
		'age'	=>	14400
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
		$filePtr = fopen($cacheFile, "w");
		$locked = flock($filePtr, LOCK_EX | LOCK_NB);
		if($locked){
			break;
		}
		else
		{
			mkdir(dirname($cacheFile), 0775, true);
		}
		
		if($i>=9)
		{
			$modx->log(MODX_LOG_LEVEL_WARN,'Не удалось получить блокировку');
			return '';
		}
	}
	if($locked){
		$res=fwrite($filePtr, $content);
		flock($filePtr, LOCK_UN); // отпираем файл
	}
    return $res;
}
