<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src='assets/js/Chart.js'></script>
	</head>
	<body>
		<section id="banner">
			<h2>Welcome back, <strong>User</strong></h2>
			<p>Together, we can quit.</p>
			<ul class="actions">
				<li><a href="#" class="button special">Profile</a></li>
				<li><a href="#log" class="button special">Log My Progress</a></li>
				<li><a href="logout.php" class="button special">Logout</a></li>	
			</ul>
		</section>

		<section id="progress" class="wrapper special">
			<div class="inner">
				<header class="major">
					<h2>Your Progress</h2>
				</header>
				<div class="features">
					<canvas id="buyers" width="600" height="400"></canvas>
				</div>
			</div>
		</section>

		<section id="log" class="wrapper style2 special">
				<div class="inner narrow">
					<header>
						<h2>Log Your Progress</h2>
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
							<label for="message">Log Entry</label>
							<textarea name="message" id="message" rows="4"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" type="submit"></li>
						</ul>
					</form>
				</div>
			</section>

		<script>
		    var buyerData = {
				labels : ["January","February","March","April","May","June"],
				datasets : [
					{
						fillColor : "rgba(172,194,132,0.4)",
						strokeColor : "#ACC26D",
						pointColor : "#fff",
						pointStrokeColor : "#9DB86D",
						data : [203,156,99,251,305,247]
					}
				]
			}

		    var buyers = document.getElementById('buyers').getContext('2d');
		    new Chart(buyers).Line(buyerData);
		</script>
	</body>
</html>