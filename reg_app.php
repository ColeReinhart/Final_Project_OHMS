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
<link href="style.css" rel="stylesheet" type="text/css">
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Registration</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a class="on" href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
        </ul>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Yes</th>
                <th>No</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>Name</td>
                <td><input type="checkbox"></td>     <td><input type="checkbox"></td>
            </tr>
        </table>

        <button>OKAY</button>
        <button>CANCEL</button>
        
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