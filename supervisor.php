<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Supervisor") || $_SESSION['role'] == "admin") {
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Supervisor Home</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Superviser Home</h1>

        <ul>
            <li><a class = 'on' href="supervisor.php">Home</a></li>
            <li><a href="new_roster.php">New Roster</a></li>
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
       
        <footer>
            <ul>
                <li>Phone: 717-555-5555</li>
                <br>
                <li>Email: oldfartsanddarts@fakemail.com</li>
                <br>
                <li>Fax: 171-123-4567</li>
                <br>
            </ul>
        </footer>
    </body>  
</html>