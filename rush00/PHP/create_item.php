<<<<<<< HEAD
<?php
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"create")
	{
=======
<!DOCTYPE html>
<html>
<head>
		<title>Site administration</title>
</head>
<body>
		<ol>
<?php
	session_start();
	include 'auth.php';
	if (is_admin($_SESSION["loggued_on_user"]))
	{
		$db = mysqli_connect('localhost', 'root', 'bulgar', 'production');
		$result = mysqli_query($db, "SELECT * FROM products");
		while ($row = mysqli_fetch_assoc($result))
		{
			  $url = $row['product_img'];
			  $price = $row['product_price'];
			  $id = $row['product_id'];
			  $name = $row['product_name'];
			  print("<li>ID=".$id." NAME=".$name." URL=".$url." price=".$price."</li>");
		}
		?>
		</ol>
		<?php


>>>>>>> Cosmin
		if (!file_exists("../data"))
			mkdir("../data");
		if (file_exists("../data/items"))
			$file = unserialize(file_get_contents("../data/items"));
		if (isset($file[$_POST["name"]]))
			print("Item deja existant!\n");
		else
		{
			if (isset($_POST["name"]) && isset($_POST["price"]) && $_POST["name"] != "" && $_POST["price"] != "" && isset($_POST["url"]) && $_POST["url"] != "")
			{
				$item["name"] = $_POST["name"];
				$item["price"] = $_POST["price"];
				$item["url"] = $_POST["url"];
				$item["tags"] = explode(",", $_POST["tags"]);
				$file[$_POST["name"]] = $item;
				file_put_contents("../data/items", serialize($file));
				print("Ajout de l'item ".$_POST["login"]." reussie\n");
			}
			else
				print("Veuillez remplir bien les champs\n");
		}
	}
	else
		print("ERROR\n");
	print("<br /><a href=\"../HTML/super_user.html\">Back to Super User Page</a>");
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
?>
