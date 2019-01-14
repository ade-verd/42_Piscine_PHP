
<?php 
require_once("index.php");
require_once("connect.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Beta</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="formulaire">
  <p>Modify your password</p>
  <br/>
<form method="POST" action="modify_pw.php">
    New Password: <input type="password" name="new_password"/><br /><br />
    Comfirm Password: <input type="password" name="confirm_password"/><br /><br />
	<input type="submit" name = "submit" value="Modify" />
    <br/>
    <br/>
</form>
</div>
</body>
</html>