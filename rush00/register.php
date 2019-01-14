<?php
session_start();
include("index.php");
require_once("header.php");
require_once ("connect.php");

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] === "POST"){

    // Validate username
    if(empty(test_input($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";

        if($stmt = mysqli_prepare($handle, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = test_input($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = test_input($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(test_input($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(test_input($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = test_input($_POST["password"]);
    }

    // Validate confirm password
    if(empty(test_input($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = test_input($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO user(id, `username`, `password`) VALUES (NULL, ?, ?)";
        //$sql = "INSERT INTO `user` (`username`, `password`) VALUES (?, ?)";
        if($stmt = mysqli_prepare($handle, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);// Creates a password hash

			echo "param_username: " . $param_username . "<br />\n";
			echo "param_password: " . $param_password . "<br />\n";

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt) === TRUE){
                // Redirect to login page
				header("location: login.php");
            }
            else{
                echo "error: ". mysqli_stmt_error($stmt) . "<br />\n";
                echo "Something went wrong. Please try again later.";
            }
		}
		else
            echo "error stmt<br />\n";


        // Close statement
        mysqli_stmt_close($stmt);
	}
	else
	{
		echo "Errors: <br />\n";
		echo "Username_err: |" . $username_err . "|<br />\n";
		echo "Passwd_err: |" . $password_err . "|<br />\n";
		echo "Confirm_err: |" . $confirm_password_err . "|<br />\n";

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
  <p>Please fill out this form</p>
  <br/>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username"/><br /><br />
  Password : <input type="password" name="password"/><br /><br />
  Repeat password : <input type="password" name="confirm_password"/><br /><br />
	<input type="submit" name = "submit" value="Sign up" />
    <br>
</form>
</div>
</body>
</html>
