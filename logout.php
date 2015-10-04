<?php
setcookie('alevior', '', time() - 10, '/');
header('Location: index.php');
?>