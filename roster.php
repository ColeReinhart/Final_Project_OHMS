<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Caregiver" || $_SESSION['role'] == "Supervisor" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Doctor" ) {
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

    <title>Roster</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Roster</h1>
        <?php
        switch ($_SESSION['role']) {
          case 'Doctor':
            echo "<ul>
            <li><a href='doc_home.php'>Home</a></li>
            <li><a href='doc_appoint.php'>Doctors' Appointments</a></li>
            <li><a href='pat_doc.php'>Patients' of the Doctor</a></li>
            <li><a class = 'on' href='roster.php'>Roster</a></li>
            </ul>";
            break;
          case 'Caregiver':
            echo "<ul>
            <li><a href='caregiver.php'>Home</a></li>
            <li><a class = 'on' href='roster.php'>Roster</a></li>
            </ul>";
            break;
          case 'Admin':
            echo "<ul><li><a href='admin.php'>Home</a></li>
            <li><a href='role.php'>Roles</a></li>
            <li><a href='ad_emp.php'>Employee</a></li>
            <li><a href='ad_pat.php'>Patients</a></li>
            <li><a href='reg_app.php'>Registration Approval</a></li>
            <li><a class='on' href='roster.php'>Roster</a></li>
            <li><a href='ad_report.php'>Admin's Report</a></li>
            <li><a href='payment.php'>Payment</a></li></ul>"; 
            break;
          }
        // ?>

        <label>Date:</label>
        <input type="Date">
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