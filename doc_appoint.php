<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Supervisor') {
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

if(isset($_GET['pat_id'])){
    $Date = $_GET['Date']; 
    $pat = $_GET['pat'];
    $sql = "SELECT * FROM `Patient` WHERE `Pat_ID` = '$pat'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        while($row=mysqli_fetch_row($result)){
        $var = ($row[1]. " " . $row[2]);
    }
}
}


if(isset($_GET['submit'])){
    $Date = $_GET['Date1']; 

    $Pat_ID = $_GET['Pat_ID'] ?? '';
    $Doc_ID = $_GET['Doc_ID'] ?? '';

    $sql1 = "SELECT * FROM `Appointments` WHERE `Date` = '$Date' AND Pat_ID = '$Pat_ID'";
    $result1 = mysqli_query($conn,$sql1);
       
   if(mysqli_num_rows($result1) != "int(0)"){
    echo "Appointment already made!";
}
elseif( $Date != "" & $Pat_ID != "" & $Doc_ID != ""){
    $sql = "INSERT INTO `Appointments`(Pat_ID, Doc_ID, Date) VALUES ('$Pat_ID', '$Doc_ID', '$Date')";
    mysqli_query($conn,$sql);
    $sqlapppay = "UPDATE Payment SET Total_due = Total_due + 50 WHERE Pat_ID = '$Pat_ID'";
    mysqli_query($conn, $sqlapppay);
}
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Doctors Appointment</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctors' Appointments</h1>

        <?php
        switch ($_SESSION['role']) {
          case 'Supervisor':
            echo "<ul>
            <li><a href='roster.php'>Home</a></li>
            <li><a href='new_roster.php'>New Roster</a></li>
            <li><a class='on' href='doc_appoint.php'>Doctor Appointments</a></li></ul>";
            break;
          case 'Admin':
            echo "<ul><li><a href='admin.php'>Home</a></li>
            <li><a href='role.php'>Roles</a></li>
            <li><a href='ad_emp.php'>Employee</a></li>
            <li><a href='ad_pat.php'>Patients</a></li>
            <li><a href='reg_app.php'>Registration Approval</a></li>
            <li><a href='roster.php'>Roster</a></li>
            <li><a href='ad_report.php'>Admin's Report</a></li>
            <li><a href='payment.php'>Payment</a></li>
            <li><a class='on' href='doc_appoint.php'>Doctor Appointments</a></li></ul>"; 
            break;
        }
        ?>
        <small> NOTE: Appointments can only be made on a day a roster exists </small>
        <form action="doc_appoint.php">
        <label>Patient ID</label>
        <input name="pat"type="number" value="<?php if(isset($pat)){echo $pat; } ?>">
        <br>
        <label>Date</label>
        <input name="Date" type="date" value="<?php if(isset($_GET['Date'])){echo($_GET['Date']); } ?>">
        <input type="submit" name="pat_id">
        </form>    
        <form action="doc_appoint.php">

            <br>
            <label>Assigned Doctor</label>
            <select name="Doc_ID" id="doctors" value="Doctors">
                <?php
                $Date = $_GET['Date'];
                $sql = mysqli_query($conn, "SELECT * FROM Roster JOIN Employee ON Roster.Doctor_id = Employee.Emp_ID WHERE Roster.Schedule_Date = '$Date';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>
            </select>
            <br>

            <label>Patient Name:</label>
            <input type="text" name="name" value="<?php if(isset($var)){echo $var; }?>" readonly> 
            <br>
            <input type="hidden" name="Pat_ID" type="number" value="<?php if(isset($pat)){echo $pat; } ?>">
            <input name="Date1" type="hidden" value="<?php if(isset($_GET['Date'])){echo($_GET['Date']); } ?>">

            <input type="submit" name="submit" value="Submit">
            <input type="submit" name="submit" value="CANCEL">
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

