<?php
session_start();
include('connect.php');



if (isset($_POST['action']) && $_POST['action'] == "delete")
{
	if ($handle)
	{
		if (isset($_POST['id_article']) && isset($_POST['id_category']))
		{
			$query1 = "DELETE FROM `articles` WHERE `articles`.`id` = " . $_POST['id_article'];

			$query2 = "DELETE FROM `article_category`
									WHERE `article_category`.`id_category` = " . $_POST['id_category'] . " AND `article_category`.`id_article` = " . $_POST['id_article'];

			if (!mysqli_query($handle, $query1))
				print("Error performing query " . $query1 . ": " . mysqli_error($handle) . "<br />\n");
			if (!mysqli_query($handle, $query2))
				print("Error performing query " . $query2 . ": " . mysqli_error($handle) . "<br />\n");
		}
	}
	else
		echo "Error connection database<br />\n";
}

if (isset($_POST['action']) && $_POST['action'] == "edit")
{
	if ($handle)
	{
		if (isset($_POST['id_article']) && isset($_POST['id_category']))
		{
			$query1 = "DELETE FROM `articles` WHERE `articles`.`id` = " . $_POST['id_article'];

			$query2 = "DELETE FROM `article_category`
									WHERE `article_category`.`id_category` = " . $_POST['id_category'] . " AND `article_category`.`id_article` = " . $_POST['id_article'];

			if (!mysqli_query($handle, $query1))
				print("Error performing query " . $query1 . ": " . mysqli_error($handle) . "<br />\n");
			if (!mysqli_query($handle, $query2))
				print("Error performing query " . $query2 . ": " . mysqli_error($handle) . "<br />\n");
		}
	}
	else
		echo "Error connection database<br />\n";
}

function get_articles($handle)
{
	if ($handle)
	{
		$query = "SELECT	articles.id as id_article,
										articles.ref as ref,
										articles.name as name_article,
										category.id as id_category,
										category.category as name_category,
										articles.price as price,
										articles.image as image
					 	FROM articles, article_category, category
						WHERE
								(articles.ref = article_category.id_article
								AND category.id = article_category.id_category)
						ORDER BY name_article ASC";

		if ($result = mysqli_query($handle, $query))
			return ($result);
		else
			print("Error performing query " . $query . ": " . mysqli_error($handle) . "<br />\n");
	}
	else
		echo "Error connection database<br />\n";
	return NULL;
}

function get_categories($handle)
{
	if ($handle)
	{
		$query = "SELECT DISTINCT `category` FROM `category` ORDER BY `category` ASC";

		if ($result = mysqli_query($handle, $query))
		{
			while ($row = mysqli_fetch_row($result))
				$categories[] = $row[0];
			return ($categories);
		}
		else
			print("Error performing query " . $query . ": " . mysqli_error($handle) . "<br />\n");
	}
	else
		echo "Error connection database<br />\n";
	return NULL;
}

function isadmin($handle, $id_user)
{
	if ($handle)
	{
		$query = "SELECT id_user FROM `admin` WHERE `id_user` = " . $id_user;
		if ($result = mysqli_query($handle, $query))
		{
			if (($row = mysqli_fetch_row($result)) && $row[0] == $id_user)
				return (TRUE);
			else
				return (FALSE);
		}
		else
			print("Error performing query " . $query . ": " . mysqli_error($handle) . "<br />\n");
	}
	else
		echo "Error connection database<br />\n";
	return NULL;
}

if (!$_SESSION['logged'] || !isadmin($handle, $_SESSION['id']))
	header('HTTP/1.0 403 Forbidden');
else
{
?>


<html>
<header>
  <title>Administration - Manage Products</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="cart.css" media="all" />
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</header>
<body>

  <div id="head">
    <a href="admin.php" class="welcome"><h1>ADMINISTRATION</h1></a>
  </div>


  <div id="menu">
    <ul>
		<li><a href="index_cart.php">Shop</a></li>
		<li><a href='manage_products.php'>Products</a></li>
		<li><a href='manage_accounts.php'>Accounts</a></li>
		<li><a href='manage_admins.php'>Admins</a></li>
		<li><a href='logout.php'>Logout</a></li>
    </ul>
</div>

<table class="table">
	<tbody>
		<tr>
			<td></td>
			<td>REF</td>
			<td>NAME</td>
			<td>CATEGORIES</td>
			<td>PRICE</td>
			<td>IMAGE</td>
			<td></td>
			<td></td>
		</tr>
		<?php
			$categories = get_categories($handle);
			$result = get_articles($handle);
			while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td>
				<img src='<?php echo $row["image"]; ?>' width="50" height="40" />
			</td>
			<td><?php echo "<input type=text name=ref" . $row["id"] . " value=" . $row["ref"] .">"; ?></td>
			<td><?php echo "<input type=text name=art" . $row["id"] . " value=" . $row["name_article"] .">"; ?></td>
			<td><?php echo "<form><select name=cat" . $row["id"] . " class=quantity>\n";
								foreach ($categories as $cat)
								{
									if ($row["name_category"] == $cat)
										echo "<option selected>" . $cat . "</option>\n";
									else
										echo "<option>" . $cat . "</option>\n";
								}
								echo "</select></form>\n";
			?></td>
			<td><?php echo "<input type=text name=price" . $row["id"] . " value=" . $row["price"] .">"; ?></td>
			<td><?php echo "<input type=text name=img" . $row["id"] . " value=" . $row["image"] .">"; ?></td>
			<td>
				<form method='post' action=''>
					<input type='hidden' name='id_article' value="<?php echo $row["id_article"]; ?>" />
					<input type='hidden' name='id_category' value="<?php echo $row["id_category"]; ?>" />
					<input type='hidden' name='action' value="edit" />
    			<input type="image" type="submit" name="submit" src="http://cdn.onlinewebfonts.com/svg/img_359924.png" border="0" alt="Submit" style="width: 25px; height: 25px" />
				</form>
			</td>
			<td>
				<form method='post' action=''>
					<input type='hidden' name='id_article' value="<?php echo $row["id_article"]; ?>" />
					<input type='hidden' name='id_category' value="<?php echo $row["id_category"]; ?>" />
					<input type='hidden' name='action' value="delete" />
    			<input type="image" type="submit" name="submit" src="https://cdn.onlinewebfonts.com/svg/img_383566.png" border="0" alt="Submit" style="width: 25px; height: 25px" />
				</form>
			</td>
		</tr>

		<?php
		} ?>
<!--		<tr>
			<td colspan="5" align="right">
				<form target="_self" method='post' action='checkout.php'>
					<button type='submit' name='save' value="OK" class='checkout'>Proceed to checkout</button>
				</form>
			</td>
		</tr> -->
	</tbody>
</table>


</body>
</html>
<?php

}

?>
