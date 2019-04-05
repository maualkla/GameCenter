<?php

// Defining variables
$operation = "";
$game = "";
$record = "";
$user = "";
$final = 0;

// Getting params
$operation = $_POST['operation'];
$game = $_POST['game'];
$record = $_POST['record'];
$user = $_POST['user'];

// Validating params
if(gettype($record) == integer)
{
	$record = intval($record);
	if(strlen($user) < 3)
	{
		$final = 1;
		echo ' ERROR: No se puto validar el nombre de usuario.';
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
	$sql = 'INSERT INTO records (games, record, user) VALUES ("'.$game.'", "'.$record.'", "'.$user.'")';
	//execute query
	//show response
}

// Notifing record

// Redirect to page

?>