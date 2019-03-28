<?php
function		auth($login, $passwd)
{
	if (!$login || !$passwd)
		return (FALSE);
	$content = file_get_contents('../private/passwd');
	$accounts = unserialize($content);
	if ($accounts)
	{
		foreach ($accounts as $account)
			if ($account['login'] === $login && $account['passwd'] === hash('sha512', $passwd))
				return (TRUE);
	}
	return (FALSE);
}
?>
