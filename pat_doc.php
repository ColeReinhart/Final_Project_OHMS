<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Doctor') {
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
        <h1>Patients' of Doctor</h1>

        <ul>
            <li><a href="doc_home.php">Home</a></li>
            <li><a href="doc_appoint.php">Doctors' Appointments</a></li>
            <li><a class = 'on' href="pat_doc.php">Patients' of the Doctor</a></li>
        </ul>

        <table>
            <tr>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
            </tr>
        </table>

        <button>New Perscription</button>

        <table>
            <tr>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
            </tr>
        </table>
    </body>
</html>

