<?php
include 'auth.php';
session_start();
if (isset($_POST["login"]) && isset($_POST["passwd"])
&& auth($_POST["login"], $_POST["passwd"]) && $_POST["submit"] == "OK")
{
	$_SESSION["loggued_on_user"] = $_POST["login"];
	if ($_GET['checkout'] === 'ok')
	{
		if (file_exists("../data/orders"))
		$file = unserialize(file_get_contents("../data/orders"));
		$data = $_SESSION['cart'];
		$data["login"] = $_SESSION["loggued_on_user"];
		if ($file != NULL)
		{
			array_push($file, $data);
		}
		else
			$file[0] = $user;
		file_put_contents("../data/orders", serialize($file));
		die ("Thank you for your order !.\n");
	}
	echo $_SESSION['loggued_on_user']." "."logged in\n";
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
	if (is_admin($_POST["login"]))
	{
		print("<br />Admin rights granted");
		$_SESSION["admin"] = TRUE;
	}
}
else
{
	$_SESSION["loggued_on_user"] = "";
	$_SESSION["admin"] = FALSE;
	echo "ERROR\n";
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
}
?>
