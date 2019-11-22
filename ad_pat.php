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
                <th>Admission Date</th>
            </tr>
            <?php

            if(isset($_GET['search_submit'])){
                $column = $_GET['column'];
                $search_box = $_GET['search_box'];
                $sql = "SELECT Pat_ID, Fname, Lname, DoB, Emergency_Contact, Admission_Date FROM Patient WHERE `$column` = '$search_box' ";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1] $row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "<th>$row[4]</th>";
                    echo "<th>$row[5]</th>";

                    echo "</tr>";
            }
        }
    }
             


            
        
        ?>
        </table>
        <?php
        echo "<table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Emergency Contact</th>
            <th>Admission Date</th>
        </tr>";
        $sql = "SELECT Pat_ID, Fname, Lname, DoB, Emergency_Contact, Admission_Date FROM Patient";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1] $row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "<th>$row[4]</th>";
                    echo "<th>$row[5]</th>";

                    echo "</tr>";
                }
                }
            ?>
        <h3>Search</h3>

        <form action="ad_pat.php">
        <select name="column" class="input_space">
            <option value="Pat_ID"> ID </option>
            <option value="Fname"> First Name </option>
            <option value="Lname"> Last Name </option>
            <option value="DoB"> Date-Of-Birth </option>
            <option value="Emergency_Contact"> Emergency Contact </option>
            <option value="Admission_Date"> Admission Date </option>
        </select>

        <input name="search_box" type="text">
        <input type="submit" name="search_submit">
        </form>
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