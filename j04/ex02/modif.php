<?php

if ($_POST['login']
&& $_POST['oldpw']	&& $_POST['newpw']
&& $_POST['submit'] && $_POST['submit'] === 'OK')
{
	$content = file_get_contents('../private/passwd');
	$accounts = unserialize($content);
	if ($accounts)
	{
		foreach ($accounts as &$account)
		{
			if ($account['login'] === $_POST['login']
			&& $account['passwd'] === hash('sha512', $_POST['oldpw']))
			{
				$account['passwd'] = hash('sha512', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($accounts));
				die ("OK\n");
			}
		}
		echo "ERROR\n";
	}

}
else
	echo "ERROR\n";
?>
