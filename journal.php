<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if (!$LOGGED_IN) header('Location: index.php');
$rowid = $_COOKIE['alevior'];
$dbh = new PDO('sqlite:info/logs.db');
$stmt = $dbh->prepare("SELECT log, date FROM logs WHERE user = ? ORDER BY date DESC");
$stmt->bindParam(1, $rowid);
$stmt->execute();
$result = $stmt->fetchAll();
$logArray = array();
$dateArray = array();
foreach ($result as $val) {
	if (!empty($val['log'])) {
		$logArray[] = htmlspecialchars($val['log']);
		$dateArray[] = $val['date'];
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Journal | Alevior</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<section id="banner">
			<h2><strong>Alevior</strong></h2>
			<ul class="actions">
				<li><a href="home.php" class="button special">Home</a></li>
				<li><a href="home.php#log" class="button special">Log My Progress</a></li>
				<li><a href="logout.php" class="button special">Logout</a></li>
			</ul>
		</section>
		<?php
			$count = 1;
			foreach ($dateArray as $date)
			{
				echo '<section id="';
				echo $count;
				echo '" class="wrapper ';
				if ($count % 2 == 0) echo "style2 ";
				echo 'special"><div class="inner"><header class="major"><h2>';
				echo $date;
				echo '</h2></header><p>';
				echo $logArray[$count - 1];
				echo '</p></div></section>';
				$count++;
			}
		?>
	</body>
</html>