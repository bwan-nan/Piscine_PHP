#!/usr/bin/php
<?php

function	get_position($char, $alphabet)
{
	for ($i = 0; $i < strlen($alphabet); $i++)
	{
		if ($alphabet[$i] == $char)
			return ($i);
	}
	return (-1);
}

function		custom_strcmp($str1, $str2, $alphabet)
{
	$stop = min(strlen($str1), strlen($str2));
	for ($i = 0; $i < $stop; $i++)
	{
		if (get_position($str1[$i], $alphabet) > get_position($str2[$i], $alphabet))
			return (1);
		else if (get_position($str1[$i], $alphabet) < get_position($str2[$i], $alphabet))
			return (-1);
	}
	if ($str1[$stop])
		return (1);
	else if ($str2[$stop])
		return (-1);
	return (0);
}

function		cmp($a, $b)
{
	$str1 = strtolower($a);
	$str2 = strtolower($b);

	$alphabet = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$pos1 = get_position($str1[0], $alphabet);
	$pos2 = get_position($str2[0], $alphabet);
	if ($pos1 > $pos2)
		return (1);
	else if ($pos1 == $pos2)
		return (custom_strcmp($str1, $str2, $alphabet));
	return (-1);
}

function		ft_split($str)
{
	$tab = explode(' ', $str);
	$result = array_filter($tab);
	return ($result);
}

if ($argc > 1)
{
	$result = ft_split($argv[1]);
	for ($i = 2; $i < $argc; $i++)
	{
		$new_tab = ft_split($argv[$i]);
		$result = array_merge($result, $new_tab);
	}
	usort($result, 'cmp');
	foreach ($result as $elem)
		echo $elem."\n";
}
?>
