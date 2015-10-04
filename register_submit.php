<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$emailUpdates = $_POST['emailUpdates'];
//$phoneUpdates = $_POST['phoneUpdates'];

$password = hash('sha512', $password);

$dbh = new PDO('sqlite:info/login.db');
$stmt = $dbh->prepare("INSERT INTO login (firstName, lastName, email, phone, password, emailUpdates, 
	phoneUpdates) VALUES (:firstName, :lastName, :email, :phone, :password, :emailUpdates, 
	:phoneUpdates)");
$stmt->execute(array(
	':firstName' => $firstName,
	':lastName' => $lastName,
	':email' => $email,
	':phone' => $phone,
	':password' => $password,
	':emailUpdates' => $emailUpdates,
	':phoneUpdates' => ""
	));

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
			<ul class="actions">
				<li><a href="#" class="button special">Home</a></li>
			</ul>
		</section>

		<section id="one" class = "wrapper">
			<div class="inner">
				<p>Successfully registered!</p>
				<ul class="actions">
				<li><a href="#" class="button special">Login</a></li>
				<li><a href="#" class="button special">Return to home</a></li>
			</ul>
			</div>
		</section>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>