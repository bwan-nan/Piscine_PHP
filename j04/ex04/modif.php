<?php

function		logs_match($accounts)
{
	foreach($accounts as $account)
		if ($account['login'] === $_POST['login'] && $account['passwd'] === hash('sha512', $_POST['oldpw']))
			return ($key);
	return (-1);
}

//echo "Testing :\nLogin: ".$_POST['login']."\nOldpw: ".$_POST['oldpw']."\nhash: ".hash('sha512', $_POST['oldpw'])."\n"; 
if ($_POST['login']
&& $_POST['oldpw']	&& $_POST['newpw']
&& $_POST['submit'] && $_POST['submit'] === 'OK')
{
	$content = file_get_contents('../private/passwd');
	$accounts = unserialize($content);
	if ($accounts && ($i = logs_match($accounts)) != -1)
	{
		$accounts[$i]['passwd'] = hash('sha512', $_POST['newpw']);
		file_put_contents('../private/passwd', serialize($accounts));
		echo "OK\n";
		header('Location: index.html');
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
