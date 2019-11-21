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

if(isset($_GET['emp_id'])){
    $salary = $_GET['salary'];
    $emp = $_GET['emp'];
    $sql = "UPDATE `Employee` SET `Salary` = '$salary' WHERE `Emp_ID` = '$emp'";
    $result = mysqli_query($conn,$sql);

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Admin Employee</title>
</head>
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
        <form action="ad_emp.php" style="Float: left;">
        <label>Employee ID</label>
        <input name="emp"type="number">

    
        <br>

        <label>New Salary</label>
        <input name="salary" type="number" >
        <br>
        <input name="emp_id" type="submit">
        <button>CANCEL</button>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Salary</th>
            </tr>
            <?php
            $sql = "SELECT Emp_ID, Fname, Lname, Salary FROM Employee";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";
                    echo "<th>$row[2]</th>";
                    echo "<th>$row[3]</th>";

                    echo "</tr>";
                }
            }
        
        ?>
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