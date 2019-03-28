#!/usr/bin/php
<?php
if ($argc > 1)
{
	$result = [];
	for ($i = 1; $i < $argc; $i++)
	{
		$tab = explode(' ', trim($argv[$i]));
		sort($tab);
		$result = array_merge($result, $tab);
	}
	sort($result);
	foreach ($result as $elem)
		echo $elem."\n";
}
?>
