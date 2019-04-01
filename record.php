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
}
else
{
	$final = 1;
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