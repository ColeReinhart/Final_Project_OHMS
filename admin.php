<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Admin") {
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
        <h1>Admin Home</h1>

        <ul>
            <li><a class="active" href="">Additional Information</a></li>
            <li><a href="">Roles</a></li>
             <li><a href="">Employee</a></li>
            <li><a href="">Patients</a></li>
        </ul>

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