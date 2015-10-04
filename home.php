<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if (!$LOGGED_IN) header('Location: index.php');
else
{
	$dbh = new PDO('sqlite:info/login.db');
	$stmt = $dbh->prepare("SELECT * FROM login WHERE rowid = ? ORDER BY rowid DESC LIMIT 1");
	$stmt->bindParam(1, $_COOKIE['alevior']);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach ($result as $val) {
		$firstName = $val['firstName'];
	}
}

$rowid = $_COOKIE['alevior'];
$dbh = new PDO('sqlite:info/logs.db');
$stmt = $dbh->prepare("SELECT * FROM logs WHERE user = ? ORDER BY date");
$stmt->bindParam(1, $rowid);
$stmt->execute();
$result = $stmt->fetchAll();
$dbh = null;

$dateArray = array();
$goalArray = array();
$timesArray = array();
$max = 0;
foreach ($result as $val) {
	$dateArray[] = $val['date'];
	$goalArray[] = $val['goal'];
	$timesArray[] = $val['times'];
	if ($val['times'] > $max) $max = $val['times'];
}

$dbh = new PDO('sqlite:info/goals.db');
$stmt = $dbh->prepare("SELECT goal FROM goals WHERE user = ? ORDER BY rowid DESC LIMIT 1");
$stmt->bindParam(1, $rowid);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $val)
{
	$goalText = $val['goal'];
}

if (empty($goalText))
{
	$goalText = "You have not set a goal yet. Click <a href='goal.php'>here</a> to set one.";
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home | Alevior</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src='assets/js/Chart.js'></script>
	</head>
	<body>
		<section id="banner">
			<h2>Welcome back, <strong><?php echo $firstName ?></strong></h2>
			<p>Together, we can quit.</p>
			<ul class="actions">
				<li><a href="goal.php" class="button special">Set Goal</a></li>
				<li><a href="#log" class="button special">Log Progress</a></li>
				<li><a href="journal.php" class="button special">Journal</a></li>
				<li><a href="logout.php" class="button special">Logout</a></li>
			</ul>
		</section>

		<section id="progress" class="wrapper special">
			<div class="inner">
				<header class="major">
					<h2>Goal</h2>
				</header>
				<p>
					<?php echo $goalText ?>
				</p>
			</div>
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

		<section id="streak" class="wrapper style2 special">
			<div class="inner narrow">
				<header>
					<h2>Current Goal Streak</h2>
					<p>999 Days</p>
				</header>
				<div class="features">
				<canvas id="buyers2" width="600" height="400"></canvas>
				</div>
			</div>
		</section>

		<section id="log" class="wrapper special">
				<div class="inner narrow">
					<header>
						<h2>Log Your Progress</h2>
					</header>
					<form class="grid-form" method="post" action="log.php">
						<label for="date" style="padding-bottom:20px">Date</label>
						<div class="6u 12u$(xsmall)" style="margin-left:100px"><input type="date" name="date" id="date" /></div>
						<div class="4u 12u$(small)" style="padding-bottom:20px">
							<input type="radio" id="goalYes" name="goal" value="1" checked>
							<label for="goalYes">Yes, I met my goal</label>
						</div>
						<div class="4u 12u$(small)" style="padding-bottom:20px">
							<input type="radio" id="goalNo" value="0" name="goal">
							<label for="goalNo">No, I did not</label>
						</div>
							<input type="text" name="times" id="times" value="" placeholder="How many times did you cave?" />
						<div class="form-control" style="padding-top:20px">
							<label for="log">Log Entry</label>
							<textarea name="log" id="log" rows="4" value=""></textarea>
						</div>
						<ul class="actions">
							<li><input value="Log" type="submit"></li>
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
		    var buyers2 = document.getElementById('buyers2').getContext('2d');
		    new Chart(buyers).Line(buyerData);
		    new Chart(buyers2).Line(buyerData);
		</script>
	</body>
</html>