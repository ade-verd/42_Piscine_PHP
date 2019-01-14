<?php

$dbname = "db_minishop";
$dbuser = "root";
$dbpass = "123456";
$dbhost = "localhost:3306";
$sqlfile = "mini_shop.sql";

function drop_db($handle, $dbname)
{
	$query = "DROP DATABASE IF EXISTS " . $dbname . ";";
	if (mysqli_query($handle, $query))
		echo "Database ".$dbname." dropped successfully<br />\n";
	else
		die ("Error while dropping database ".$dbname.": " . mysql_error($handle) . "<br />\n");
}

function create_db($handle, $dbname)
{
	$db_selected = mysqli_select_db($handle, $dbname);
	if (!$db_selected)
	{
		$query = "CREATE DATABASE ".$dbname.";";
		if (mysqli_query($handle, $query))
			echo "Database ".$dbname." created successfully<br />\n";
		else
			echo "Error while creating database ".$dbname.": " . mysqli_error($handle) . "<br />\n";
	}
	else
		die ("Error while selecting ".$dbname.": " . mysqli_error($handle) . "<br />\n");
}

function show_db($handle)
{
	$query = "SHOW DATABASES;";
	$result = mysqli_query($handle, $query);

	$i = 0;
	echo "Databases:\n";
	while	($i = mysqli_fetch_array($result))
	{
		echo $i[0]."\n";
		$i++;
	}
}

function import_tables($handle, $filename, $dbname)
{
	$err = 0;
	$templine = '';
	$lines = file($filename);

	if ($db_selected = mysqli_select_db($handle, $dbname))
	{
		foreach ($lines as $line)
		{
			if (substr($line, 0, 2) == '--' || $line == '')
				continue;

			$templine .= $line;
			if (substr(trim($line), -1, 1) == ';')
			{
				if (mysqli_query($handle, $templine))
					$templine = '';
				else
				{
					$err++;
					print("Error performing query " . $templine . ": " . mysqli_error($handle) . "<br />\n");
				}
			}
		}
		if ($err === 0)
			echo "Tables imported successfully<br />\n";
		else
			echo $err . " errors occurred during tables' importation<br />\n";
	}
	else
		die ("Error while selecting ".$dbname.": " . mysqli_error($handle) . "<br />\n");

}

function create_htaccess()
{
	$path = "admin";
	$file = ".htaccess";
	$realpath = realpath($path . '/' . $file);

	if (file_exists($path) === FALSE)
		mkdir($path, 0755, TRUE);
	if (($fd = fopen($realpath, 'w')))
	{
		fwrite($fd, "AuthName \"Say the secret word\"\n");
		fwrite($fd, "AuthType Basic\n");
		fwrite($fd, "AuthUserFile \"" . $realpath . "\"\n");
		fwrite($fd, "Require valid-user\n");
		fclose($fd);
		echo $file . " edited successfully\n";
	}
	else
		die ("Can't open" . $file . "<br />\n");
}

$handle = mysqli_connect($dbhost, $dbuser, $dbpass)
			or die("Unable to Connect to '".$dbhost."'<br />\n");

drop_db($handle, $dbname);
create_db($handle, $dbname);
//show_db($handle);
import_tables($handle, $sqlfile, $dbname);
//create_htaccess();

echo "<br />\n";
echo "<h3>Please be patient, you will be redirected ... (5 seconds)</h3><br />\n";
header("refresh:5; url=index.php");

mysqli_close($handle);
?>
