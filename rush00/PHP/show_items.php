<!DOCTYPE html>
<html>

<?php
$db = mysqli_connect('localhost', 'root', 'bulgar', 'production');
$result = mysqli_query($db, 'SELECT * FROM products');

while ($row = mysqli_fetch_assoc($result))
{
	$url = $row['product_img'];
	$price = $row['product_price'];
	$name = $row['product_name'];
	echo '<img src="'.$url.'">';
	echo $name.' : '.$price.'euro';
}
?>

</html>
