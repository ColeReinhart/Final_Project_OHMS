<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Caregiver" || $_SESSION['role'] == "Supervisor" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Doctor" ) {
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

if(isset($_GET['Submit'])){
    $Date = $_GET['Date'] ?? NULL;

    if($Date != NULL){
        $sql = ("SELECT Roster.Schedule_Date, Supervisor.Fname, Supervisor.Lname, Doctor.Fname, Doctor.Lname, Group1.Fname, Group1.Lname, Group2.Fname, Group2.Lname, Group3.Fname, Group3.Lname, Group4.Fname, Group4.Lname FROM Roster 
        JOIN Employee as Supervisor ON Roster.Supervisor_id = Supervisor.Emp_ID 
        JOIN Employee as Doctor ON Roster.Doctor_id = Doctor.Emp_ID 
        JOIN Employee as Group1 ON Roster.Group1_id = Group1.Emp_ID 
        JOIN Employee as Group2 ON Roster.Group2_id = Group2.Emp_ID 
        JOIN Employee as Group3 ON Roster.Group3_id = Group3.Emp_ID 
        JOIN Employee as Group4 ON Roster.Group4_id = Group4.Emp_ID WHERE Roster.Schedule_Date = '$Date'");
    }

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
            <li><a href='payment.php'>Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li></ul>"; 
            break;
        case 'Supervisor':
            echo "<ul><li><a class = 'on' href='roster.php'>Home</a></li>
            <li><a href='new_roster.php'>New Roster</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li></ul>";
            break;
        }
      ?>

        <form action="roster.php">

        <label>Date:</label>
        <input name="Date" type="Date">
        <input name="Submit" type="submit">
        </form>
        <br>
    
            <?php
if(isset($_GET['Submit'])){
    $Date = $_GET['Date'] ?? NULL;
    
    if($Date != NULL){
        $sql = ("SELECT Roster.Schedule_Date, Supervisor.Fname, Supervisor.Lname, Doctor.Fname, Doctor.Lname, Group1.Fname, Group1.Lname, Group2.Fname, Group2.Lname, Group3.Fname, Group3.Lname, Group4.Fname, Group4.Lname FROM Roster 
        JOIN Employee as Supervisor ON Roster.Supervisor_id = Supervisor.Emp_ID 
        JOIN Employee as Doctor ON Roster.Doctor_id = Doctor.Emp_ID 
        JOIN Employee as Group1 ON Roster.Group1_id = Group1.Emp_ID 
        JOIN Employee as Group2 ON Roster.Group2_id = Group2.Emp_ID 
        JOIN Employee as Group3 ON Roster.Group3_id = Group3.Emp_ID 
        JOIN Employee as Group4 ON Roster.Group4_id = Group4.Emp_ID WHERE Roster.Schedule_Date = '$Date'");
        
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_row($result)){
            echo"<table>";
            echo"<tr>
        <th>Date</th>
        <th>Supervisor</th>
        <th>Doctor</th>
        <th>Group A</th>
        <th>Group B</th>
        <th>Group C</th>
        <th>Group D</th>
    </tr>";
        echo "<th>$row[0]</th>";
        echo "<th>$row[1] $row[2]</th>";
        echo "<th>$row[3] $row[4]</th>";
        echo "<th>$row[5] $row[6]</th>";
        echo "<th>$row[7] $row[8]</th>";
        echo "<th>$row[9] $row[10]</th>";
        echo "<th>$row[11] $row[12]</th>";
        echo "</tr>";
        echo"</table>";
    }
}

}
                echo "<table>
                <tr>
                    <th>Date</th>
                    <th>Supervisor</th>
                    <th>Doctor</th>
                    <th>Group A</th>
                    <th>Group B</th>
                    <th>Group C</th>
                    <th>Group D</th>
                </tr>";
            $sql = "SELECT Roster.Schedule_Date, Supervisor.Fname, Supervisor.Lname, Doctor.Fname, Doctor.Lname, Group1.Fname, Group1.Lname, Group2.Fname, Group2.Lname, Group3.Fname, Group3.Lname, Group4.Fname, Group4.Lname FROM Roster 
            JOIN Employee as Supervisor ON Roster.Supervisor_id = Supervisor.Emp_ID 
            JOIN Employee as Doctor ON Roster.Doctor_id = Doctor.Emp_ID 
            JOIN Employee as Group1 ON Roster.Group1_id = Group1.Emp_ID 
            JOIN Employee as Group2 ON Roster.Group2_id = Group2.Emp_ID 
            JOIN Employee as Group3 ON Roster.Group3_id = Group3.Emp_ID 
            JOIN Employee as Group4 ON Roster.Group4_id = Group4.Emp_ID";

            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_row($result)){
            echo "<th>$row[0]</th>";
            echo "<th>$row[1] $row[2]</th>";
            echo "<th>$row[3] $row[4]</th>";
            echo "<th>$row[5] $row[6]</th>";
            echo "<th>$row[7] $row[8]</th>";
            echo "<th>$row[9] $row[10]</th>";
            echo "<th>$row[11] $row[12]</th>";
            echo "</tr>";

            }
            echo "</table>";

            
            ?>
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