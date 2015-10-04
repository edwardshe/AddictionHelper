<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$emailUpdates = (int) isset($_POST['emailUpdates']);
$phoneUpdates = (int) isset($_POST['phoneUpdates']);

$password = hash('sha512', $password);

$dbh = new PDO('sqlite:./info/login.db');
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $dbh->prepare('INSERT INTO login (firstName, lastName, email, phone, password, emailUpdates, phoneUpdates) VALUES (?, ?, ?, ?, ?, ?, ?)');

$stmt->execute(array($firstName, $lastName, $email, $phone, $password, $emailUpdates, $phoneUpdates));
$dbh = null;

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
			<h2><strong>Alevior</strong></h2>
			<ul class="actions">
				<li><a href="index.php" class="button special">Home</a></li>
				<li><a href="index.php#about" class="button special">About Us</a></li>
				<li><a href="index.php#contact" class="button special">Contact Us</a></li>
			</ul>
		</section>
		<section id="one" class = "wrapper">
			<div class="inner">
				<p>Successfully registered!</p>
				<ul class="actions">
				<li><a href="login.php" class="button special">Login</a></li>
				<li><a href="index.php" class="button special">Return to home</a></li>
			</ul>
			</div>
		</section>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>