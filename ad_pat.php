<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Admin") {
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

    <title>Admin Patient</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Patients</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a class="on" href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
        </ul>

         <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Emergency Contact</th>
                <th>Emergency Contact Name</th>
                <th>Admission Date</th>
            </tr>
        </table>

        <h3>Search</h3>

        <label>ID</label>
        <input type="text">
        <br>

        <label>Name</label>
        <input type="text">
        <br>

        <label>Age</label>
        <input type="text">
        <br>

        <label>Emergency Contact</label>
        <input type="text">
        <br>

        <label>Emergency Contact Name</label>
        <input type="text">
        <br>

        <label>Addmission Date</label>
        <input type="text">
        <br>

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