<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "patient" || $_SESSION['role'] == "admin") {
    // echo $_SESSION['role'];
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
        <h1>Patient Home</h1>
        <form action="">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>

        <label>Patient ID:</label>
        <?php echo 'PID Goes Here'?>
        <br>

        <label>Patient Name:</label>
        <?php echo 'PN Goes Here'?>
        <br>

        <label>Date:</label>
        <input type="text">
        <br>

        <table>
            <tr>
                <th>Doctors' Name</th>
                <th>Doctors' Appointment</th>
                <th>Caregivers' Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="checkbox"></td>
                <td>Name</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
        </table>
    </body>  
</html>