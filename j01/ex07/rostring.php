#!/usr/bin/php
<?php
if ($argc > 1)
{
	$string = trim($argv[1]);
	while (strstr($string, '  '))
		$string = str_replace('  ', ' ', $string);

	$tab = explode(' ', $string);
	$tab = array_values(array_filter($tab));

	for ($i = 1; $i < count($tab); $i++)
		echo $tab[$i].' ';
	echo $tab[0];
}
?>
