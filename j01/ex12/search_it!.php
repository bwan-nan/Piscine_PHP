#!/usr/bin/php
<?php
if ($argc >= 3)
{
	$string = str_replace(':', '=', $argv[3]);
	$tab = explode(' ', $string);
	for ($i = 3; $i < $argc; $i++)
	{
		$string = str_replace(':', '=', $argv[$i]);
		$new_tab = explode(' ', $string);	
		$tab = array_merge($tab, $new_tab);
	}
	parse_str($string, $output);
	if (array_key_exists($argv[1], $output))
		echo $output[$argv[1]]."\n";
}
?>
