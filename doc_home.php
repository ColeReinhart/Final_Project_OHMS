<?php
include_once 'db.php';

session_start();

$colones = $_POST['col'] ?? '';
$coltwos = $_POST['val'] ?? '';
$table = $_POST['table'] ?? '';
$date = $_POST['typedate'] ?? '';

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Doctor') {
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    unset($_SESSION['logout']);
    $_SESSION['role'] = NULL;
    header("location: index.php");
}
?>

<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctor Home</h1>

        <ul>
            <li><a class = 'on' href="doc_home.php">Home</a></li>
            <li><a href="doc_appoint.php">Doctors' Appointments</a></li>
            <li><a href="pat_doc.php">Patients' of the Doctor</a></li>
        </ul>
        
        <table>
            <tr>
                <th>Fname</th>
                <th>Lname</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning_Med</th>
                <th>Afternoon_Med</th>
                <th>Night_Med</th>
            </tr>
            <tr>
                <?php
                $med = "SELECT Patient.Fname, Patient.Lname, Appointments.Date, Appointments.Comment, Appointments.Morning_Med, Appointments.Afternoon_Med, Appointments.Night_Med FROM Patient LEFT JOIN Appointments ON Appointments.Pat_ID = Patient.Pat_ID WHERE Appointments.doc_id = {$_SESSION['empID']};";
                $result = mysqli_query($conn, $med);
                if($result) {
                    while($row = mysqli_fetch_row($result)) {
                        echo "<th>$row[0]</th>";
                        echo "<th>$row[1]</th>";
                        echo "<th>$row[2]</th>";
                        echo "<th>$row[3]</th>";
                        echo "<th>$row[4]</th>";
                        echo "<th>$row[5]</th>";
                        echo "<th>$row[6]</th>";
                        echo "</tr>";
                    }
                }
            ?>
            </tr>
        </table>

        <form method = "POST" action="doc_home.php">
            <label for="col1">Column</label>
            <input type="text" name = "col"> 
            <label for="col1">Value</label>
            <input type="text" name = "val"> 
            <input type="submit" name="submits" value="Search">
        </form>

        <table name = "table">
        <?php
        if(isset($_POST['submits'])) {
            echo '<h3> Search Results </h3>';
            echo'<tr>
                <th>Fname</th>
                <th>Lname</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning_Med</th>
                <th>Afternoon_Med</th>
                <th>Night_Med</th>
                </tr>';
            $search = "SELECT Patient.Fname, Patient.Lname, Appointments.Date, Appointments.Comment, Appointments.Morning_Med, Appointments.Afternoon_Med, Appointments.Night_Med FROM Patient LEFT JOIN Appointments ON Appointments.Pat_ID = Patient.Pat_ID WHERE `{$_POST['col']}` LIKE '{$_POST['val']}' AND Appointments.doc_id = {$_SESSION['empID']};";
            $result = mysqli_query($conn, $search);;
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";
                    echo "<th>$row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "<th>$row[4]</th>";
                    echo "<th>$row[5]</th>";
                    echo "<th>$row[6]</th>";
                    echo "</tr>";
                }
            }
        }

?>
        </table>

        <form method = "POST" action="doc_home.php" name = "date">
            <label>Date:</label>
            <input type="date" name = "typedate">
            <input type="submit" name="search" value="search">
        </form>
        <br>

        <table>
            <?php 
            if(isset($_POST['search'])) {
                echo "<h3>Search Results</h3>";
                echo "<tr>
                <th>Fname</th>
                <th>Lname</th>
                <th>Date</th>
                </tr>";
                $search = "SELECT Patient.Fname, Patient.Lname, Appointments.Date FROM Patient Join Appointments WHERE Appointments.Pat_ID = Patient.Pat_ID AND Appointments.doc_id = {$_SESSION['empID']} AND Appointments.Date <= '{$_POST['typedate']}';";
                $result = mysqli_query($conn, $search);;
                if($result) {
                    while($row = mysqli_fetch_row($result)) {
                        echo "<th>$row[0]</th>";
                        echo "<th>$row[1]</th>";
                        echo "<th>$row[2]</th>";
                        echo "</tr>";
                        }
                    }
                }
    ?>
            </tr>
        </table>

        <!-- $search = "SELECT Patient.Fname, Patient.Lname, Appointments.Date FROM Patient Join Appointments WHERE Appointments.Pat_ID = Patient.Pat_ID AND Appointments.doc_id = {$_SESSION['empID']};";
                $result = mysqli_query($conn, $search);;
                if($result) {
                    $row = mysqli_fetch_row($result);
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";
                    echo "<th>$row[2]</th>";
                    echo "</tr>";
                } -->
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