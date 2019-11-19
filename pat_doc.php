<?php
include_once 'db.php';

session_start();

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
        <h1>Patients' of Doctor</h1>

        <ul>
            <li><a href="doc_home.php">Home</a></li>
            <li><a href="doc_appoint.php">Doctors' Appointments</a></li>
            <li><a class = 'on' href="pat_doc.php">Patients' of the Doctor</a></li>
            <li><a href="Roster.php">Roster</a></li>
        </ul>

        <table>
        <?php 
            // if(isset($_POST['search'])) {
            //     echo "<tr>
            //     <th>Date</th>
            //     <th>Comment</th>
            //     <th>Morning Medicine</th>
            //     <th>Afternoon Medicine</th>
            //     <th>Night Medicine</th>
            //     </tr>";
            //     $search = "SELECT Patient.Fname, Patient.Lname, Appointments.Date FROM Patient Join Appointments WHERE Appointments.Pat_ID = Patient.Pat_ID AND Appointments.doc_id = {$_SESSION['empID']} AND Appointments.Date <= '{$_POST['typedate']}';";
            //     $result = mysqli_query($conn, $search);;
            //     if($result) {
            //         while($row = mysqli_fetch_row($result)) {
            //             echo "<th>$row[0]</th>";
            //             echo "<th>$row[1]</th>";
            //             echo "<th>$row[2]</th>";
            //             echo "</tr>";
            //             }
            //         }
            //     }
    ?>
        </table>

        <button>New Perscription</button>

        <table>
            <tr>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
            </tr>
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

