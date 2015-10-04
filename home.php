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
		<script src='assets/js/Chart.Scatter.js'></script>
	</head>
	<body>
		<section id="banner">
			<h2>Welcome back, <strong><?php echo $firstName ?></strong></h2>
			<p>Together, we can achieve <i>anything</i>.</p>
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

		<section id="streak" class="wrapper style2 special">
			<div class="inner narrow">
				<header>
					<h2>Current Goal Streak</h2>
					<p id="currentStreak">0 Days</p>
				</header>
				<div class="features">
					<canvas id="streakChart" width="600" height="400"></canvas>
					<p id="streakChartBad"></p>
				</div>
			</div>
		</section>

		<section id="progress" class="wrapper special">
			<div class="inner">
				<header class="major">
					<h2>Your Progress</h2>
					<p>Test</p>
				</header>
				<div class="features">
					<canvas id="progressChart" width="600" height="400"></canvas>
					<p id="progressChartBad"></p>
				</div>
			</div>
		</section>

		<section id="log" class="wrapper style2 special">
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

<!--		<script>
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
		</script> -->

		<script>

			var steps = 4;
			<?php 
				if($max <= 0)
				{
					$max = 1;
				}
				echo "var maxY = $max;\n"; 

				$jsDateArray = json_encode($dateArray);
				echo "var javascript_date_array = " . $jsDateArray . ";\n";

				$jsTimesArray = json_encode($timesArray);
				echo "var javascript_times_array = " . $jsTimesArray . ";\n";

/*				$goalStreakArray = array();
				$streakMax = 1;
				$prev = 0;
				$len = count($goalArray);
				for($i = 0; $i < $len; $i++)
				{
					if($goalArray[i] == intval("0"))
					{
						$goalStreakArray[] = 0;
						$prev = 0;
					}
					else
					{
						$goalStreakArray[] = ($prev + 1);
						$prev = $prev + 1;
					}

					if($prev > $streakMax)
					{
						$streakMax = $prev;
					}
				} */
				$jsGoalArray = json_encode($goalArray);
				//echo "var streakMax = " . $streakMax . ";\n";
				echo "var javascript_goal_array = " . $jsGoalArray . ";\n";
			?>

			var javascript_streak_goal_array = new Array();
			var len = javascript_goal_array.length;
			var prev = 0;
			var streakMax = 1;
			for(i = 0; i < len; i++)
			{
				if(javascript_goal_array[i] == 0)
				{
					javascript_streak_goal_array.push(0);
					prev = 0;
				}
				else
				{
					javascript_streak_goal_array.push(prev+1);
					prev = prev + 1;
				}
				if(prev > streakMax)
				{
					streakMax = prev;
				}
			}
			document.getElementById('currentStreak').innerHTML = prev + " " + "Days";

			var progressData = [];

			for (i = 0; i < javascript_date_array.length; i++) {
				progressData.push({
					x: Date.parse(javascript_date_array[i]),
					y: javascript_times_array[i]
				});

			}

		    var ctx = document.getElementById('progressChart').getContext('2d');
		    if(progressData.length > 1)
		    {
			  	var myChart = new Chart(ctx).Scatter([{ label: "Point", data: progressData }], {
					showScale: true,
					scaleShowLabels: true,
					scaleShowHorizontalLines: true,
					scaleShowVerticalLines: false,
					scaleLineWidth: 1,
					scaleGridLineColor: "#999",
					scaleLabel: "<%=value%>",
					scaleDateFormat: "mm/dd",
					scaleTimeFormat: "mm/dd",
					scaleDateTimeFormat: "mm/dd",
					scaleGridLineWidth: 1,
					useUtc: true,
					pointDot: true,
					pointHitDetectionRadius: 10,
					scaleType: 'date',
					animation: false,

					scaleOverride: true,
					scaleSteps: steps,
					scaleStepWidth: Math.ceil(maxY/steps),
					scaleStartValue: 0
				});  
		  	}
		  	else
		  	{
				  	document.getElementById('progressChartBad').innerHTML = "               Add at least 2 logs to view chart!               ";
		  	}


			var streakData = [];

			for (i = 0; i < javascript_date_array.length; i++) {
				streakData.push({
					x: Date.parse(javascript_date_array[i]),
					y: javascript_streak_goal_array[i]
				});

			}

		    var stx = document.getElementById('streakChart').getContext('2d');
		    if(streakData.length > 1)
		    {
			  	var myChart = new Chart(stx).Scatter([{ label: "Streak", data: streakData }], {
					showScale: true,
					scaleShowLabels: true,
					scaleShowHorizontalLines: true,
					scaleShowVerticalLines: false,
					scaleLineWidth: 1,
					scaleGridLineColor: "#999",
					scaleLabel: "<%=value%>",
					scaleDateFormat: "mm/dd",
					scaleTimeFormat: "mm/dd",
					scaleDateTimeFormat: "mm/dd",
					scaleGridLineWidth: 1,
					useUtc: true,
					pointDot: true,
					pointHitDetectionRadius: 10,
					scaleType: 'date',
					animation: false,

					scaleOverride: true,
					scaleSteps: steps,
					scaleStepWidth: Math.ceil(streakMax/steps),
					scaleStartValue: 0
				}); 
		  	}
		  	else 
		  	{
		  		document.getElementById('streakChartBad').innerHTML = "Add at least 2 logs to view chart!"
		  	}

		</script>

	</body>
</html>