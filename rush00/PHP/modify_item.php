<?php
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"modify")
	{
		$file = unserialize(file_get_contents("../data/items"));
		if (isset($file[$_POST["oldname"]]))
		{
			if (isset($_POST["name"]) && isset($_POST["price"]) && $_POST["name"] != "" && $_POST["price"] != "" && isset($_POST["oldname"]) && $_POST["oldname"] != "")
			{
				$item["name"] = $_POST["name"];
				$item["price"] = $_POST["price"];
				$item["url"] = $_POST["url"];
				$item["tags"] = explode(",", $_POST["tags"]);
				$file[$_POST["name"]] = $item;
				unset($file[$_POST["oldname"]]);
				file_put_contents("../data/items", serialize($file));
				print("Modification done.!\n");
			}
			else
			{
				print("ERROR\n");
			}
		}
		else
		{
			print("ERROR\n");
		}
	}
	else
	{
		print("Item does not exist.\n");
	}
	$db = mysqli_connect('localhost', 'root', 'bulgar', 'production');
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"modify")
	{

		if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["url"]) && isset($_POST["category"]) && isset($_POST["price"]) && ($_POST["category"] == "shirt" || $_POST["category"] == "jeans" || $_POST["category"] == "shoes" || $_POST["category"] == "sweatshirt"))
		{
			$sql = "UPDATE products SET product_name = '".$_POST["name"]."', product_color = '".$_POST["color"]."', product_size = '".$_POST["size"]."', product_price = '".$_POST["price"]."', brand_id = '".$_POST["brand"]."', product_img = '".$_POST["url"]."', category = '".$_POST["category"]."' WHERE product_id = ".$_POST["id"];
			print($sql." done");
			mysqli_query($db, $sql);
		}
	}
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"create")
	{

		if (isset($_POST["name"]) && isset($_POST["url"]) && isset($_POST["category"]) && isset($_POST["price"]) && ($_POST["category"] == "shirt" || $_POST["category"] == "jeans" || $_POST["category"] == "shoes" || $_POST["category"] == "sweatshirt"))
		{
			$sql = "INSERT INTO products (Quantity, product_name, product_color, product_size, product_price, brand_id, product_img, category) VALUES ('3', '".$_POST["name"]."', '".$_POST["color"]."', '".$_POST["size"]."', '".$_POST["price"]."', '".$_POST["brand"]."', '".$_POST["url"]."', '".$_POST["category"]."')";
			print($sql." done");
			mysqli_query($db, $sql);
		}
	}
	if (isset($_POST["submit"]) && $_POST["submit"] ==	"delete")
	{

		if (isset($_POST["id"]))
		{
			$sql = "DELETE FROM products WHERE product_id = ".$_POST["id"];
			print($sql." done");
			mysqli_query($db, $sql);
		}
	}
	if (isset($_POST["del_user"]) && $_POST["del_user"] != "")
	{
		$file = unserialize(file_get_contents("../data/private/passwd"));
		unset($file[$_POST["del_user"]]);
		file_put_contents("../data/private/passwd", serialize($file));
		print("User ".$_POST["del_user"]." deleted!");
	}
	if (isset($_POST["order"]) && $_POST["order"] == "close_orders")
	{
		$orders = NULL;
		file_put_contents("../data/orders", serialize($orders));
	}
	print("<br/><a href=\"admin_panel.php\">Back to Admin Panel</a>");
	print("<br /><a href=\"index.php\">Back to Home Page</a>");
?>
