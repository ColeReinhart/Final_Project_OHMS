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
        <h1>Employees</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a class="on" href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
        </ul>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Salary</th>
            </tr>
        </table>

        <label>Employee ID</label>
        <input type="text" >
        <br>

        <label>New Salary</label>
        <input type="text" >
        <br>

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