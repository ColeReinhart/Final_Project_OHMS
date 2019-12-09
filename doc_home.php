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
    session_destroy();
    header("location: index.php");
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://goingconcern-fe8.kxcdn.com/wp-content/uploads/2019/05/Hide-Your-Pain-Harold-1024x576.jpg">

    <title>Doctors Home</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctor Home</h1>

        <ul>
            <li><a class = 'on' href="doc_home.php">Home</a></li>
            <li><a href="roster.php">Roster</a></li>
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
                $med = "SELECT Patient.Fname, Patient.Lname, Appointments.Date, Appointments.Comment, Appointments.Morning_Med, Appointments.Afternoon_Med, Appointments.Night_Med FROM Patient LEFT JOIN Appointments ON Appointments.Pat_ID = Patient.Pat_ID WHERE Appointments.doc_id = {$_SESSION['empID']} AND Appointments.Date < NOW() - INTERVAL 1 DAY;";
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

        <form method = "POST" action="doc_home.php" name = "date">
            <label>Date:</label>
            <input type="date" name = "typedate">
            <input type="submit" name="search" value="Search">
        </form>
        <br>

        <?php
        if(isset($_POST['submits'])) {
            echo "<table>";
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
    
            <?php 
            if(isset($_POST['search'])) {
                echo "<table>";
                echo "<h3>Search Results</h3>";
                echo "<tr>
                <th>Check</th>
                <th>Fname</th>
                <th>Lname</th>
                <th>Date</th>
                </tr>";
                $search = "SELECT Patient.Pat_ID,Patient.Fname, Patient.Lname, Appointments.Date FROM Patient Join Appointments WHERE Appointments.Pat_ID = Patient.Pat_ID AND Appointments.doc_id = {$_SESSION['empID']} AND Appointments.Date BETWEEN NOW() - INTERVAL 1 DAY AND '{$_POST['typedate']}' ORDER BY Appointments.Date ASC;";
                $result = mysqli_query($conn, $search);;
                if($result) {
                    $_SESSION['patid'] = [];
                    while($row = mysqli_fetch_row($result)) {
                        $_SESSION['patid'][] = $row[0];
                        echo "<tr id = 'please'>";
                        echo "<th>
                        <form method = 'POST' action = 'pat_doc.php'>
                        <input name = 'please' type = 'submit' value = $row[0]></th>";
                        echo "<th>$row[1]</th>";
                        echo "<th>$row[2]</th>";
                        echo "<th>$row[3]</th>";
                        echo "</tr>";
                        echo "</form>";
                        }
                    }
                    echo "</tr>
                </table>";
                }
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