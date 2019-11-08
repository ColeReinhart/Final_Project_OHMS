<?php
include_once 'db.php';

session_start();

if(isset($_GET['logout'])) {
    unset($_SESSION['logout']);
    $_SESSION['role'] = NULL;
    header("location: index.php");
}
?>

<html>
    Patient Home
    <form action="">
    <button type="submit" class="btn" name = "logout">Logout</button>
    </form>
</html>