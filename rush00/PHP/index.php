<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail is Easy</title>
	<link rel="stylesheet" href="../CSS/index.css">
	<script language="javascript">top.frames['cart'].location="checkout.php";</script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type='text/javascript'>

$(function(){

	var iFrames = $('iframe');

	function iResize() {

		for (var i = 0, j = iFrames.length; i < j; i++) {
			iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';}
	}

	if ($.browser.safari || $.browser.opera) { 

		iFrames.load(function(){
			setTimeout(iResize, 0);
		});

		for (var i = 0, j = iFrames.length; i < j; i++) {
			var iSource = iFrames[i].src;
			iFrames[i].src = '';
			iFrames[i].src = iSource;
		}

	} else {
		iFrames.load(function() { 
			this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
		});
	}

});

</script>
</head>
<body>
<ul class="navigation-menu">
	<li><a href="index.php">Home</a></li>
<?php
/*{
	print("<li><a href=\"admin_panel.php\">Admin panel</a></li>");
}
else */if (!$_SESSION['loggued_on_user'])
	echo "<li><a href='../HTML/login.html'>Log in</a></li>";
else if ($_SESSION['loggued_on_user'])// && $_SESSION['admin'] != TRUE)
	echo "<li><a href='logout.php'>Log out</a></li>";
if ($_SESSION['loggued_on_user'] && $_SESSION['admin'] == TRUE)
	echo "<li><a href='admin_panel.php'>Admin panel</a></li>";
?>
	<li><a>Products</a>
		<ul>
			<li><form method="GET" action="index.php?category=<?php echo $_GET['category']?>">
					<input class="submit" type="submit" value="Shirts">
					<input type="hidden" name="category" value="shirt">
				</form>
			</li>
			<li><form method="GET" action="index.php?category=<?php echo $_GET['category']?>">
					<input class="submit" type="submit" value="Jeans">
					<input type="hidden" name="category" value="jeans">
				</form>
			</li>
			<li><form method="GET" action="index.php?category=<?php echo $_GET['category']?>">
					<input class="submit" type="submit" value="Shoes">
					<input type="hidden" name="category" value="shoes">
				</form>
			</li>
			<li><form method="GET" action="index.php?category=<?php echo $_GET['category']?>">
					<input class="submit" type="submit" value="Sweatshirts">
					<input type="hidden" name="category" value="sweatshirt">
				</form>
			</li>

		</ul>
	</li>
	<li><a href="checkout.php">My Cart</a></li>
</ul>
<div class="container">
	<div class="all_items">
<?php
$all = 0;
if (!$_GET['category'])
	$all = 1;
$category = $_GET['category'];
$db = mysqli_connect('localhost', 'root', 'bulgar', 'production');
if (!$all)
	$result = mysqli_query($db, "SELECT * FROM products WHERE category = '$category'");
else
	$result = mysqli_query($db, "SELECT * FROM products");


while ($row = mysqli_fetch_assoc($result))
{
	$url = $row['product_img'];
	$price = $row['product_price'];
	$id = $row['product_id'];
	$name = $row['product_name'];?>
				<div class="item">
					<div class="photo">
						<a href="cart_management.php?add=1&id=<?php echo $id;?>">
							<img class="image" src="<?php echo $url?>"/>
							<img class="img_top" src="https://pngimage.net/wp-content/uploads/2018/06/panier-ecommerce-png.png"/>
						</a>
					</div>
					<div class="info_photo">
						<?php echo $name." : \xE2\x82\xAc".$price;?>
					</div>
				</div>
<?php
}
?>
	</div>
	<div class="frame"><iframe class="iframe" name="cart" src="checkout.php"></iframe></div>
</div>
</body>
</html>
