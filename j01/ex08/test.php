#!/usr/bin/php
<?php
include("ft_is_sort.php");

$tab = array("Hello World", "hi", "Wow");

if (ft_is_sort($tab))
	echo "The array is sorted\n"; 
else
		echo "The array is not sorted\n";
?>
