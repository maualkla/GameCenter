<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="5inline.css" />
		<script src="5inline.js"></script>
		<link rel="shortcut icon" href="../Assets/5il.png" />
		<title>5inLine - GameCenter	</title>
	</head>
 
	<body> 
		
		<div class="mega">

			<div class="top-page">
				<div class="top-upper">
					<img src="../Assets/5inline.png">
					<h1 id="level">LEVEL </h1>
					<p><strong>Human: </strong><span id="puntosHumano"></span></p>
					<p><strong>AI: </strong><span id="puntosIA"></span></p>
					<p id="pResultado">
						<span id="spanResultado"></span>
						<button type="button" class="btn" id="btnSiguiente" >Next Game</button>
					</p>

					<button onclick='window.location.href = "../index.html"' id="scape-btn"> Back to GameCenter</button>
				</div>
				<div class="records">
					<div class="record-title">Top Records</div>
					<div class="record-content">
						<?php
							
							function conexion()
							{
								//echo " Everything is fine creando conexion...";
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
									//echo " Conexion exitosa!!!";
								}
								return $dbc;
							}

							$dbc = conexion();
							$sql = 'SELECT * FROM records WHERE game = "1" ORDER BY record DESC limit 10';
							$query = mysqli_query($dbc, $sql) or die (" Error, no se recuperaron los records. ".mysqli_error($dbc));
							while($row = mysqli_fetch_array($query)) 
						    {
						       echo $row['user'].'   >>  '.$row['record'].'<br>';
						    }
						?>
					</div>
				</div>
			</div>
			
			<div class="content">
				<svg id="svg" width="700" height="650"></svg>
			</div>

			
		</div>
		<div class="msgbox">
			<p id="msgbox-title">
				Mensaje de prueba
			</p>
			<button id="msgbox-btn" onclick="" > Escape </button>
		</div>
	</body>

</html>