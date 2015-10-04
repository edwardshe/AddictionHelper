<!DOCTYPE html>
<html>
	<head>
		<title>Register | Alevior</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<?php

		?>
		<section id="banner">
			<ul class="actions">
				<li><a href="#" class="button special">Home</a></li>
			</ul>
		</section>
		<section id="one" class = "wrapper">
			<div class="inner">
				<form method="post" action="register_submit.php">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="firstName" id="firstName" value="" placeholder="First Name" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="lastName" id="firstName" value="" placeholder="Last Name" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="email" name="email" id="email" value="" placeholder="Email" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="phone" id="phone" value="" placeholder="Phone" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="password" name="password" id="password" value="" placeholder="Password" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="password" name="confirmPassword" id="confirmPassword" value="" placeholder="Confirm Password" />
						</div>
						<div class="6u 12u$(small)">
							<input type="checkbox" id="emailUpdates" name="emailUpdates" checked>
							<label for="emailUpdates">Sign me up for (very occassional) email updates!</label>
						</div>
						<div class="6u$ 12u$(small)">
							<input type="checkbox" id="phoneUpdates" name="phoneUpdates">
							<label for="phoneUpdates">Text me a daily reminder to fill out the progress log!</label>
						</div>
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