<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Admin") {
    // echo $_SESSION['role'];
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

if(isset($_POST['empapprove'])) {
    $empupdate = "UPDATE Employee SET Employee.Approved = 1
    WHERE Employee.Emp_ID = {$_POST['empapprove']};";
    mysqli_query($conn, $empupdate);;
}

if(isset($_POST['empblock'])) {
    $empblock = "DELETE FROM Employee
    WHERE Employee.Emp_ID = {$_POST['empblock']};";
    mysqli_query($conn, $empblock);;
}

if(isset($_POST['famapprove'])) {
    $famupdate = "UPDATE FAMILY_MEMBER SET FAMILY_MEMBER.Approved = 1
    WHERE FAMILY_MEMBER.FAM_ID = {$_POST['famapprove']};";
    mysqli_query($conn, $famupdate);;
}

if(isset($_POST['famblock'])) {
    $famblock = "DELETE FROM FAMILY_MEMBER
    WHERE FAMILY_MEMBER.FAM_ID = {$_POST['famblock']};";
    mysqli_query($conn, $famblock);;
}

if(isset($_POST['patapprove'])) {
    $patupdate = "UPDATE Patient SET Patient.Approved = 1
    WHERE Patient.Pat_ID = {$_POST['patapprove']};";
    mysqli_query($conn, $patupdate);;
}

if(isset($_POST['patblock'])) {
    $patblock = "DELETE FROM Patient
    WHERE Patient.Pat_ID = {$_POST['patblock']};";
    mysqli_query($conn, $patblock);;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Registration</title>
</head>
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
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
            <li><a href='new_roster.php'>New Roster</a></li>
        </ul>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Approve</th>
                <th>Not Approve</th>
            </tr>
            <tr>
                <?php
                echo "<h3> Employees </h3>";
                $emprole = "SELECT Employee.Fname, Employee.Lname, Employee.Role, Employee.Emp_ID FROM Employee WHERE Employee.Approved = 0;";
                $empresult = mysqli_query($conn, $emprole);
                if($empresult) {
                    while($emprow = mysqli_fetch_row($empresult)) {
                        echo "<th>$emprow[0]</th>";
                        echo "<th>$emprow[1]</th>";
                        echo "<th>$emprow[2]</th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'empapprove' type = 'submit' value = $emprow[3]></th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'empblock' type = 'submit' value = $emprow[3]></th>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "<h3> Family Members </h3>";
                echo "<table>";
                echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Approve</th>
                <th>Not Approve</th>
                </tr>";
                $famrole = "SELECT FAMILY_MEMBER.Fname, FAMILY_MEMBER.Lname, FAMILY_MEMBER.Role, FAMILY_MEMBER.FAM_ID FROM FAMILY_MEMBER WHERE FAMILY_MEMBER.Approved = 0;";
                $famresult = mysqli_query($conn, $famrole);
                if($famresult) {
                    while($famrow = mysqli_fetch_row($famresult)) {
                        echo "<th>$famrow[0]</th>";
                        echo "<th>$famrow[1]</th>";
                        echo "<th>$famrow[2]</th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'famapprove' type = 'submit' value = $famrow[3]></th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'famblock' type = 'submit' value = $famrow[3]></th>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "<h3> Patients</h3>";
                echo "<table>";
                echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Approve</th>
                <th>Not Approve</th>
                </tr>";
                $patrole = "SELECT Patient.Fname, Patient.Lname, Patient.Role, Patient.Pat_ID FROM Patient WHERE Patient.Approved = 0;";
                $patresult = mysqli_query($conn, $patrole);
                if($patresult) {
                    while($patrow = mysqli_fetch_row($patresult)) {
                        echo "<th>$patrow[0]</th>";
                        echo "<th>$patrow[1]</th>";
                        echo "<th>$patrow[2]</th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'patapprove' type = 'submit' value = $patrow[3]></th>";
                        echo "<th><form method = 'POST' action = 'reg_app.php'>
                        <input name = 'patblock' type = 'submit' value = $patrow[3]></th>";
                        echo "</tr>";
                    }
                }
            ?>
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