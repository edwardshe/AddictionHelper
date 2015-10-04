<?php
$LOGGED_IN = 0;
if (isset($_COOKIE['alevior'])) $LOGGED_IN = 1;
if (!$LOGGED_IN) header('Location: index.php');
$dbh = new PDO('sqlite:./info/goals.db');

if (!empty($_POST['goal']))
{
	$stmt = $dbh->prepare('REPLACE INTO goals (user, goal) VALUES (?, ?)');

	$stmt->execute(array($_COOKIE['alevior'], $_POST['goal']));
	$dbh = null;
}
header('Location: home.php');
?>