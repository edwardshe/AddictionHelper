<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$dbh = new PDO('sqlite:info/login.db');
	$stmt = $dbh->prepare("SELECT * FROM login WHERE email = ? ORDER BY rowid DESC LIMIT 1");
	$stmt->bindParam(1, $email);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $val) {
		$p = $val['password'];
	}


	if (isset($_COOKIE['alevior'])) {
		$c = $_COOKIE['alevior'];
		if (hash('sha512', $c) == $p) header('Location: home.php');
	} elseif (isset($_POST['password'])){
		if (hash('sha512', $password) == $p) {
			$hour = time() + 60 * 60;
			setcookie('alevior', $_POST['password'], $hour);
			header('Location: home.php');
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login | Alevior</title>
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
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="row uniform">
						<div class="6u$ 12u$(xsmall)">
							<input type="email" name="email" id="email" value="" placeholder="Email" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="password" name="password" id="password" value="" placeholder="Password" />
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" value="Login" /></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</section>
	</body>
</html>