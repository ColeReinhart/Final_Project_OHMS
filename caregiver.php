<?php

include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Caregiver") || $_SESSION['role'] == "Admin") {

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
        <h1>Caregiver Home</h1>

        <ul>
            <li><a class = 'on' href="caregiver.php">Home</a></li>
            <li><a href="roster.php">Roster</a></li>
        </ul>

        <label>List of Patient Duties:</label>
        <?php echo 'All the Duties Go Here'?> 
        <br>

        <table>
            <tr>
                <th>Name</th>
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
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
        </table>
    </body>  
</html>