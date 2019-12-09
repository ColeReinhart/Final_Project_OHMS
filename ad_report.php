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
$time = date("Y-m-d",time());
$time_sess = $time;
if(isset($_GET['Date'])) {
    $_SESSION['date'] = $_GET["Date"];
    $time_sess = $_SESSION['date'];
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://goingconcern-fe8.kxcdn.com/wp-content/uploads/2019/05/Hide-Your-Pain-Harold-1024x576.jpg">

    <title>Admin Report</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Report</h1>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a class="on" href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
            <li><a href='new_roster.php'>New Roster</a></li>
        </ul>

        <table>
            <tr>
                <th>Name</th>
                <th>Doctors' Name</th>
                <th>Doctors' Appointment</th>
                <th>Caregivers' Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>
            <tr>
      <form>
<?php
            
            echo"<label>Date</label>";
        echo"<input name='Date' type='date' value='$time_sess' >";
        ?>
        <input name="sub_date" type="submit">
</form>
        <br>
        <?php
        $Date = $_GET['Date'] ?? $time;
        $sql1 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, Patient.Pat_ID, `Group` FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Date` = '$Date' AND  (Morning_Med = 0 OR Afternoon_Med = 0 OR Night_Med = 0 OR Breakfast = 0 OR Lunch = 0 OR Dinner = 0)";
                $res_1 = mysqli_query($conn, $sql1);
                if($res_1) {
                    while($row1 = mysqli_fetch_row($res_1)) {
                        if($row1[2] == 1){
                            $r1 = "✔";
                        }
                        else{
                            $r1 = "✘";
                        }
                        if($row1[3] == 1){
                            $r2 = "✔";
                        }
                        else{
                            $r2 = "✘";
                        }
                        if($row1[4] == 1){
                            $r3 = "✔";
                        }
                        else{
                            $r3 = "✘";
                        }
                        if($row1[5] == 1){
                            $r4 = "✔";
                        }
                        else{
                            $r4 = "✘";
                        }
                        if($row1[6] == 1){
                            $r5 = "✔";
                        }
                        else{
                            $r5 = "✘";
                        }
                        if($row1[7] == 1){
                            $r6 = "✔";
                        }
                        else{
                            $r6 = "✘";
                        }

                        $name_search = "SELECT Roster.Schedule_Date, Doctor.Fname, Doctor.Lname, Group1.Fname, Group1.Lname, Group2.Fname, Group2.Lname, Group3.Fname, Group3.Lname, Group4.Fname, Group4.Lname FROM Roster JOIN Employee as Doctor ON Roster.Doctor_id = Doctor.Emp_ID JOIN Employee as Group1 ON Roster.Group1_id = Group1.Emp_ID 
                        JOIN Employee as Group2 ON Roster.Group2_id = Group2.Emp_ID 
                        JOIN Employee as Group3 ON Roster.Group3_id = Group3.Emp_ID 
                        JOIN Employee as Group4 ON Roster.Group4_id = Group4.Emp_ID WHERE Roster.Schedule_Date = '$Date'";

                  $result_1 = mysqli_query($conn, $name_search);
                  if($row2 = mysqli_fetch_row($result_1)) {
                        
                  
                        echo"<td>$row1[0] $row1[1]</td>";

                        

                        $appt = "SELECT * FROM `Appointments` WHERE Date = '$Date' AND `Pat_ID` = $row1[8]";
                        $result_3 = mysqli_query($conn, $appt);
                        if(mysqli_num_rows($result_3) == "int(0)"){
                            echo "<td> None </td>";
                            echo "<td>No Appointment</td>";
                        }

                        elseif($row3 = mysqli_fetch_row($result_3)) {
                            if($row3[8] == 1){
                            echo "<td> $row2[1] $row2[2]</td>";
                            echo "<td> Completed </td>";
                        
                    }
                    
                        if($row3[8] == 0){
                        echo "<td> $row2[1] $row2[2]</td>";
                        echo "<td> Not Completed </td>";
                    
                }
            }


                        if($row1[9] == 'A'){
                        echo "<td>$row2[3] $row2[4]</td>";
                  }elseif($row1[9] == 'B'){
                    echo "<td>$row2[5] $row2[6]</td>";
                  }elseif($row1[9] == 'C'){
                    echo "<td>$row2[7] $row2[8]</td>";
                  }elseif($row1[9] == 'D'){
                    echo "<td>$row2[9] $row2[10]</td>";
                  }
                        echo"<td>$r1</td>
                        <td>$r2</td>
                        <td>$r3</td>
                        <td>$r4</td>
                        <td>$r5</td>
                        <td>$r6</td>
                        </tr>
                        ";
                  }
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