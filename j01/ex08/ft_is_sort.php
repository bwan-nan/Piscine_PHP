<?php
function ft_is_sort($tab)
{

	$new_array = $tab;
	sort($new_array);
	for ($i = 0; $i < count($tab); $i++)
	{
		if ($new_array[$i] != $tab[$i])
			return (0);
	}
	return (1);
}
?>
