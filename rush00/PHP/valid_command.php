<?php
session_start();
if ($_SESSION['cart'] && (!$_SESSION['loggued_on_user'] || $_SESSION['loggued_on_user'] == ''))
{
	echo "Please login before checking out\n";
	header('Location: ../HTML/login.html?checkout=ok');
}
else if (!$_SESSION['cart'])
{
	echo "Empty cart...\n";
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
}
if ($_GET['action'] === 'pay' && $_SESSION['cart'])
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
	unset($_SESSION['cart']);
	echo "Thank you for your order !\n";
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
}
else if ($_SESSION['cart'] && $_GET['action'] === 'empty')
{
	unset($_SESSION['cart']);
	echo "Your cart is now empty.\n";
	header('Location: checkout.php');
}
?>
