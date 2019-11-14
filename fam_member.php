<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Family_Mem")|| $_SESSION['role'] == "Admin") {
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
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Family Member Home</h1>

        <label>Family Code (For Patient Family Member):</label>
        <?php echo 'FC Goes Here'?>
        <br>

        <label>Patient ID (For Patient Family Member):</label>
        <?php echo 'PID Goes Here'?>
        <br>

        <label>Date:</label>
        <?php echo 'Date Goes Here'?>
        <br>

        <button>OKAY</button>
        <button>CANCEL</button>

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