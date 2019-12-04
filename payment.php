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

if(isset($_GET['pat_id'])){
    $_SESSION['pat'] = $_GET['pat'];
    $sql = "SELECT Payment.Total_due FROM `Payment` WHERE `Pat_ID` = '{$_SESSION['pat']}'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        while($row=mysqli_fetch_row($result)){
        $var = ($row[0]);
        }
    }
}
$sub = $_GET['sub'] ?? NULL;
if(isset($sub)){
    $_SESSION['amount'] = $_GET['name']?? NULL;
    $sql = "UPDATE Payment SET `Total_due` = {$_SESSION['amount']} - $sub WHERE `Pat_ID` = {$_SESSION['pat']}";
    mysqli_query($conn,$sql);
}

// $sqlset = "SET GLOBAL event_scheduler = ON;";
// mysqli_query($conn, $sqlset);
// $sqlevent = "CREATE EVENT every_day
// ON SCHEDULE
//     EVERY 1 DAY
//     STARTS '2019-12-03 07:30:00' ON COMPLETION PRESERVE ENABLE 
// DO
//     UPDATE Payment SET `Total_due` = `Total_due` + 10;";
//     mysqli_query($conn, $sqlevent);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Payment</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Payment</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a class="on" href="payment.php">Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
        </ul>

        <form action="payment.php">
        <label>Patient ID</label>
        <input name="pat" type="number" value="<?php if(isset($_SESSION['pat'])){echo $_SESSION['pat']; } ?>">
        <input type="submit" name="pat_id" >
        </form>   
        <br>

        <form action="payment.php">
        <label>Total Due</label>
        <input type="text" name="name" value="<?php if(isset($var)){echo $var; }?>" readonly> 
        <br>

        <label>New Payment</label>
        <input type="text" name="sub">
        <input type="submit" >
        <br>
        </form>


        <?php echo '$10 for every day, $50 for every appointment' ?>

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