<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Doctor') {
    echo $_SESSION['role'];
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    unset($_SESSION['logout']);
    $_SESSION['role'] = NULL;
    header("location: index.php");
}
?>

<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctor Home</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
            </tr>
        </table>

        <label>Date:</label>
        <input type="text">
        <br>

        <table>
            <tr>
                <th>Patient</th>
                <th>Date</th>
            </tr>
        </table>

    </body>  
</html>