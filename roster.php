<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Caregiver" || $_SESSION['role'] == "Supervisor"  ) {
    echo $_SESSION['role'];

} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    unset($_SESSION['logout']);
    $_SESSION['role'] = NULL;
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
<link href="style.css" rel="stylesheet" type="text/css">
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Roster</h1>
        <form action="roster.php">
        <label>Date:</label>
        <input name="Date" type="Date">
        <input name="Submit" type="submit">
        </form>
        <br>
        
        
            <tr>
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

    </body>
</html>