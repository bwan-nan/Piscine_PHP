<?php
session_start();
if ($_POST['login'] && $_POST['login'] != ''
	&& $_POST['passwd'] && $_POST['passwd'] != ''
	&& $_POST['submit'] && $_POST['submit'] === 'OK')
{
	if (!file_exists('../private'))
		mkdir('../private');
	if (!file_exists('../private/passwd'))
		file_put_contents('../private/passwd', NULL);
	$file = file_get_contents('../private/passwd');
	$users = explode("\n", $file);
	for ($i = 0; $i < count($users); $i++)
		$users[$i] = unserialize($users[$i]);
	if ($users)
	{
		//print_r($users);
		foreach($users as $user)
			if ($user['login'] == $_POST['login'])
				die ("ERROR\n");
	}
	$new_user = array(
		'login' => $_POST['login'],
		'passwd' => hash('sha512', $_POST['passwd'])
	);
	file_put_contents('../private/passwd', serialize($new_user)."\n", FILE_APPEND);
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
