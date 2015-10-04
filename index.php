<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if ($LOGGED_IN) header('Location: home.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Alevior</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<section id="banner">
			<h2><strong>Alevior</strong> helps you conquer your addiction</h2>
			<ul class="actions">
				<li><a href="register.php" class="button special">Sign up</a></li>
				<li><a href="login.php" class="button special">Login</a></li>
			</ul>
		</section>

		<section id="about" class = "wrapper">
			<div class="inner">
				<h2 id="content">About Alevior</h2>
					<p>Description goes here</p>
			</div>
		</section>

		<footer id="footer">
			<div class="copyright">
				Design: <a href="http://templated.co/">TEMPLATED</a>.
			</div>
		</footer>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>