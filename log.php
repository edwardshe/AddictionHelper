<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if (!$LOGGED_IN) header('Location: index.php');

$date = $_POST['date'];
$goal = (int) isset($_POST['goalYes']);
$times = $_POST['times'];
$log = $_POST['log'];

$rowid = $_COOKIE['alevior'];

$dbh = new PDO('sqlite:./info/logs.db');

$stmt = $dbh->prepare('INSERT INTO logs (user, date, goal, times, log) VALUES (?, ?, ?, ?, ?)');

$stmt->execute(array($rowid, $date, $goal, $times, $log));
$dbh = null;
header("Location: home.php");
?>