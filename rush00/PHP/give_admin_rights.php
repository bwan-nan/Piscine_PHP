#!/usr/bin/
<?php
	$file = unserialize(file_get_contents("../data/private/passwd"));
	if (isset($file[$login]))
	{
		$file[$login]["admin"] = TRUE;
		file_put_contents("../data/private/passwd", serialize($file));
	}
	return (FALSE);
?>