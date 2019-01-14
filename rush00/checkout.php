<?php
session_start();
include('connect.php');
include('index.php');

date_default_timezone_set('Europe/Paris');

function get_id($handle, $query)
{
	if ($handle)
	{
		if ($result = mysqli_query($handle, $query))
		{
			$row = mysqli_fetch_row($result);
			return ($row[0]);
		}
		else
			print("Error performing query " . $query . ": " . mysqli_error($handle) . "<br />\n");
	}
	else
		echo "Error connection database<br />\n";
	return NULL;
}

if (isset($_POST['save']) && $_POST['save'] === 'OK')
{
	if (!isset($_SESSION['logged']) || $_SESSION['logged'] === "" )
		header("Location: login.php");
	else if ($handle !== FALSE)
	{
		$err = 0;
		foreach ($_SESSION["shopping_cart"] as $item)
		{
			$id_user = $_SESSION['id'];
			$id_article = get_id($handle, "SELECT `id`, `ref` FROM `articles` WHERE `ref` LIKE \"" . $item['ref'] . "\";");
			$values = implode(',', array("NULL", $id_user, $id_article, $item['quantity'], "\"In progress\"", "CURRENT_TIME()"));

			$query = "INSERT INTO tracking(id, id_user, id_article, quantity, status, date_order)
					  VALUES (" . $values . ");";
			if (!mysqli_query($handle, $query))
			{
				$err++;
				break ;
				print("Error performing query " . $query . ": " . mysqli_error($handle) . "<br />\n");
			}
		}
		if (!$err)
		{
			unset($_SESSION["shopping_cart"]);
			echo '<script type="text/javascript">alert("Votre commande a bien été enregistrée 👌 ! Merci et à bientôt 🙃")</script>';
		}
		else
			echo '<script type="text/javascript">alert("Une erreur est survenue avec votre commande 😔 Merci de réessayer.")</script>';
	}
	else
		echo "Error connection database<br />\n";
}
else
	header("Location: index.php");

?>
