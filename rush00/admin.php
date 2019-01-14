<?php
session_start();
include('connect.php');

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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Administration</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>

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

</body></html>
<?php

}

?>
