#!/usr/bin/php
<?php

function cmp($a, $b)
{
	$str1 = strtolower($a);
	$str2 = strtolower($b);
	if (is_numeric($a) && is_string($b))
		return (1);
	else if (
}

if ($argc > 1)
{
	$tab = explode(' ', $argv[1]);
	$result = array_filter($tab);
	if ($argc > 2)
	{
		for ($i = 2; $i < $argc; $i++)
		{
			$new_tab = explode(' ', $argv[$i]);
			$tmp = array_filter($new_tab);
			$result = array_merge($result, $tmp);
		}

	}
	uasort($result, 'cmp');
	foreach ($result as $elem)
		echo $elem."\n";
}
?>
