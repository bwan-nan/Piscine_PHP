<?php
function my_filter($var)
{
	return ($var !== NULL && $var !== FALSE && $var !== '');
}

function ft_split($string)
{
	$tab = explode(' ', trim($string));
	$result = array_filter($tab, 'my_filter');
	sort($result);
	return ($result);
}
?>
