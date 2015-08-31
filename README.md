# modx-one-block-cache

Place package manually to ``/core/components/getblockcache/``

Create static snippet ``getBlockCache``, assign to file ``/core/components/getblockcache/getblockcache.snippet.php``

Non cached chunk/snippet call:
```
[[$share]]
```

Usage
```
[[!getBlockCache? &element=`share`]]
```

Default
```
$props = array(
	'class'		=> 'modChunk',
	'element'	=> 'test',
	'age'		=> '14400' //seconds
);
```


getBlockCache passes all parametrs to the called chunk/snippet:
```
[[$share? &header=`Chunk content header` &footer=`Chunk content header`]]
```

can be cached with:
```
[[!getBlockCache? &element=`share` &header=`Chunk content header` &footer=`Chunk content header`]]
```
