#!/usr/bin/php
<?php

function		grab_image($url,$saveto)
{
	/*
	$ch = curl_init ($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	$raw = curl_exec($ch);
	curl_close ($ch);
	if(file_exists($saveto))
		unlink($saveto);
	$fp = fopen($saveto,'wb');
	fwrite($fp, $raw);
	fclose($fp);*/
	$svg = file_get_contents($url);
	$fd = curl_init($url);

	$dir = parse_url($url,PHP_URL_HOST);
	if (!file_exists($dir) && !is_dir($dir))
		mkdir($dir);         
	$name = basename($url);
		
	$fp = fopen($dir . '/' . $name, 'wb');
			
	curl_setopt($fd, CURLOPT_FILE, $fp);
	curl_setopt($fd, CURLOPT_HEADER, 0);
	curl_exec($fd);
	curl_close($fd);

	fclose($fp);
}

function		get_image_url($file)
{
	if (preg_match('/<img src="(.*?)" alt="42">/', $file, $matches))
		return ($matches[1]);
}

$fd = curl_init('https://www.42.fr/');
curl_setopt($fd, CURLOPT_RETURNTRANSFER, true);
$str = curl_exec($fd);
if ($img_url = get_image_url($str))
	grab_image($img_url, 'logo_42.gif');
echo $img_url;
?>
