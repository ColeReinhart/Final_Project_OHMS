<?php
include_once 'db.php';

session_start();

if(isset($_POST['please'])) {
    $_SESSION['anthony'] = $_POST["please"];
    $id = $_SESSION['anthony'];
}

$col1 = $_GET['col1'] ?? '';
$col2 = $_GET['col2'] ?? '';
$col3 = $_GET['col3'] ?? '';
$col4 = $_GET['col4'] ?? '';

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

    <title>Doctor Patient</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Patients' of Doctor</h1>

        <ul>
            <li><a href="doc_home.php">Home</a></li>
            <li><a href="Roster.php">Roster</a></li>
            <li><a class = 'on' href="pat_doc.php">Patients' of the Doctor</a></li>
        </ul>

        <?php 
            echo "<table>
            <tr>
            <th>Date</th>
            <th>Comment</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Night Medicine</th>
            </tr>";
            $search = "SELECT Appointments.Date, Appointments.Comment, Appointments.Morning_Med, Appointments.Afternoon_Med, Appointments.Night_Med FROM Patient LEFT JOIN Appointments ON Appointments.Pat_ID = Patient.Pat_ID WHERE Patient.Pat_ID = '{$_SESSION['anthony']}' AND Appointments.doc_id = {$_SESSION['empID']} ORDER BY Appointments.Date ASC;";
            $result = mysqli_query($conn, $search);;
            if($result) {
                while($row = mysqli_fetch_row($result)) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";
                    echo "<th>$row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "<th>$row[4]</th>";
                    echo "</tr>";
                }
            }
           echo '</table>';
    ?>
        

        <h3>New Perscription</h3>

        <?php
        if(isset($_GET['update'])) {
            $date = date("Y-m-d",time());
            $search = "UPDATE Appointments 
            SET Appointments.Comment = '{$_GET['col1']}', Appointments.Morning_Med = '{$_GET['col2']}', Appointments.Afternoon_Med = '{$_GET['col3']}', Appointments.Night_Med = '{$_GET['col4']}', Appointments.Completed = 1 WHERE Appointments.Date = '$date' AND Appointments.Pat_ID = '{$_SESSION['anthony']}';";
            $result = mysqli_query($conn, $search);;
            if($result) {
                    echo "<th>$row[0]</th>";
                    echo "<th>$row[1]</th>";
                    echo "<th>$row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "</tr>";  
                    header('Location: pat_doc.php');
            }
        }
        echo "<table>
            <tr>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Update</th>
            </tr>
            <tr>
                <form action='pat_doc.php' method='GET'>
                    <th><input type='text' name = 'col1'></th>
                    <th><input type='text' name = 'col2'></th>
                    <th><input type='text' name = 'col3'></th>
                    <th><input type='text' name = 'col4'></th>
                    <th><input type='submit' value = 'Update' name = 'update'></th>
                </form>
            </tr>
        </table>";
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

