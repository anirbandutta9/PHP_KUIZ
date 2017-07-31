<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="exit.php" class="start">Logout</a>

			</div>
		</header>

		<main>
			<div class="container">
				<h2>Welcome back, Admin</h2>
				</div>
				</main>
				</body>
				</html>

				<?php } 
				else {
				header("location: admin.php");
				}
				?>