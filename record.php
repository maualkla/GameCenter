
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="Assets/bitmap.png" />
	<link rel="stylesheet" href="index.css" />
	<title> GameCenter Backend </title>
</head>
<body>
	<div class="error-tag">
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

echo "DATA : ".$operation." : ".$game." : ".$record." : ".$user;


// Conexion
function conexion()
{
	echo " Everything is fine creando conexion...";
	$realHost = "sql208.epizy.com:3306";
	$realUser = "epiz_23620501";
	$realPass = "Ajedrez101";
	$localHost = "127.0.0.1:3306";
	$localUser = "root";
	$localPass = "";
	$dbc = mysqli_connect($localHost,$localUser,$localPass,"records");
	if (!$dbc) 
	{
		die("Error de conexion: " . mysqli_connect_error());
	}
	else
	{
		echo " Conexion exitosa!!!";
	}
	return $dbc;
}


if($operation == "1")
{
	// Validating params
	$record = intval($record);
	echo " TYPE : ".gettype($record);
	if(gettype($record) == "integer")
	{
		$record = intval($record);
		if(strlen($user) < 3 || $user == null)
		{
			$final = 1;
			echo ' ERROR: No se pudo validar el nombre de usuario.';
		}
		else
		{
			if($user == "null")
			{
				$user = "Anonym User";
			}
			//success
			$dbc = conexion();
		}
	}
	else
	{
		$final = 1;
		echo ' ERROR: No se pudo validar el puntaje.';
	}
	if($final == 0)
	{
		//create query
		$sql = 'INSERT INTO records (game, record, user) VALUES ("'.$game.'", "'.$record.'", "'.$user.'")';
		echo " Query:: ".$sql;
		//execute query
		$insersion = mysqli_query($dbc, $sql) or die ("Error insertando record (205): ".mysqli_error($dbc));
		//show response
		if($game == "1")
		{
			header('Location: 5inLine/5inline.php?svd=1');
		}
		elseif($game == "2")
		{
			//header('Location: Sudoku/sudoku.html?svd=1');
		}
		else
		{
			header('Location: index.html');
		}
		mysqli_close($dbc);
		
	}
	else
	{
		if($game == "1")
		{
			header('Location: 5inLine/5inline.php?svd=2');
		}
		elseif($game == "2")
		{
			//header('Location: Sudoku/sudoku.html?svd=2');
		}
		else
		{
			header('Location: index.html');
		}
	}
}
elseif($operation == "2")
{
	// Under construction
	$dbc = conexion();
	mysqli_close($dbc);
}
else
{
	$dbc = null;
}
	// Creating record
	

	// Display records


	// Notifing record

	// Redirect to page

?>
	
	</div>
	<h2 style="text-align: center;">GameCenter</h3>
	<h4 style="text-align: center;">HERE'S WHERE THE MAGIC COMES TRUE</h6>
	<button class="button-white" onclick="window.location.href = 'index.html';"> Inicio </button>
</body>
</html> 