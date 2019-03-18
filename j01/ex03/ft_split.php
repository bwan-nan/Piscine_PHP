<?php
function ft_split($string)
{
	$tab = explode(' ', $string);
	$result = array_filter($tab);
	sort($result);
	return ($result);
}
?>
