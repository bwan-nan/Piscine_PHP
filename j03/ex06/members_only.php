<?php

//Creating list of Valid Users (username/password)
$valid_logs = [];
$valid_logs[] = array(
	'User' => 'zaz',
	'Password' => 'jaimelespetitsponeys'
);

$user = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

foreach($valid_logs as $logs)
	if ($user == $logs['User'] && $password == $logs['Password'])
		$validated = 1;

if (!$validated)
{
	header('WWW-Authenticate: Basic realm="Member area"');
	header('HTTP/1.0 401 Unauthorized');
	die ("<html><body>That area is accessible for members only</body></html>\n");
}

//If it arrives here, user is valid
$img_data = file_get_contents('../img/42.png');
$base64 = base64_encode($img_data);
echo "<html><body>Hello ".ucfirst($user)."<br />\n<img src='data:image/png;base64,".$base64."'>\n</body></html>\n";
?>
