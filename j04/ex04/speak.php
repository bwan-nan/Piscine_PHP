<?php
session_start();
if (!($_SESSION['loggued_on_user']))
	die ("ERROR\n");

if ($_POST['msg'])
{
	if (!file_exists('../private/'))
		mkdir('../private');
	if (!file_exists('../private/chat'))
		file_put_contents('../private/chat', NULL);
}
$file = file_get_contents('../private/chat');
$chat = unserialize($file);
$fd = fopen('../private/chat', 'r+');
flock($fd, LOCK_EX);
$message = array(
	'login' => $_SESSION['loggued_on_user',
	'time' => time();
	'msg' => $_POST['msg'];
);
file_put_contents('../private/chat', serialize($
$
?>
