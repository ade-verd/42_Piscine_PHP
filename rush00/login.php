<?php

session_start();
require_once("connect.php");
require_once("index.php");
require_once("header.php");
$username = $password = "";
$error = "";
$error_msg = "Incorrect username or password.";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//Username check
    if(empty(test_input($_POST["username"])))
	{
        $error = "Incorrect username or password1.";
    }
	else
	{
        $username = test_input($_POST["username"]);
    }
    // Password check
    if(empty(test_input($_POST["password"])))
	{
		$error = "Incorrect username or password2.";
    }
	else
	{
		$password = test_input($_POST["password"]);
	}
    // Check input errors before inserting in database
    if(empty($error))
	{
        // Prepare an SELECT statement
        $sql = "SELECT id, username, `password` FROM user WHERE username = ?";
        if($stmt = mysqli_prepare($handle, $sql))
		{
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt))
			{
                mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 1)
				{
					mysqli_stmt_bind_result($stmt, $id, $username, $hashed_pw);
					if (mysqli_stmt_fetch($stmt))
					{
						if (password_verify($password, $hashed_pw))
						{
							session_start();
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $username;
							$_SESSION["logged"] = true;
							header("location: index_cart.php");
						}
						else
							$error = "Incorrect username or password4.";
					}
            	}
				else
					$error = "Incorrect username or password5.";
			}
		}
		else
		{
            echo "Something went wrong. Please try again later.";
        }
		// Close statement
        mysqli_stmt_close($stmt);
    }
	// Close connection
	mysqli_close($handle);
}
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
  <p>Log in to your account</p>
  <br/>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p><?php echo $error; ?></p>
    Username: <input type="text" name="username"/><br /><br />
    Password: <input type="password" name="password"/><br /><br />
	<input type="submit" name = "submit" value="Log in" />
    <br>
</form>
</div>
</body>
</html>