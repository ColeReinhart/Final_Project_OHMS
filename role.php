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

if(isset($_GET['role_sub'])){
    $role_name = $_GET['role_name'];
    $access = $_GET['access'];

    $sql="SELECT * FROM `Role` WHERE `Role` = '$role_name'";
   $result = mysqli_query($conn,$sql);
   if(mysqli_num_rows($result) != "int(0)"){
       $update_access = "UPDATE `Role` SET `Access_Level` = $access WHERE Role = '$role_name'";
       mysqli_query($conn,$update_access);
   }

   else{
        $insert = "INSERT INTO `Role` (Role, Access_Level) VALUES ('$role_name',$access)";
        mysqli_query($conn,$insert);
   }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Role</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Roles</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a class="on" href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
        </ul>

                
        <form>
        <label>Role</label>
        <input type="text" name="role_name">
        <br>
        <label> Access Level</label>
        <input type="text" name="access">
        <input type="submit" name="role_sub">

        </form>

        <table>
            <tr>
                <th>Role</th>
                <th>Access Level</th>
            </tr>
            <?php
            $sql = "SELECT Role, Access_Level FROM Role ORDER BY Access_Level ASC";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";

                    echo "</tr>";
                }
            }
            ?>
        </table>


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