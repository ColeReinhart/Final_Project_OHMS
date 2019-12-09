<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Family Member")|| $_SESSION['role'] == "Admin") {

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

$fam_search = "SELECT FAMILY_MEMBER.Family_Code, Patient.Family_Code, Patient.Pat_ID, Patient.Group FROM FAMILY_MEMBER JOIN Patient ON FAMILY_MEMBER.Family_Code = Patient.Family_Code WHERE FAMILY_MEMBER.FAM_ID = {$_SESSION['famID']}";
$result = mysqli_query($conn, $fam_search);
if(mysqli_num_rows($result) == "int(0)"){
    session_destroy();
    header("location: index.php");
}
  while($row = mysqli_fetch_row($result)) {
      $fam_code = $row[1];
      $pat_id = $row[2];
      $group = $row[3];
  }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Family Members Home</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Family Member Home</h1>

        <label>Family Code (For Patient Family Member):</label>
        <?php echo $fam_code?>
        <br>

        <label>Patient ID (For Patient Family Member):</label>
        <?php echo $pat_id?>
        <br>

        <label>Date:</label>



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
            $time = date("Y-m-d",time());

        echo"<input name='Date' type='date' value='$time_sess' >";
        ?>
        <input name="sub_date" type="submit">
</form>
        <br>
        <?php
        $Date = $_GET['Date'] ?? $time;
        $sql1 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE Patient.Pat_ID = '$pat_id' AND `Date` = '$Date' ";
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

                        

                        $appt = "SELECT * FROM `Appointments` WHERE Pat_ID = $pat_id AND Date = '$Date'";
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


                        if($group == 'A'){
                        echo "<td>$row2[3] $row2[4]</td>";
                  }elseif($group == 'B'){
                    echo "<td>$row2[5] $row2[6]</td>";
                  }elseif($group == 'C'){
                    echo "<td>$row2[7] $row2[8]</td>";
                  }elseif($group == 'D'){
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