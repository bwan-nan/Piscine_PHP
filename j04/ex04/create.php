<?php

function		login_exists($accounts)
{
	foreach($accounts as $key => $value)
		if ($value['login'] === $_POST['login'])
			return (1);
	return (0);
}

session_start();

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === 'OK')
{
	if (!file_exists('../private'))
		mkdir('../private');
	if (!file_exists('../private/passwd'))
		file_put_contents('../private/passwd', NULL);
	$accounts = unserialize(file_get_contents('../private/passwd'));
	if ($accounts && login_exists($accounts))
		echo "ERROR";
	else
	{
		$new_user = array(
			'login' => $_POST['login'],
			'passwd' => hash('sha512', $_POST['passwd'])
		);
		$accounts[] = $new_user;
		file_put_contents('../private/passwd', serialize($accounts));
		header('Location: index.html');
		echo "OK";
	}
}
else
	echo "ERROR";
?>

