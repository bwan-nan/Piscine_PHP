<!DOCTYPE html>
<html>
<head>
		<title>Site administration</title>
		<link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
		<table>
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
			  print("<tr><td class=\"border\">ID=".$id."</td><td class=\"border\">NAME=".$name."</td><td class=\"border\">URL=".$url."</td><td class=\"border\">price=".$price."</td></tr>");
		}
		?>
		</table>
		<div class="item_options">
		<div>
		<form method="post" action="../PHP/modify_item.php">
		Create Item:<br />
		Name: <input type="text" name="name"><br />
		Price: <input type="number" name="price"><br />
		Image url: <input type="url" name="url"><br />
		Category: <input type="text" name="category"><br />
		Color: <input type="text" name="color"><br />
		Size: <input type="text" name="size"><br />
		Brand id: <input type="number" name="brand"><br />
		<input type="submit" name="submit" value="create">
		</form>
		</div>
		<div>
		<form method="post" action="../PHP/modify_item.php">
		Modify Item:<br />
		ID: <input type="number" name="id"><br />
		Name: <input type="text" name="name"><br />
		Price: <input type="number" name="price"><br />
		Image url: <input type="url" name="url"><br />
		Category: <input type="text" name="category"><br />
		Color: <input type="text" name="color"><br />
		Size: <input type="text" name="size"><br />
		Brand id: <input type="number" name="brand"><br />
		<input type="submit" name="submit" value="modify">
		</form>
		</div>
		<div>
		<form method="post" action="../PHP/modify_item.php">
			Delete Item:<br />
			Id: <input type="text" name="id"><br />
			<input type="submit" name="submit" value="delete">
		</form>
		</div>
		</div>
		<?php


			$file = unserialize(file_get_contents("../data/private/passwd"));
		print("<table class=\"users\">");
		foreach($file as $user)
		{
			if ($user["admin"] == FALSE)
			{
			print("<tr><td>".$user["login"]."</td><td>Delete user<form method=\"post\" action = \"modify_item.php\"><input type = \"submit\" name =\"del_user\" value = \"".$user["login"]."\"></form></td></tr>");
			}
		}
		print("</table>");

		$file = unserialize(file_get_contents("../data/orders"));
		print("ORDERS:");
		print("<table class=\"orders\">");
		foreach($file as $order)
		{
			if ($order)
			{
				print("<tr><td>Nom: ".$order["login"]."</td>");
				foreach ($order as $item)
				{
					if (isset($item["id"]))
					{
						 print("<td>ID: ".$item["id"]." x ".$item["Qty"]."</td>");
					}
				}
				//print("<td>Close order<form method=\"post\" action = \"modify_item.php\"><input type = \"submit\" name =\"order\" value = \"".$user["login"]."\"></form></td>");
				print("</tr>");
			}
		}
		print("<tr><td>Close orders<form method=\"post\" action = \"modify_item.php\"><input type = \"submit\" name =\"order\" value = \"close_orders\"></form></td>");
		print("</table>");
	}
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
?>
</body>
</html>
