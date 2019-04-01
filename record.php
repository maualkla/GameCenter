<?php

// Defining variables
$game = "";
$record = "";
$user = "";
$final = 0;

// Getting params
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
	if($game == "1")
	{
		//Sudoku Party

	}
	elseif($game == "0")
	{
		//5 in Line

	}
}




// Notifing record

// Redirect to page

?>