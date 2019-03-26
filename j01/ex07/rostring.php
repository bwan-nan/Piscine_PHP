#!/usr/bin/php
<?php
function my_filter($var)
{
	return ($var !== NULL && $var !== FALSE && $var !== '');
}

if ($argc > 1)
{
	$string = trim($argv[1]);
	while (strstr($string, '  '))
		$string = str_replace('  ', ' ', $string);

	$tab = explode(' ', $string);
	$tab = array_values(array_filter($tab, 'my_filter'));

	for ($i = 1; $i < count($tab); $i++)
		echo $tab[$i].' ';
	echo $tab[0]."\n";
}
?>
