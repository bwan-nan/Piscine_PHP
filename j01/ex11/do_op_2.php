#!/usr/bin/php
<?php

function	do_op($a, $b, $operator)
{
	if ($operator == '+')
		print($a + $b);
	else if ($operator == '-')
		print($a - $b);
	else if ($operator == "*")
		print($a * $b);
	else if ($operator == '/')
		print($a / $b);
	else if ($operator == '%')
		print($a % $b);
}


function		replace_spaces($string)
{
	if (strpos($string, '+'))
		$result = substr_replace($string, ' + ', strpos($string, '+'), 1);
	if (strpos($string, '-'))
		$result = substr_replace($string, ' - ', strpos($string, '-'), 1);
	if (strpos($string, '*'))
		$result = substr_replace($string, ' * ', strpos($string, '*'), 1);
	if (strpos($string, '/'))
		$result = substr_replace($string, ' / ', strpos($string, '/'), 1);
	if (strpos($string, '%'))
		$result = substr_replace($string, ' % ', strpos($string, '%'), 1);
	return ($result);
}

function ft_split($string)
{
	$tab = explode(' ', $string);
	$result = array_values(array_filter($tab));
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
		do_op($result[0], $result[2], $result[1]);
}
?>
