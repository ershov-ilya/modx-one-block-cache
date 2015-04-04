# modx-one-block-cache

Place package manually to ``/core/components/getblockcache/``

Create static snippet ``getBlockCache``, assign to file ``/core/components/getblockcache/getblockcache.snippet.php``

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