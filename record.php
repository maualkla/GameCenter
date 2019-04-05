<?php

// Defining variables
$operation = "";
$game = "";
$record = "";
$user = "";
$final = 0;

// Getting params
$operation = $_REQUEST['operation'];
$game = $_REQUEST['game']; 
$record = $_REQUEST['record'];
$user = $_REQUEST['user'];

echo " : ".$operation." : ".$game." : ".$record." : ".$user;
// Validating params
$record = intval($record);
echo " TYPE : ".gettype($record);
if(gettype($record) == "integer")
{
	$record = intval($record);
	if(strlen($user) < 3)
	{
		$final = 1;
		echo ' ERROR: No se puto validar el nombre de usuario.';
	}
	else
	{
		echo " Everything is fine creando conexion...";
		$dbc = mysqli_connect("127.0.0.1:3306","root","","records");
    	if (!$dbc) 
    	{
        	die("Error de conexion: " . mysqli_connect_error());
    	}
	}
}
else
{
	$final = 1;
	echo ' ERROR: No se pudo validar el puntaje.';
}

// Creating record
if($final == 0)
{
	//conncect
	$sql = 'INSERT INTO records (game, record, user) VALUES ("'.$game.'", "'.$record.'", "'.$user.'")';
	//execute query
	//show response
}

// Display records


// Notifing record

// Redirect to page
mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
<head>
	<title> GAMECENTER BACKEND </title>
</head>
<body>
	
</body>
</html>