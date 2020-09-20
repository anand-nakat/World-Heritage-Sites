<?php // line added to turn on color syntax highlight

session_start();
unset($_SESSION['user_name']);
unset($_SESSION['login']);

header('Location: login.php');
?>