<?php
session_start();
$exists = 0;
foreach ($_SESSION['cart'] as &$elem)
{
	if ($elem['id'] === $_GET['id'])
	{
		$elem['Qty']++;
		$exists = 1;
		break;
	}
}
if ($exists == 0)
{
	$new['id'] = $_GET['id'];
	$new['Qty'] = 1;
	$_SESSION['cart'][] = $new;
}
header('Location: index.php');
?>
