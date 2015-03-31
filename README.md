# modx-one-block-cache

Place package manually to ``/core/components/getactualcache/``

Create static snippet ``getBlockCache``, assign to file ``/core/components/getactualcache/getactualcache.snippet.php``

Usage
```
[[!getBlockCache? &element=`share`]]
```

Default
```
$props = array(
	'class'		=> 'modChunk',
	'element'	=> 'test',
	'age'		=> '86400' //seconds
);
```