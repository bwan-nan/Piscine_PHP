#!/usr/bin/php
<?php
if ($argc == 2)
{
	$file = file_get_contents($argv[1]);
	$accounts = unserialize($file);
	print_r($accounts);
}
?>
