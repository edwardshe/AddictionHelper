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
				<header class="major" style="text-align:center">
					<h2 id="content" style="text-align:center;margin:0px">About Alevior</h2>
				</header>
					<p style="margin:0px;text-align:center">At Alevior, we believe that quitting addiction is a day-by-day process. </p> 
					<p style="margin:0px;padding-bottom:30px;text-align:center"> So, we have made it our commitment to help you on a daily basis. </p>
					<div class="features">
						<div class="feature">
							<i class="fa fa-paper-plane-o"></i>
							<h3>Set Goals.</h3>
							<p>You decide what you want to accomplish. We will help you get there.</p>
						</div>
						<div class="feature">
							<i class="fa fa-bar-chart-o"></i>
							<h3>See Progress.</h3>
							<p>View your progress over time with our custom, interactive graphs.</p>
						</div>
						<div class="feature">
							<i class="fa fa-thumb-tack"></i>
							<h3>Keep Journals.</h3>
							<p>Document your journey, and look back on your previous entries in the future.</p>
						</div>
						<div class="feature">
							<i class="fa fa-bell"></i>
							<h3>Get Reminders.</h3>
							<p>Get daily reminders sent right to your email or phone.</p>
						</div>
						<div class="feature">
							<i class="fa fa-globe"></i>
							<h3>Be Connected.</h3>
							<p>Log in to your account from anywhere, at any time.</p>
						</div>

					</div>
			</div>
		</section>

		<section id="contact" class="wrapper style2 special">
			<div class="inner narrow">
				<header>
					<h2>Contact Us</h2>
				</header>
				<form class="grid-form" method="post" action="#">
					<div class="form-control narrow">
						<label for="name">Name</label>
						<input name="name" id="name" type="text">
					</div>
					<div class="form-control narrow">
						<label for="email">Email</label>
						<input name="email" id="email" type="email">
					</div>
					<div class="form-control">
						<label for="message">Message</label>
						<textarea name="message" id="message" rows="4"></textarea>
					</div>
					<ul class="actions">
						<li><input value="Send Message" type="submit"></li>
					</ul>
				</form>
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