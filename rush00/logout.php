<?php
session_start();
$_SESSION['logged'] = "";
header("Location: index.php");
?>