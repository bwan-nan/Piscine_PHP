<?php
	function auth($login, $passwd)
	{
		$file = unserialize(file_get_contents("../data/private/passwd"));
		if (isset($file[$login]))
		{
			if ($file[$login]["passwd"] == hash(whirlpool, $passwd))
			{
				return (TRUE);
			}
		}
		return (FALSE);
	}

	function is_admin($login)
	{
		$file = unserialize(file_get_contents("../data/private/passwd"));
		if (isset($file[$login]))
		{
			if ($file[$login]["admin"] == TRUE)
			{
				return (TRUE);
			}
		}
		return (FALSE);
	}
?>