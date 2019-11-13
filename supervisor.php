<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "supervisor") || $_SESSION['role'] == "admin") {
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
        <h1>Superviser Home</h1>
        <form action="">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>

        <label>Date:</label>
        <input type="text">
        <br>

        <table>
            <tr>
                <th>Supervisor</th>
                <th>Doctor</th>
                <th>Caregiver1</th>
                <th>Caregiver2</th>
                <th>Caregiver3</th>
                <th>Caregiver4</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>Name</td>
                <td>Name</td>
                <td>Name</td>
                <td>Name</td>
                <td>Name</td>
            </tr>
            <tr>
                <td>Group Name</td>
                <td>Group Name</td>
                <td>Group Name</td>
                <td>Group Name</td>
                <td>Group Name</td>
                <td>Group Name</td>
            </tr>
        </table>
       
    </body>  
</html>