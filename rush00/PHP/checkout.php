<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'bulgar', 'production');
$result = mysqli_query($db, "SELECT * FROM products");

$total = 0;
while ($row = mysqli_fetch_assoc($result))
{
	$url = $row['product_img'];
	$price = $row['product_price'];
	$id = $row['product_id'];
	$name = $row['product_name'];
	$color = $row['product_color'];
	$size = $row['product_size'];
	$img = $row['product_img'];
	foreach ($_SESSION['cart'] as &$elem)
	{
		$qty = $elem['Qty'];
		if ($elem['id'] === $id)
		{
			$subtotal = $qty * $price;
			$total += $subtotal;
			$new_item = array(
				'Name' => $name,
				'Color' => $color,
				'Size' => $size,
				'Qty' => $qty,
				'Price' => $price,
				'Subtotal' => $subtotal,
				'Image' => $img	
			);
			$cart[] = $new_item;
		}
	}

}
?>
<html>
	<head>
	<style>
* {
	font-family: Georgia;
}
table {
	width: 30vmin;
	border-spacing: 0;
	text-align: center;
}
td {
	width: 5vmin;
	height: 6vmin;
	border: 2px solid black;
}
.total {
	font-size: 3vmin;
}
.action {
	width: 33.33%;
    border-radius: 10px;
    background-color: green;
	text-decoration: none;
	color: white;
}

p {
	padding-top: 2vmin;
	margin: 0;
}

.action .text {
	text-align: center;
	font-size: 2vmin;
}

.container {
	display: flex;
	width: 30vmin;
}

a {
	width: 8vmin;
	height: 8vmin;
}
	</style>
	</head>
<body>
	<table>
		<tr>
			<td>Name</td><td>Color</td><td>Size</td><td>Quantity</td><td>Price</td><td>Photo</td><td>Subtotal</td>
		</tr>
<?php
foreach ($cart as $item)
{
	?><tr>
	  <td><?php echo $item['Name']?></td>
	  <td><?php echo $item['Color']?></td>
	  <td><?php echo $item['Size']?></td>
	  <td><?php echo $item['Qty']?></td>
	  <td><?php echo "\xE2\x82\xAc".$item['Price']?></td>
	  <td><img style="width:40px; height: 50px;" src="<?php echo $item['Image']?>"/></td>
	  <td><?php echo "\xE2\x82\xAc".$item['Subtotal']?></td>
      </tr>
<?php
}
?>
	<tr>
		<td>TOTAL</td><td></td><td></td><td></td><td></td><td></td><td class="total"><?php echo "\xE2\x82\xAc".$total?></td>
	</tr>
	</table>
	<div class="container">
		<a href="valid_command.php?action=pay" class="action"><p class="text">Pay</p></a>
		<a href="valid_command.php?action=empty" class="action" style="background-color: red;"><p class="text">Empty cart</p></a>
		<a class="action" style="background-color: grey;" href="index.php"><p class="text">Home Page</p></a>
	</div>
</body>
</html>
