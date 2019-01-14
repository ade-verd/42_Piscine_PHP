<?PHP
session_start();
//include("install.php");
require_once("connect.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>

<body>
  <div id="head">
    <h1>Welcome</h1></a>
  </div>


  <div id="menu">
    <ul>
      <li><a href="index_cart.php">Shop</a></li>
      
<?php
	if ($_SESSION['logged'] != "")
	{
		echo"<li><a href='my_account.php'>My Account</a></li>";
		echo"<li><a href='logout.php'>Logout</a></li>";
	}
	else
	{
		echo"<li><a href='register.php'>Sign up</a></li>";
		echo"<li><a href='login.php'>Login</a></li>";
	}
?>
    <li><a href="admin.php">Admin</a></li>
	  <li><a href="cart.php">Cart</a></li>
    </ul>
</div>


</body></html>