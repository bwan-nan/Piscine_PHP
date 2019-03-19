<?php
function ft_is_sort($tab)
{
	for ($i = 0; $i < count($tab) - 1; $i++)
	{
		if ($tab[$i] > $tab[$i + 1])
			return (0);
	}
	return (1);
}
?>
