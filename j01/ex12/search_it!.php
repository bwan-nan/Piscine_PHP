#!/usr/bin/php
<?php
if ($argc >= 3)
{
	$string = str_replace(':', '=', $argv[2]);
	parse_str($string, $hash_table);
	for ($i = 3; $i < $argc; $i++)
	{
		$string = str_replace(':', '=', $argv[$i]);
		parse_str($string, $new_table);
		$hash_table= array_merge($hash_table, $new_table);
	}
	if (array_key_exists($argv[1], $hash_table))
		echo $hash_table[$argv[1]]."\n";
}
?>
