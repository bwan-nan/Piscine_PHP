<?php
session_start();
if (!($_SESSION['loggued_on_user']))
	die ("ERROR\n");

if (file_exists('../private') && file_exists('../private/chat'))
	$file = file_get_contents('../private/chat');
	$chat = unserialize($file);
	foreach ($chat as $msg)
		echo '['.date('H:i', $msg['time']).'] <b>'.$msg['login'].'</b>: '.$msg['msg'].'<br />';
?>
