#!/usr/bin/php
<?php
if ($argc == 2)
{
	$result = trim($argv[1]);
	while (strstr($result, '  '))
		$result = str_replace('  ', ' ', $result);
	echo $result."\n";
}
?>
