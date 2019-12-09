<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Supervisor") || $_SESSION['role'] == "Admin") {
    // echo $_SESSION['role'];
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

    if(isset($_GET['submit'])){

        $date = $_GET['date']; 
        $supervisor = $_GET['supervisor'];
        $doctor = $_GET['doctor'];
        $caregiver1 = $_GET['caregiver1'];
        $caregiver2 = $_GET['caregiver2'];
        $caregiver3 = $_GET['caregiver3'];
        $caregiver4 = $_GET['caregiver4'];
    if($date != "" & $supervisor != "" & $doctor != "" & $caregiver1 != ""
    & $caregiver2 != "" & $caregiver3 != "" & $caregiver4 != ""){
        $sql = "INSERT INTO `Roster`(Schedule_Date, Supervisor_id, Doctor_id, Group1_id, Group2_id, Group3_id, Group4_id) VALUES ('$date','$supervisor','$doctor','$caregiver1','$caregiver2','$caregiver3','$caregiver4')";
        mysqli_query($conn,$sql);
}
    }

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://goingconcern-fe8.kxcdn.com/wp-content/uploads/2019/05/Hide-Your-Pain-Harold-1024x576.jpg">

    <title>New Roster</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>New Roster</h1>

        <?php
        switch ($_SESSION['role']) {
          case 'Supervisor':
            echo "<ul>
            <li><a href='roster.php'>Home</a></li>
            <li><a class = 'on' href='new_roster.php'>New Roster</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li></ul>";
            break;
          case 'Admin':
            echo "<ul>
            <li><a  href='admin.php'>Home</a></li>
            <li><a href='role.php'>Roles</a></li>
            <li><a href='ad_emp.php'>Employee</a></li>
            <li><a href='ad_pat.php'>Patients</a></li>
            <li><a href='reg_app.php'>Registration Approval</a></li>
            <li><a href='roster.php'>Roster</a></li>
            <li><a href='ad_report.php'>Admin's Report</a></li>
            <li><a href='payment.php'>Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
            <li><a class = 'on' href='new_roster.php'>New Roster</a></li>
            </ul>";
            break;
        }
        ?>

        <form action="new_roster.php">

        <label>Date:</label>
        <input name="date" type="date">
        <br>

        <label>Supervisor:</label>
        <select name="supervisor" id="supervisor">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Supervisor';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>
        </select>
        <br>

        <label>Doctor:</label>
        <select name="doctor" id="doctor">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Doctor';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>        </select>
        <br>

        <label>Caregiver1:</label>
        <select name="caregiver1" id="caregiver1">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Caregiver';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>        </select>
        <?php echo 'Group 1'?>
        <br>

        <label>Caregiver2:</label>
        <select name="caregiver2" id="caregiver2">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Caregiver';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>        </select>
        <?php echo 'Group 2'?>
        <br>

        <label>Caregiver2:</label>
        <select name="caregiver3" id="caregiver3">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Caregiver';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>        </select>
        <?php echo 'Group 3'?>
        <br>

        <label>Caregiver4:</label>
        <select name="caregiver4" id="caregiver4">
        <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Caregiver';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>        
        </select>
        <?php echo 'Group 4'?>
        <br>

        <input type="submit" name="submit" value='OKAY'>
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