<?php
session_start();
require_once("index.php");
require_once("connect.php");

setlocale(LC_MONETARY, 'fr_FR');

$status="";
$_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
if (isset($_POST['action']) && $_POST['action'] == "remove")
{
	if(!empty($_SESSION["shopping_cart"]))
	{
		$i = count($_SESSION["shopping_cart"]);
		while ($i--)
		{
			$item = $_SESSION["shopping_cart"][$i];
			if($_POST["ref"] == $item['ref'])
			{
				unset($_SESSION["shopping_cart"][$i]);
				$i = count($_SESSION["shopping_cart"]);
				$_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
				$status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
			}
			if(empty($_SESSION["shopping_cart"]))
				unset($_SESSION["shopping_cart"]);
		}
	}
}

if (isset($_POST['action']) && $_POST['action'] == "change")
{
	foreach ($_SESSION["shopping_cart"] as &$value)
	{
		if ($value['ref'] === $_POST["ref"])
		{
			$value['quantity'] = $_POST["quantity"];
			break;
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
<div class="cart">
	<?php if(isset($_SESSION["shopping_cart"])) {
		$total_price = 0; ?>
<table class="table">
	<tbody>
		<tr>
			<td></td>
			<td>ITEM NAME</td>
			<td>QUANTITY</td>
			<td>UNIT PRICE</td>
			<td>TOTAL</td>
		</tr>
		<?php
			foreach ($_SESSION["shopping_cart"] as $product){
		?>
		<tr>
			<td>
				<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
			</td>
			<td><?php echo $product["name"]; ?><br />
				<form method='post' action=''>
					<input type='hidden' name='ref' value="<?php echo $product["ref"]; ?>" />
					<input type='hidden' name='action' value="remove" />
					<button type='submit' class='remove'>Remove Item</button>
				</form>
			</td>
			<td>
				<form method='post' action=''>
					<input type='hidden' name='ref' value="<?php echo $product["ref"]; ?>" />
					<input type='hidden' name='action' value="change" />
					<select name='quantity' class='quantity' onChange="this.form.submit()">
					<option <?php if($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
						<option <?php if($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
						<option <?php if($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
						<option <?php if($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
						<option <?php if($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
						<option <?php if($product["quantity"] == 6) echo "selected"; ?> value="6">6</option>
						<option <?php if($product["quantity"] == 7) echo "selected"; ?> value="7">7</option>
						<option <?php if($product["quantity"] == 8) echo "selected"; ?> value="8">8</option>
						<option <?php if($product["quantity"] == 9) echo "selected"; ?> value="9">9</option>
						<option <?php if($product["quantity"] == 10) echo "selected"; ?> value="10">10</option>
					</select>
				</form>
			</td>
			<td><?php echo money_format("%!.2i", $product["price"]) . " €"; ?></td>
			<td><?php echo money_format("%!.2i", $product["price"] * $product["quantity"]) . " €"; ?></td>
		</tr>
		<?php
			$total_price += ($product["price"] * $product["quantity"]);
}
?>
		<tr>
			<td colspan="5" align="right">
				<strong>TOTAL: <?php echo money_format("%!.2i", $total_price) . " €"; ?></strong>
			</td>
		</tr>
		<tr>
			<td colspan="5" align="right">
				<form target="_self" method='post' action='checkout.php'>
					<button type='submit' name='save' value="OK" class='checkout'>Proceed to checkout</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>



<?php
}
else
	echo "<h3>Your cart is empty!</h3>";
?>
</div>

<div style="clear:both;"></div>
<div class="message_box"><?php echo $status; ?></div>

</body>
</html>
