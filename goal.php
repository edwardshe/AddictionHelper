<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if (!$LOGGED_IN) header('Location: index.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Your Goal | Alevior</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<?php

		?>
		<section id="banner">
			<h2><strong>Alevior</strong></h2>
			<ul class="actions">
				<li><a href="home.php" class="button special">Home</a></li>
				<li><a href="home.php#log" class="button special">Log My Progress</a></li>
				<li><a href="journal.php" class="button special">Journal</a></li>
				<li><a href="logout.php" class="button special">Logout</a></li>
			</ul>
		</section>
		<section id="one" class = "wrapper">
			<div class="inner">
				<form method="post" action="goal_submit.php">
					<div class="row uniform">
						<label for="goal">Set Your Goal</label>
						<textarea name="goal" id="goal" rows="4" value=""></textarea>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" value="Submit" /></li>
								<li><input type="reset" value="Reset" class="alt" /></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</section>
	</body>
</html>