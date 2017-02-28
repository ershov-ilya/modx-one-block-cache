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
	'class'		=> 'modChunk', // default=modChunk || modSnippet
	'element'	=> 'test',
	'age'		=> '14400' //seconds 14400 = 4 hours
);
```


getBlockCache passes all parametrs to the called chunk/snippet:
```
[[$share? &param1=`param1 value` &param2=`param2 value`]]
```

can be cached with:
```
[[!getBlockCache? &element=`share` &age=`3600` &param1=`param1 value` &param2=`param2 value`]]
```
