#!/usr/bin/php
<?php
	if (!file_exists("../data"))
			mkdir("../data");
	if (!file_exists("../data/private"))
			mkdir("../data/private");
	$user["login"] = "cbilga";
	$user["passwd"] = hash(whirlpool, "cbilga");
	$user["admin"] = TRUE;
	$file["cbilga"] = $user;
	file_put_contents("../data/private/passwd", serialize($file));
	$db = mysqli_connect('127.0.0.1', 'root', 'bulgar');
	mysqli_query($db, "CREATE DATABASE production");
	$db = mysqli_connect('127.0.0.1', 'root', 'bulgar', 'production');
	mysqli_multi_query($db, '../localhost.sql');
	$sql = file_get_contents('../localhost.sql');
	$mysqli = new mysqli("127.0.0.1", "root", "bulgar", "production");
	$mysqli->multi_query($sql);

?>
