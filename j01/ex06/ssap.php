#!/usr/bin/php
<?php
if ($argc > 1)
{
	$tab = explode(' ', $argv[1]);
	$result = array_filter($tab);
	for ($i = 2; $i < $argc; $i++)
	{
		$new_tab = explode(' ', $argv[$i]);
		$tmp = array_filter($new_tab);
		$result = array_merge($result, $tmp);
	}
	sort($result);
	foreach ($result as $elem)
		echo $elem."\n";
}
?>
