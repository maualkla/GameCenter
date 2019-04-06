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