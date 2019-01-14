<?php
	session_start();
	include('connect.php');
	include('index.php');
	require_once("menu.php");

	$status="";
	$status2="";
	$status3="";
	if (isset($_POST['ref']) && $_POST['ref'] != "")
	{
		$ref = $_POST['ref'];
		$result = mysqli_query($handle, "SELECT * FROM articles WHERE ref = " . $ref);
		$row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$price = $row['price'];
		$image = $row['image'];

		$cart = array( $ref => array('name' => $name,
									'ref' => $ref,
									'price' => $price,
									'image' => $image,
									'quantity' => 1));

		if(empty($_SESSION["shopping_cart"]))
		{
			$_SESSION["shopping_cart"] = $cart;
			$status = "<div class='box' style='color:blue; font-size: 70px;'>Product is added to your cart!</div>";
			$status2 = "<div class='box'>Click here to continue...</div>";
			$status3 = "<div class='box'>Click here to see your cart...</div>";
		}
		else
		{
			foreach ($_SESSION["shopping_cart"] as $item)
			{
				if ($item['ref'] === $ref)
					$in_cart = TRUE;
			}
			if($in_cart === TRUE){
				$status = "<div class='box' style='color:red; font-size: 70px;'>Product is already added to your cart!</div>";
				$status2 = "<div class='box'>Click here to continue...</div>";
				$status3 = "<div class='box'>Click here to see your cart...</div>";
		
			}
			else
			{
				$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cart);
				$status = "<div class='box' style='color:blue; font-size: 70px;'>Product is added to your cart!</div>";
				$status2 = "<div class='box'>Click here to continue...</div>";
				$status3 = "<div class='box'>Click here to see your cart...</div>";
			}
		}
	}
?>

<html>
<header>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="cart.css" media="all" />
</header>
<body>

<?php $cart_count = count(array_keys($_SESSION["shopping_cart"])); ?>

<div class="cart_div"><a href="cart.php"><img src="img/cart-icon.png" height="65" witdh="65"/><span><?php echo $cart_count; ?></span></a></div>

<?php
function display_product($handle) {
	if ($_POST != NULL)
        $category = $_POST['category'];
    else
		$category = 'all';
	$query = 'SELECT id FROM `category` WHERE category = "'.$category.'"';
	$id = mysqli_query($handle, $query);
	$array = mysqli_fetch_assoc($id);
	$id = $array['id'];
	$query = 'SELECT articles.* FROM articles, article_category, category WHERE articles.ref = article_category.id_article AND category.id = article_category.id_category AND article_category.id_category = "' . $id . '"';
	$product = mysqli_query($handle, $query);
	$array = mysqli_fetch_all($product, MYSQLI_ASSOC);

	$nb_product = count($array);
	$i = 0;
	while ($i < $nb_product) {
		echo "<div class='product_wrapper'>
		<form method='post' action=''>
			<input type='hidden' name='ref' value=" . $array[$i]['ref'] . " />
			<div class='image'><img src='" . $array[$i]['image'] . "' /></div>
			<div class='name'>" . $array[$i]['name'] . "</div>
			<div class='price'>$" . $array[$i]['price'] . "</div>
			<button type='submit' class='buy'>Add To Cart</button>
		</form>
	</div>";
	 	$i++;
	}
	mysqli_free_result($product);
}

?>

<?php display_product($handle); ?>
<div class="message_box"><?php echo $status; ?></a></div><br />
<div class="message_box"><a href="index_cart.php"><?php echo $status2; ?></a></div><br />
<div class="message_box"><a href="cart.php"><?php echo $status3; ?></a></div><br />

<div style="clear:both;"></div>

 

</body>
</html>
