#!/usr/bin/php
<?php

function	do_op($a, $b, $operator)
{
	if ($operator == '+')
		return ($a + $b);
	else if ($operator == '-')
		return ($a - $b);
	else if ($operator == "*")
		return ($a * $b);
	else if ($operator == '/')
		return ($a / $b);
	else if ($operator == '%')
		return ($a % $b);
}


function		replace_spaces($string)
{
	if (strpos($string, '+'))
		$result = substr_replace($string, ' + ', strpos($string, '+'), 1);
	if (strpos($string, '-'))
		$result = substr_replace($string, ' - ', strpos($string, '-'), 1);
	else if ($string[0] == '-' && strcspn($string, "+*/%") == strlen($string)
	&& strpos($string, '-', 1))
		$result = substr_replace($string, ' - ', strpos($string, '-', 1), 1);
	if (strpos($string, '*'))
		$result = substr_replace($string, ' * ', strpos($string, '*'), 1);
	if (strpos($string, '/'))
		$result = substr_replace($string, ' / ', strpos($string, '/'), 1);
	if (strpos($string, '%'))
		$result = substr_replace($string, ' % ', strpos($string, '%'), 1);
	return ($result);
}

function my_filter($var)
{
	return ($var !== NULL && $var !== FALSE && $var !== '');
}

function ft_split($string)
{
	$tab = explode(' ', $string);
	$result = array_values(array_filter($tab, 'my_filter'));
	return ($result);
}

function		string_to_array($string)
{
	$new_string = replace_spaces($string);
	return (ft_split($new_string));
}

function		epur_str($string)
{
	$result = trim($string);
	while (strstr($result, '  '))
		$result = str_replace('  ', ' ', $result);
	return ($string);
}

if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	$string = epur_str(trim($argv[1]));
	$result = string_to_array($string);
	if (!is_numeric($result[0]) || !is_numeric($result[2]) || strcspn($result[1], "+-*/%"))
		echo "Syntax Error\n";
	else
		echo do_op($result[0], $result[2], $result[1])."\n";
}
?>
