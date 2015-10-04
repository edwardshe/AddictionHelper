<?php
$email = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
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