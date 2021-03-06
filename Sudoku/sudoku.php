<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript">
	 		var url = new URL(window.location.href);
	 		var param = url.searchParams.get("svd");
	 		if(svd == 1)
	 		{
	 			alert(" Record Saved ");
	 		}
	 	</script>
		<title>Sudoku Party!</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../Assets/sdk.png" />
		<script type="text/javascript" src="sudoku.js"></script>
		<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
		<script language="javascript" type="text/javascript">

			var puzzle;
			var selectedTile;
			var r, c;
			var initHour, initMin, initSec, finHour, finMin, finSec;
			
			/* Funcion time init para saber cuando comenzo a jugar */
			function timeInit()
			{
				var time = new Date();
				console.log(time);
				initHour = time.getHours();
				initMin = time.getMinutes();
				initSec = time.getSeconds();
				console.log(initHour + " : " + initMin + " : " + initSec);
			}

			/* Funcion para calcular cuanto tiempo duro la partida */
			function timeFinish()
			{
				var time = new Date();
				finHour = time.getHours();
				finMin = time.getMinutes();
				finSec = time.getSeconds();
				console.log(finHour + " : " + finMin + " : " + finSec);

				var record = 1;
				if(finHour != initHour)
				{
					record = (finHour - initHour) * 3600;
					record += (finMin - initMin) * 60;
					record += finSec - initSec;
				}
				else
				{
					if(finMin != initMin)
					{
						record = (finMin - initMin) * 60;
						record += finSec - initSec;
					}
					else
					{
						record = finSec - initSec;
					}
				}
				
				console.log(" RECORD : " + record);
				if(record >= 1000)
				{
					console.log(" Entro a / 60 ");
					record = record / 1000;
					//record = record / 60;
				}
				record = Number((record).toFixed(2));
				console.log(record);
				var user = prompt("Game Over, please enter your name for the records", "");
				window.location.href = "../record.php?operation=1&game=2&record=" + record + "&user=" + user; 
			}

			$(document).ready(function() {
				init();
				timeInit();
				$("#grid").fadeIn(500);
				$(".emptyCell").click(function(e) {
					r = selectedTile.getAttribute('id').charAt(1);
					c = selectedTile.getAttribute('id').charAt(3);
				    $("#numPad").fadeIn(100);
				    $("#numPad").offset({left: e.pageX - 78,top: e.pageY - 40});
				});
				$("#np1").click(function() { numberPad(1); });
				$("#np2").click(function() { numberPad(2); });
				$("#np3").click(function() { numberPad(3); });
				$("#np4").click(function() { numberPad(4); });
				$("#np5").click(function() { numberPad(5); });
				$("#np6").click(function() { numberPad(6); });
				$("#np7").click(function() { numberPad(7); });
				$("#np8").click(function() { numberPad(8); });
				$("#np9").click(function() { numberPad(9); });
				$("#npx").click(function() { numberPad(""); });
				$(".mistakeScreen").click(function() {
					$(".mistakeScreen").fadeOut(100);
				});
				$("#newGame").click(function() { newGame(); });
				$("#solve").click(function() {
					$("#numPad").fadeOut(100);
				    solve();
				});
				
			});

			
			function init() {
				puzzle = new generateSudoku();
				for(var i = 0; i < 9; i++) {
					for(var j = 0; j < 9; j++) {
						var tile = document.getElementById("t" + i + "x" + j);
						if(puzzle.getTileNumber(i, j) === 0) {
							tile.className = "emptyCell";
							tile.innerHTML = "";
							tile.onclick = tOnClick;
						}
						else {
							tile.style.backgroundColor = "#ecf4f3";
							tile.className = "cell";
							tile.innerHTML = puzzle.getTileNumber(i, j);
						}
					}
				}
			}

			function tOnClick() {
				if(selectedTile == null) {
					selectedTile = this;
					selectedTile.className = "emptyCell selected";
				}
				else {
					deselect();
					$("#numPad").fadeOut(100);
				}
			}

			function numberPad(value) {
				selectedTile.innerHTML = value;
				deselect();
				$("#numPad").fadeOut(100);
				if(checkForEmptyCells() === true) {
					var fGrid = getFinishedGrid();
					for(var i = 0; i < 9; i++) {
						for(var j = 0; j < 9; j++) {
							var t = document.getElementById("t" + i + "x" + j);
							if(t.classList.contains("emptyCell")) {
								if(puzzle.isValid(fGrid, i, j, t.innerHTML)) {
									continue;
								}
								else {
									$(".mistakeScreen").fadeIn(100);
									return;
								}
							}
						}
					}
					$(".winScreen").fadeIn(100);
					timeFinish();
					return;
				}
			}

			function getFinishedGrid() {
				var fGrid = new Array(9);
				for(var i = 0; i < 9; i++) {
					fGrid[i] = new Array(9);
					for(var j = 0; j < 9; j++) {
						fGrid[i][j] = document.getElementById("t" + i + "x" + j).innerHTML;
					}
				}
				return fGrid;
			}

			function checkForEmptyCells() {
				for(var l = 0; l < 9; l++) {
					for(var k = 0; k < 9; k++) {
						var tile = document.getElementById("t" + l + "x" + k);
						if(tile.innerHTML == "") return false;
					}
				}
				return true;
			}

			function deselect() {
				selectedTile.className = "emptyCell";
				selectedTile = null;
			}

			function newGame() {
				location.reload();
			}

			function solve() {
				for(var i = 0; i < 9; i++) {
					for(var j = 0; j < 9; j++) {
						var tile = document.getElementById("t" + i + "x" + j);
						tile.innerHTML = puzzle.getSolution(i, j);
					}
				}
			}
		</script>
	</head>

	<body>
		<div class="max-container">

			<div class="board">
				<section id="sudokuPuzzle">

					<!-- Numpad                                      ----->
					<div id='numPad'>
						<center>
							<div>
								<span id="np1" class='padNumbers' value='1'>1</span>
								<span id="np2" class='padNumbers' value='2'>2</span>
								<span id="np3" class='padNumbers' value='3'>3</span>
								<span id="np4" class='padNumbers' value='4'>4</span>
								<span id="np5" class='padNumbers' value='5'>5</span>
							</div>
							<div>
								<span id="np6" class='padNumbers' value='6'>6</span>
								<span id="np7" class='padNumbers' value='7'>7</span>
								<span id="np8" class='padNumbers' value='8'>8</span>
								<span id="np9" class='padNumbers' value='9'>9</span>
								<span id="npx" class='padNumbers' value='x'>x</span>
							</div>
						</center>
					</div>
					<!---    Numpad                                  ------>



					<!-- Tabla                                                    --->
					<table class="inner container" align="center" id="grid">
						<tr>
							<td id='t0x0'></td><td id='t0x1'></td><td id='t0x2'></td>
							<td id='t0x3'></td><td id='t0x4'></td><td id='t0x5'></td>
							<td id='t0x6'></td><td id='t0x7'></td><td id='t0x8'></td>
						</tr>
						<tr>
							<td id='t1x0'></td><td id='t1x1'></td><td id='t1x2'></td>
							<td id='t1x3'></td><td id='t1x4'></td><td id='t1x5'></td>
							<td id='t1x6'></td><td id='t1x7'></td><td id='t1x8'></td>
						</tr>
						<tr>
							<td id='t2x0'></td><td id='t2x1'></td><td id='t2x2'></td>
							<td id='t2x3'></td><td id='t2x4'></td><td id='t2x5'></td>
							<td id='t2x6'></td><td id='t2x7'></td><td id='t2x8'></td>
						</tr>


						<tr>
							<td id='t3x0'></td><td id='t3x1'></td><td id='t3x2'></td>
							<td id='t3x3'></td><td id='t3x4'></td><td id='t3x5'></td>
							<td id='t3x6'></td><td id='t3x7'></td><td id='t3x8'></td>
						</tr>
						<tr>
							<td id='t4x0'></td><td id='t4x1'></td><td id='t4x2'></td>
							<td id='t4x3'></td><td id='t4x4'></td><td id='t4x5'></td>
							<td id='t4x6'></td><td id='t4x7'></td><td id='t4x8'></td>
						</tr>
						<tr>
							<td id='t5x0'></td><td id='t5x1'></td><td id='t5x2'></td>
							<td id='t5x3'></td><td id='t5x4'></td><td id='t5x5'></td>
							<td id='t5x6'></td><td id='t5x7'></td><td id='t5x8'></td>
						</tr>


						<tr>
							<td id='t6x0'></td><td id='t6x1'></td><td id='t6x2'></td>
							<td id='t6x3'></td><td id='t6x4'></td><td id='t6x5'></td>
							<td id='t6x6'></td><td id='t6x7'></td><td id='t6x8'></td>
						</tr>
						<tr>
							<td id='t7x0'></td><td id='t7x1'></td><td id='t7x2'></td>
							<td id='t7x3'></td><td id='t7x4'></td><td id='t7x5'></td>
							<td id='t7x6'></td><td id='t7x7'></td><td id='t7x8'></td>
						</tr>
						<tr>
							<td id='t8x0'></td><td id='t8x1'></td><td id='t8x2'></td>
							<td id='t8x3'></td><td id='t8x4'></td><td id='t8x5'></td>
							<td id='t8x6'></td><td id='t8x7'></td><td id='t8x8'></td>
						</tr>
					</table>
					<!--- Tabla                                                 ------>

				</section>
			</div>

			<div class="controls">
				<div class="upper">
					<!--- Logo panel                                              ----->
					<section id="logosection">
						<img class="logo" src="../Assets/sdk.png" />
					</section>
					<!--- Logo panel                                              ----->

					<!--    Menu final                                          --->
					<div class="menu-container">
						<button class="button" onclick="solve()"> Give Up</button>
						<button class="button" onclick="newGame()"> New Game </button>
						<button class="button" onclick="window.location.href='../index.html'"> Return to GameCenter</button>
					</div>
					<!--     Menu final                                         ---->

					<!--- Error panel                                            ----->
					<div class="mistakeScreen">
						<center class="mistakeText">Pffft. Looks like you made a mistake somewhere.</center>
					</div>
					<!--- Errror panel                                            ---->


					<!--- Winner panel                                            ---->
					<div class="winScreen">
						<center class="winText">You're a winner. That's pretty neat.</center>
					</div>
					<!--- Winner panel                                            ----->
				</div>
				<div class="lower-box">
					<div class="records-title">
						Top 10
					</div>
					<div class="records">
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
							$sql = 'SELECT * FROM records WHERE game = "2" ORDER BY record DESC limit 10';
							$query = mysqli_query($dbc, $sql) or die (" Error, no se recuperaron los records. ".mysqli_error($dbc));
							while($row = mysqli_fetch_array($query)) 
						    {
						       echo $row['user'].'   >>  '.$row['record'].'<br>';
						    }
						?>
					</div>
					
				</div>
			</div>

		</div>
	</body>
</html>