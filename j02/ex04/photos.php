#!/usr/bin/php
<?php

function		remove_directory($path)
{
	$files = glob($path . '/*');
	foreach ($files as $file)
		is_dir($file) ? remove_directory($file) : unlink($file);
	rmdir($path);
}

function		create_folder($url)
{
	$dir = parse_url($url, PHP_URL_HOST);
	if (file_exists($dir))
		remove_directory($dir);
	mkdir($dir);
	return ($dir);
}

function		get_img_name($img)
{
	if (preg_match('/^.*?([^\/]+)$/', $img, $matches))
		return ($matches[1]);
}

function		download_imgs($imgs, $dir)
{
	foreach ($imgs as $img)
	{
		$fd = curl_init($img);
		curl_setopt($fd, CURLOPT_HEADER, 0);
		curl_setopt($fd, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($fd, CURLOPT_BINARYTRANSFER,1);
		$raw = curl_exec($fd);
		curl_close ($fd);
		$fp = fopen($dir.'/'.get_img_name($img), 'w');
		fwrite($fp, $raw);
		fclose($fp);
	}
}

function		get_imgs($html, $url)
{
	$imgs = array();
	preg_match_all('/<img[^>]+src="([^\s>]+)"/', $html, $matches);
	foreach ($matches[1] as $elem)
	{
		if (preg_match('|^(http(s?):\/\/)([^\/]+)|', $elem))
			$imgs[] = $elem;
		else
			$imgs[] = $url.$elem;
	}
	return ($imgs);
}

function		get_html($url)
{
	$fd = curl_init($url);
	curl_setopt($fd, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($fd);
	curl_close($fd);
	return ($html);
}

if ($argc == 2)
{
	if ($html = get_html($argv[1]))
	{
		$dir = create_folder($argv[1]);
		if ($imgs = get_imgs($html, $argv[1]))
			download_imgs($imgs, $dir);
	}
}
?>
