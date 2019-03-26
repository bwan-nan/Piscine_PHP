#!/usr/bin/php
<?php

function		ft_upper($matches)
{
	return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
}

if ($argc == 2)
{
	if (file_exists($argv[1]))
	{
		$fd = fopen($argv[1], 'r');
		while ($line = fgets($fd))
		{
				$line = preg_replace_callback('/<a.*?title="(.*?)">/', 'ft_upper', $line); 
				$line = preg_replace_callback('/<a.*?>(.*?)</', 'ft_upper', $line);  
				echo $line;
		}
	}
	else
		echo "File does not exist.\n";
}
?>
