#!/usr/bin/php
<?php

function		upper_inside($matches)
{
	return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
}

function		upper_a($matches)
{
	$matches[0] = preg_replace_callback('/>(.*?)</si', 'upper_inside', $matches[0]);
	$matches[0] = preg_replace_callback('/title="(.*?)"/', 'upper_inside', $matches[0]);
	return ($matches[0]);
}

if ($argc == 2)
{
	$whole_page = '';
	if (file_exists($argv[1]))
	{
		$fd = fopen($argv[1], 'r');
		while ($line = fgets($fd))
			$whole_page .= $line;
		$whole_page = preg_replace_callback('/(<a .*?<\/a>)/si', 'upper_a', $whole_page);  
		echo $whole_page;
	}
	else
		echo "File does not exist.\n";
}
?>
